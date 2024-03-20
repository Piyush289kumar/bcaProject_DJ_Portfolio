<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
include("config.php");
$category_index_by_addbar = $_GET['category_index'];
if (isset($_POST['sumbit'])) {
     $astro_category = mysqli_real_escape_string($conn, $_POST['astro_category']);
     $astro_talk_process = mysqli_real_escape_string($conn, $_POST['astro_talk_process']);
    $sql_update_category = "UPDATE astro_talk SET 
        astro_category =  '{$astro_category}',
        astro_talk_process =  '{$astro_talk_process}'
        WHERE astro_id = '{$category_index_by_addbar}'";
    if (mysqli_query($conn, $sql_update_category)) {
        echo "<script>window.location.href='$hostname/admin/astro_admin.php'</script>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="adin-heading">Update Member</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="astro_admin.php"><i
                        class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                $sql_show_category = "SELECT * FROM astro_talk
                LEFT JOIN form_data ON astro_talk.user_id = form_data.id
                WHERE astro_talk.astro_id = '{$category_index_by_addbar}'";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        // 
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label>नाम : <?php echo $row['name'] ?></label><br>
                                <label>username : <?php echo $row['user_id'] ?></label>
                            </div>
                            <div class="form-group">
                                    <label>प्रकार :</label>
                                    <select class="form-control" name="astro_category">
                                        <option selected value="<?php echo $row['astro_category'] ?>">
                                            <?php echo $row['astro_category'] ?>
                                        </option>
                                        <option value="वैवाहिक मिलान">1. वैवाहिक मिलान</option>
                                        <option value="समस्या समाधान">2. समस्या समाधान</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label>Astro Talk Process :</label>
                                    <select class="form-control" name="astro_talk_process">
                                        <option selected value="<?php echo $row['astro_talk_process'] ?>">
                                            <?php echo $row['astro_talk_process'] ?>
                                        </option>
                                        <option value="Pending">1. Pending</option>
                                        <option value="Done">2. Done</option>
                                        <option value="Cancel">2. Cancel</option>
                                    </select>
                            </div>
                            <input type="submit" name="sumbit" style="border-radius:16px;" class="btn btn-primary"
                                value="Update" required />
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>