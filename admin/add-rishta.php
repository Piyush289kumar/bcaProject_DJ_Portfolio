<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="admin-heading">Assign Resta</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="member.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {
                    
                        $main_profile = $_GET['main_profile'];
                
                    
                    $assign_profile = mysqli_real_escape_string($conn, $_POST['assign_profile']);
                    

                    $sql_insert_user = "INSERT INTO reste (main_profile, assin_profile) VALUES ('{$main_profile}','{$assign_profile}')";
                    if (mysqli_query($conn, $sql_insert_user)) {
                        ?>
                    <script>alert('Rishta is added successfully !!')</script>
                    <?php
                        echo "<script>window.location.href='$hostname/admin'</script>";
                    }
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Username | Name</label>
                        <select class="form-control" name="assign_profile">
                        <option disabled selected>Choose a Profile..</option>
                            <?php
                            $sql_show_user = "SELECT * FROM form_data ORDER BY form_id DESC";
                            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                            if (mysqli_num_rows($result_sql_show_user) > 0) {
                                $serial_num = $offset + 1;
                                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] . " | " . $row['name'] ?>
                                    </option>
                                <?php }
                            } ?>
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