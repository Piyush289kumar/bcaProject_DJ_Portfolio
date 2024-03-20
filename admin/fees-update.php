<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    header("Location:{$hostname}/admin/");
};
include("config.php");
$user_id_getaddbar = $_GET['id'];
$file_name = '';
if (isset($_POST['submit'])) {
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name = $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
            $tempFileExt = explode('.', $file_name);
            $file_ext = strtolower(end($tempFileExt));
            $allow_extension = array("doc", "docx");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a PDF file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/feesStructure/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
                print_r($file_error);
                die();
            }
        }
    }
    $ntitle = mysqli_real_escape_string($conn, $_POST['atitle']);
    $ptype = 'Fees';
    $sql_update_user = "UPDATE pdf SET pname = '{$ntitle}', ptype = '{$ptype}', pdf = '{$save_img_name}' WHERE pid ='{$user_id_getaddbar}'";
    if (mysqli_query($conn, $sql_update_user)) {
?>
        <script>
            alert('Record is Update successfully !!')
        </script>
    <?php
        echo "<script>window.location.href='$hostname/admin/fees-read.php'</script>";
    } else {
    ?>
        <script>
            alert('Record is not Update !!')
        </script>
<?php
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="admin-heading" style='font-size:25px; margin-bottom:25px;'>Modify Fees Structure Details</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="fees-read.php"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
            <div class="col-md-offset-1 col-md-10">
                <!-- Form Start -->
                <!-- PHP CODE -->
                <?php include("config.php");
                $sql_userdata_show_by_id = "SELECT * FROM pdf WHERE pid = '{$user_id_getaddbar}'";
                $result_sql_userdata_show_by_id = mysqli_query($conn, $sql_userdata_show_by_id) or die("Query Die!!");
                if (mysqli_num_rows($result_sql_userdata_show_by_id) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_userdata_show_by_id)) {
                ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['pid'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="atitle" class="form-control" value="<?php echo $row['pname'] ?>" placeholder="PDF Title" required>
                            </div>

                            <div class="form-group">
                                <label for="">MS Word File</label>
                                <input type="file" name="new-image">
                                <!-- 
                                <img src="upload/pdf/<php echo $row['pdf']; ?>" height="150px" style="border-radius: 4px; margin-top:12px;"> -->
                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $hostname ?>/admin/upload/feesStructure/<?php echo $row['pdf']; ?>" frameBorder="0" scrolling="auto" height="500px" width="100%" style="border-radius: 4px; margin-top:12px;"></iframe>
                                <input type="hidden" name="old-image" value="<?php echo $row['pdf']; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" style="border-radius:16px;" value="Update" required />
                        </form>
                        <!-- /Form -->
                <?php
                    }
                } ?>
                <!-- PHP CODE -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>