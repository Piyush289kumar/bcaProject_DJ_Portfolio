<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="admin-heading">Add Gallery Picture</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px; margin-bottom:25px;" href="achievement-read.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
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
                                imagewebp($img, "upload/achievement/" . $output_img, 100);

                                include("config.php");
                                $ndate = mysqli_real_escape_string($conn, $_POST['adate']);
                                $ntitle = mysqli_real_escape_string($conn, $_POST['atitle']);
                                $ntype = mysqli_real_escape_string($conn, $_POST['atype']);
                                $userId = $_SESSION['username'];
                                $sql_insert_user = "INSERT INTO achievement (adate, atitle, atype, userId, aimg)
                                    values('{$ndate}','{$ntitle}','{$ntype}','{$userId}','{$output_img}')";
                                if (mysqli_query($conn, $sql_insert_user)) {
                ?>
                                    <script>
                                        alert('Record is added successfully !!')
                                    </script>
                                <?php
                                    echo "<script>window.location.href='$hostname/admin/achievement-read.php'</script>";
                                } else {
                                ?>
                                    <script>
                                        alert('Record is Not added !!')
                                    </script>
                <?php
                                    echo "<script>window.location.href='$hostname/admin/achievement-read.php'</script>";
                                }
                            }
                        }
                    }
                }

                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="adate" class="form-control" placeholder="Date" required>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="atitle" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Gallery Picture Type</label>
                        <select class="form-control" name="atype">
                            <option value="none" selected disabled><- Select Type -></option>
                            <option value="gallery">Gallery</option>
                            <option value="Achievements">Achievements</option>
                            <option value="co-curricular-activity">Co-Curricular Activity</option>
                            <option value="sport">Sport</option>
                            <option value="social-service">Social Service</option>
                            <option value="trips-and-excursions">Trips and Excursions</option>
                            <option value="special-days">Special Days</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Picture</label>
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