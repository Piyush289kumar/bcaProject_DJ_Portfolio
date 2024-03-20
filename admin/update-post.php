<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
include("config.php");
// Secure Code
if ($_SESSION['user_role'] == 0) {
    $post_id_by_addbar = $_GET['post_id'];
    $sql_get_author_for_secrue_code = "SELECT author FROM post
                           WHERE  post_id = {$post_id_by_addbar}";
    $result_sql_get_author_for_secrue_code = mysqli_query($conn, $sql_get_author_for_secrue_code) or die("Query Failed !! --> sql_show_post_data");
    $row_result_sql_get_author_for_secrue_code = mysqli_fetch_assoc($result_sql_get_author_for_secrue_code);
    if ($_SESSION['user_id'] != $row_result_sql_get_author_for_secrue_code['author']) {
        echo "<script>window.location.href='$hostname/admin/'</script>";
    }
}
$post_id_by_addbar = $_GET['post_id'];
// UPDATION CODE
if (isset($_POST['submit'])) {
    // image update block start 1
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name = $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
            $path_parts = pathinfo($_FILES['new-image']["name"]);
            $file_ext = $path_parts['extension'];
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

      // image update block start 1
      if (empty($_FILES['new-image_2']['name'])) {
        $save_img_name_2 = $_POST['old-image_2'];
    } else {
        if (isset($_FILES['new-image_2'])) {
            $file_name = $_FILES['new-image_2']["name"];
            $file_tmp = $_FILES['new-image_2']["tmp_name"];
            $file_type = $_FILES['new-image_2']["type"];
            $file_size = $_FILES['new-image_2']["size"];
            $path_parts = pathinfo($_FILES['new-image_2']["name"]);
            $file_ext = $path_parts['extension'];
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_2 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_2);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

     // image update block start 1
     if (empty($_FILES['new-image_3']['name'])) {
        $save_img_name_3 = $_POST['old-image_3'];
    } else {
        if (isset($_FILES['new-image_3'])) {
            $file_name = $_FILES['new-image_3']["name"];
            $file_tmp = $_FILES['new-image_3']["tmp_name"];
            $file_type = $_FILES['new-image_3']["type"];
            $file_size = $_FILES['new-image_3']["size"];
            $path_parts = pathinfo($_FILES['new-image_3']["name"]);
            $file_ext = $path_parts['extension'];
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_3 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_3);
            } else {
                print_r($file_error);
                die();
            }
        }
    }
      // image update block start 1
      if (empty($_FILES['new-image_4']['name'])) {
        $save_img_name_4 = $_POST['old-image_4'];
    } else {
        if (isset($_FILES['new-image_4'])) {
            $file_name = $_FILES['new-image_4']["name"];
            $file_tmp = $_FILES['new-image_4']["tmp_name"];
            $file_type = $_FILES['new-image_4']["type"];
            $file_size = $_FILES['new-image_4']["size"];
            $path_parts = pathinfo($_FILES['new-image_4']["name"]);
            $file_ext = $path_parts['extension'];
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_4 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_4);
            } else {
                print_r($file_error);
                die();
            }
        }
    }
     // image update block start 1
     if (empty($_FILES['new-image_5']['name'])) {
        $save_img_name_5 = $_POST['old-image_5'];
    } else {
        if (isset($_FILES['new-image_5'])) {
            $file_name = $_FILES['new-image_5']["name"];
            $file_tmp = $_FILES['new-image_5']["tmp_name"];
            $file_type = $_FILES['new-image_5']["type"];
            $file_size = $_FILES['new-image_5']["size"];
            $path_parts = pathinfo($_FILES['new-image_5']["name"]);
            $file_ext = $path_parts['extension'];
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_5 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_5);
            } else {
                print_r($file_error);
                die();
            }
        }
    }
    // image update block end
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_decs = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $vlink = mysqli_real_escape_string($conn, $_POST['vlink']);
    $sql_update_post = "UPDATE post SET title = '{$post_title}', description = '{$post_decs}', post_img = '{$save_img_name}', post_img_2 = '{$save_img_name_2}', post_img_3 = '{$save_img_name_3}', post_img_4 = '{$save_img_name_4}', post_img_5 = '{$save_img_name_5}', vlink = '{$vlink}' WHERE post_id = '{$post_id_by_addbar}'";
    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        ?>
        <script>alert('Updated successfully !!')</script>
        <?php
        
        echo "<script>window.location.href='$hostname/admin/post.php'</script>";
    } else {
        echo "<div class='alert alert-danger'>Post is Not Update !!</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <?php
                $sql_show_post_data = "SELECT *
                                FROM post
                                LEFT JOIN user ON post.author = user.user_id
                                WHERE  post.post_id = {$post_id_by_addbar}";
                $result_sql_show_post_data = mysqli_query($conn, $sql_show_post_data) or die("Query Failed !! --> sql_show_post_data");
                if (mysqli_num_rows($result_sql_show_post_data) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_post_data)) {
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="post_id" class="form-control" value="<?php echo ($row['post_id']) ?>"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['title']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Description</label>
                                <textarea name="postdesc" class="form-control"
                                    rows="5"><?php echo ($row['description']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Post image</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $row['post_img']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Post image 2</label>
                                <input type="file" name="new-image_2">
                                <img src="upload/<?php echo $row['post_img_2']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_2" value="<?php echo $row['post_img_2']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Post image 3</label>
                                <input type="file" name="new-image_3">
                                <img src="upload/<?php echo $row['post_img_3']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_3" value="<?php echo $row['post_img_3']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Post image 4</label>
                                <input type="file" name="new-image_4">
                                <img src="upload/<?php echo $row['post_img_4']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_4" value="<?php echo $row['post_img_4']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Post image 5</label>
                                <input type="file" name="new-image_5">
                                <img src="upload/<?php echo $row['post_img_5']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_5" value="<?php echo $row['post_img_5']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Vlink</label>
                                <input type="text" name="vlink" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['vlink']) ?>" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" style="border-radius:16px;"
                                value="Update" />
                        </form>
                        <!-- Form End -->
                        <?php
                    }
                } else {
                    echo ("<div class='alert alert-danger'>Result Not Found.</div>");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>