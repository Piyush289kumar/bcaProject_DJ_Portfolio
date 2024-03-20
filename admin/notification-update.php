<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    header("Location:{$hostname}/admin/");
};
include("config.php");
$user_id_getaddbar = $_GET['id'];
if (isset($_POST['submit'])) {

    $ndate = mysqli_real_escape_string($conn, $_POST['ndate']);
    $ntitle = mysqli_real_escape_string($conn, $_POST['ntitle']);
    $ntype = mysqli_real_escape_string($conn, $_POST['ntype']);
    $display = mysqli_real_escape_string($conn, $_POST['display']);

    $sql_update_user = "UPDATE notification SET ndate = '{$ndate}', ntitle = '{$ntitle}', ntype ='{$ntype}' , display ='{$display}'  WHERE nid ='{$user_id_getaddbar}'";
    if (mysqli_query($conn, $sql_update_user)) {
        echo "<script>window.location.href='$hostname/admin/notification-read.php'</script>";
    } else {
        echo "error";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="admin-heading">Modify Notification Details</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="notification-read.php"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <!-- PHP CODE -->
                <?php include("config.php");
                $sql_userdata_show_by_id = "SELECT * FROM notification WHERE nid = '{$user_id_getaddbar}'";
                $result_sql_userdata_show_by_id = mysqli_query($conn, $sql_userdata_show_by_id) or die("Query Die!!");
                if (mysqli_num_rows($result_sql_userdata_show_by_id) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_userdata_show_by_id)) {
                ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['nid'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <input type="Date" name="ndate" class="form-control" value="<?php echo $row['ndate'] ?>" placeholder="Date" required>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="ntitle" class="form-control" value="<?php echo $row['ntitle'] ?>" placeholder="Title" required>
                            </div>

                            <div class="form-group">
                                <label>Notification Display</label>
                                <select class="form-control" name="display" value="<?php echo $row['display'] ?>">
                                    <?php
                                    if ($row['display'] == 'Yes') {
                                        echo ("<option value='Yes'selected>Yes</option>
                                        <option value='No'>No</option>");
                                    } else {
                                        echo ("<option value='Yes'>Yes</option>
                                        <option value='No' selected>No</option>");
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Notification Type</label>
                                <select class="form-control" name="ntype" value="<?php echo $row['ntype'] ?>">
                                    <?php
                                    if ($row['ntype'] == 'Latest_News') {
                                        echo ("<option value='Latest_News'selected>Latest News</option>
                                        <option value='Upcoming_News'>Upcoming News</option>
                                        <option value='Achievements'>Achievements</option>");
                                    } elseif ($row['ntype'] == 'Upcoming_News') {
                                        echo ("<option value='Latest_News'>Latest News</option>
                                        <option value='Upcoming_News' selected>Upcoming News</option>
                                        <option value='Achievements'>Achievements</option>");
                                    } elseif ($row['ntype'] == 'Achievements') {
                                        echo ("<option value='Latest_News'>Latest News</option>
                                        <option value='Upcoming_News' >Upcoming News</option>
                                        <option value='Achievements' selected>Achievements</option>");
                                    } else {
                                        echo ("<option value='none' selected disabled><- Select Type -></option>
                                        <option value='Latest_News'>Latest News</option>
                                        <option value='Upcoming_News'>Upcoming News</option>
                                        <option value='Achievements'>Achievements</option>");
                                    }
                                    ?>
                                </select>
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