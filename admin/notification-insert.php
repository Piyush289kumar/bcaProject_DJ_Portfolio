<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="admin-heading">Add Notification</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px; margin-bottom:25px;" href="notification-read.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {
                    include("config.php");
                    $ndate = mysqli_real_escape_string($conn, $_POST['ndate']);
                    $ntitle = mysqli_real_escape_string($conn, $_POST['ntitle']);
                    $ntype = mysqli_real_escape_string($conn, $_POST['ntype']);
                    $userId = $_SESSION['username'];
                    $sql_insert_user = "INSERT INTO notification (ndate, ntitle, ntype, userId)
                                    values('{$ndate}','{$ntitle}','{$ntype}','{$userId}')";
                    if (mysqli_query($conn, $sql_insert_user)) {
                ?>
                        <script>
                            alert('Record is added successfully !!')
                        </script>
                    <?php
                        echo "<script>window.location.href='$hostname/admin/notification-read.php'</script>";
                    } else {
                    ?>
                        <script>
                            alert('Record is added successfully !!')
                        </script>
                <?php
                        // echo "<script>window.location.href='$hostname/admin/notification-read.php'</script>";
                    }
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="date" name="ndate" class="form-control" placeholder="Date" required>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="ntitle" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Notification Type</label>
                        <select class="form-control" name="ntype">
                            <option value="none" selected disabled><- Select Type -></option>
                            <option value="Latest_News">Latest News</option>
                            <option value="Upcoming_News">Upcoming News</option>
                            <option value="Achievements">Achievements</option>
                        </select>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" style="border-radius:16px;" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>