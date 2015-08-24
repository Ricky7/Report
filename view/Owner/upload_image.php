<?php
	if(strpos($_SERVER['HTTP_REFERER'], "?") > 0){
        $returnURL = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], "?"));
    }else{
        $returnURL = $_SERVER['HTTP_REFERER'];
    }
	include "../../inc/mysqli_conn.php";
	// Check image
	if(isset($_FILES['image'])){
	    $fileError = $_FILES['image']['error'];
	    if($fileError > 0){
	        header("Location:".$returnURL."?err=imgUploadError");
	        exit;
	    }
	    $maxSize = 100000;
	    $fileType = $_FILES['image']['type'];
	    $fileSize = $_FILES['image']['size'];
	    $fileTempName = $_FILES['image']['tmp_name'];

	    $trueFileType = exif_imagetype($fileTempName);
	    $allowedFiles = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
	    if (in_array($trueFileType, $allowedFiles)) {
	        if($fileSize > $maxSize){
	            header("Location:".$returnURL."?err=tooBig");
	            exit;
	        }else{
	            switch($trueFileType){
	                case 1 : $fileExt = ".gif";
	                break;
	                case 2: $fileExt = ".jpg";
	                break;
	                case 3 : $fileExt = ".png";
	                break;
	            }
	        }
	    }else{
	        header("Location:".$returnURL."?err=WrongFileType");
	        exit;
	    }

		$myPathInfo = pathinfo($_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']);
	    $currentDir = $myPathInfo['dirname'];
	    $imgDir = $currentDir . '/uploadedImages/';

	    $item_id = filter_var($_POST['item_id'], FILTER_VALIDATE_INT);
	    $newFileName = $item_id . $fileExt;
	    $stmt = $mysqli->prepare("UPDATE tb_info_item SET image = ? WHERE item_id = ?");
	    $stmt->bind_param('si', $newFileName, $item_id);
	    $stmt->execute();
	    $stmt->close();   
	    $newImgLocation = $imgDir . $newFileName;
	    if(move_uploaded_file($fileTempName, $newImgLocation)){
	        header("Location:".$returnURL."?id=$item_id");
	    }else{
	        header("Location:".$returnURL."?err=UploadProb");
	    }
	}
   
?>