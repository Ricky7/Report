<?php
    if(strpos($_SERVER['HTTP_REFERER'], "?") > 0){
        $returnURL = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], "?"));
    }else{
        $returnURL = $_SERVER['HTTP_REFERER'];
    }
    define('DB_SERVER', "localhost");
    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "db_report");

    $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    if (!$mysqli) {
        trigger_error('mysqli Connection failed! ' . htmlspecialchars(mysqli_connect_error()), E_USER_ERROR);
    }
    //mysqli_autocommit($conn, FALSE);
    $item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
    $item_type = filter_var($_POST['item_type'], FILTER_SANITIZE_STRING);
    $kode = filter_var($_POST['kode'], FILTER_SANITIZE_STRING);

    // Check image
    $fileError = $_FILES['image']['error'];
    // http://php.net/manual/en/features.file-upload.errors.php
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

    // Get the path to upload the image to
    $myPathInfo = pathinfo($_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']);
    $currentDir = $myPathInfo['dirname'];
    $imgDir = $currentDir . '/uploadedImages/';
    // Insert the other data into the database, get the new ID and create the new filename
    $stmt = $mysqli->prepare("INSERT INTO tb_info_item(item_name, item_type, kode) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $item_name, $item_type, $kode);
    $stmt->execute();
    $newID = $stmt->insert_id;
    $newFileName = $newID . $fileExt;
    $stmt->close();

    // Update the database with the new image filename
    $stmt = $mysqli->prepare("UPDATE tb_info_item SET image = ? WHERE item_id = ?");
    $stmt->bind_param('si', $newFileName, $newID);
    $stmt->execute();
    $stmt->close();

    // Move the file and redirect
    $newImgLocation = $imgDir . $newFileName;
    if(move_uploaded_file($fileTempName, $newImgLocation)){
        header("Location:".$returnURL);
    }else{
        header("Location:".$returnURL."?err=UploadProb");
    }

    /*$sql = "INSERT INTO tb_info_item (item_name,item_type,kode)
    VALUES ('{$_POST['item_name']}', '{$_POST['item_type']}', '{$_POST['kode']}');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }
    // mengambil item_id dari query sebelumnya
    $hasil = mysqli_query($conn, "SELECT MAX(item_id) AS last_id FROM tb_info_item LIMIT 1");
    if($hasil === FALSE) { 
        die(mysqli_error());
    }
    $row = mysqli_fetch_array($hasil);
    
    $lastId = $row['last_id'];
    
    
    $sql = "INSERT INTO tb_purchase (item_size,item_color,purchase_price,selling_price,purchase_date,information)
    VALUES ('{$_POST['item_size']}', '{$_POST['item_color']}', '{$_POST['purchase_price']}', '{$_POST['selling_price']}', now(), '{$_POST['information']}');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }
    
    $sql = "INSERT INTO tb_sell (item_id,item_code,status)
    VALUES ('$lastId', LAST_INSERT_ID(), 'ada')";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }

    mysqli_commit($conn);
    mysqli_close($conn);
    //header('location:form_input_stock.php?message=success');*/
    
?>



