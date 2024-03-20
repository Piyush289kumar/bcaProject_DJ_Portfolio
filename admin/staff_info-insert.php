<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="admin-heading">Add Staff Member</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px; margin-bottom:25px;" href="staff_info-read.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {
                    if (isset($_FILES['fileToUpload'])) {
                        if ($_FILES['fileToUpload']["size"] > 10485760) {
                            echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                        }
                        $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
                        if (isset($info['mime'])) {
                            if ($info['mime'] == "image/jpeg") {
                                $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
                            } elseif ($info['mime'] == "image/png") {
                                $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
                            } elseif ($info['mime'] == "image/webp") {
                                $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
                            } else {
                                echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                            }
                            if (isset($img)) {
                                $output_img = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']["name"]) . ".webp";
                                imagewebp($img, "upload/staff_member/" . $output_img, 100);

                                include("config.php");
                                $ndate = date("d M, Y");
                                $ntitle = mysqli_real_escape_string($conn, $_POST['atitle']);
                                $smdes = mysqli_real_escape_string($conn, $_POST['smdes']);

                                $stq = mysqli_real_escape_string($conn, $_POST['stq']);
                                $stex = mysqli_real_escape_string($conn, $_POST['stex']);
                                $stphone = mysqli_real_escape_string($conn, $_POST['stphone']);
                                $stemail = mysqli_real_escape_string($conn, $_POST['stemail']);

                                $userId = $_SESSION['username'];
                                $sql_insert_user = "INSERT INTO staff_info (stdate, stname, stpost, stuserId, stimg, stq, stex, stphone, stemail)
                                    values('{$ndate}','{$ntitle}','{$smdes}','{$userId}','{$output_img}', '{$stq}', '{$stex}', '{$stphone}', '{$stemail}')";
                                if (mysqli_query($conn, $sql_insert_user)) {
                ?>
                                    <script>
                                        alert('Record is added successfully !!')
                                    </script>
                                <?php
                                    echo "<script>window.location.href='$hostname/admin/staff_info-read.php'</script>";
                                } else {
                                ?>
                                    <script>
                                        alert('Record is Not added !!')
                                    </script>
                <?php
                                    echo "<script>window.location.href='$hostname/admin/staff_info-read.php'</script>";
                                }
                            }
                        }
                    }
                }

                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Staff Member Name</label>
                        <input type="text" name="atitle" class="form-control" placeholder="Staff Member Name" required>
                    </div>
                    <div class="form-group">
                        <label>Member Name Designation</label>
                        <input type="text" name="smdes" class="form-control" placeholder="Member Name Designation" required>
                    </div>
                    <div class="form-group">
                        <label>Staff Member Qualification</label>
                        <input type="text" name="stq" class="form-control" placeholder="Staff Member Qualification" required>
                    </div>
                    <div class="form-group">
                        <label>Staff Member Experience</label>
                        <input type="text" name="stex" class="form-control" placeholder="Staff Member Experience" required>
                    </div>
                    <div class="form-group">
                        <label>Staff Member Phone</label>
                        <input type="tel" maxlength="10" name="stphone" class="form-control" placeholder="Staff Member Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Staff Member Email</label>
                        <input type="email" name="stemail" class="form-control" placeholder="Staff Member Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Staff Member Picture</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" style="border-radius:16px;" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>