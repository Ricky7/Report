<?php
    include "owner_layout.php";
    include "../../inc/mysqli_conn.php";
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $query = "SELECT item_id, item_name, item_type, kode, image FROM tb_info_item WHERE item_id LIKE ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($item_id, $item_name, $item_type, $kode, $image);
        $stmt->fetch();
        /*while ($stmt->fetch()) {
            printf ("%s %s  <br>", $item_name, $item_type, $kode, $image);
        }*/

        $stmt->close();

    } else {
        trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
    }

    $mysqli->close();
    
?>
<div class="container" style="margin-top:70px;margin-bottom:20px;">
    <div class="row">
        <form method="POST" action="proses_editInfoBarang.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-2 selectContainer">
                        <?php
                            if ($image == ''){
                                echo '<img src="../../public/images/default-placeholder.png" width="160" height="220" class="img-responsive"/>';
                            }
                            else
                            {
                                echo '<img src="uploadedImages/'.$image.'" width="160" height="220" class="img-responsive"/>';
                            }
                        ?>
                        <input type="hidden" name="item_id" id="item_id" value="<?php echo htmlspecialchars($item_id); ?>">
                    </div>
                    <div class="col-xs-4 selectContainer">
                        <label class="control-label">Kode <span id="info2"></span></label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($kode); ?>" readonly>
                        <div id="info1"></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-8">
                        <label class="control-label">Nama Produk</label>
                        <input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo htmlspecialchars($item_name) ?>" required="required"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4 selectContainer">
                        <label class="control-label">Jenis</label>
                        <select class="form-control" name="item_type" id="item_type" required="required">
                            <option value="<?php echo htmlspecialchars($item_type); ?>"><?php echo htmlspecialchars($item_type); ?> - Default</option>
                        <?php
                            $query = mysql_query("select * from tb_types");
                            $no = 1;
                            while ($data = mysql_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
                        <?php 
                            $no++;
                        }
                        ?>   
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12" align="center">
                    <input type="submit" id="submit" class="submit btn btn-primary" value="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>