<?php include("header.php");
include("config.php");
if ($_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
if (isset($_POST['submit'])) {
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
                imagewebp($img, "upload/" . $output_img, 15);
                // Post 2
                if (isset($_FILES['fileToUpload_2'])) {
                    if ($_FILES['fileToUpload_2']["size"] > 10485760) {
                        echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                    }
                    $info_2 = getimagesize($_FILES['fileToUpload_2']['tmp_name']);
                    if (isset($info['mime'])) {
                        if ($info_2['mime'] == "image/jpeg") {
                            $img_2 = imagecreatefromjpeg($_FILES['fileToUpload_2']['tmp_name']);
                        } elseif ($info_2['mime'] == "image/png") {
                            $img_2 = imagecreatefrompng($_FILES['fileToUpload_2']['tmp_name']);
                        } elseif ($info_2['mime'] == "image/webp") {
                            $img_2 = imagecreatefromwebp($_FILES['fileToUpload_2']['tmp_name']);
                        } else {
                            echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                        }
                        if (isset($img_2)) {
                            $output_img_2 = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload_2']["name"]) . ".webp";
                            imagewebp($img_2, "upload/" . $output_img_2, 15);
                            // Post 3
                            if (isset($_FILES['fileToUpload_3'])) {
                                if ($_FILES['fileToUpload_3']["size"] > 10485760) {
                                    echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                                }
                                $info_3 = getimagesize($_FILES['fileToUpload_3']['tmp_name']);
                                if (isset($info['mime'])) {
                                    if ($info_3['mime'] == "image/jpeg") {
                                        $img_3 = imagecreatefromjpeg($_FILES['fileToUpload_3']['tmp_name']);
                                    } elseif ($info_3['mime'] == "image/png") {
                                        $img_3 = imagecreatefrompng($_FILES['fileToUpload_3']['tmp_name']);
                                    } elseif ($info_3['mime'] == "image/webp") {
                                        $img_3 = imagecreatefromwebp($_FILES['fileToUpload_3']['tmp_name']);
                                    } else {
                                        echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                                    }
                                    if (isset($img_3)) {
                                        $output_img_3 = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload_3']["name"]) . ".webp";
                                        imagewebp($img_3, "upload/" . $output_img_3, 15);
                                        // Post 4
                                        if (isset($_FILES['fileToUpload_4'])) {
                                            if ($_FILES['fileToUpload_4']["size"] > 10485760) {
                                                echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                                            }
                                            $info_4 = getimagesize($_FILES['fileToUpload_4']['tmp_name']);
                                            if (isset($info['mime'])) {
                                                if ($info_4['mime'] == "image/jpeg") {
                                                    $img_4 = imagecreatefromjpeg($_FILES['fileToUpload_4']['tmp_name']);
                                                } elseif ($info_4['mime'] == "image/png") {
                                                    $img_4 = imagecreatefrompng($_FILES['fileToUpload_4']['tmp_name']);
                                                } elseif ($info_4['mime'] == "image/webp") {
                                                    $img_4 = imagecreatefromwebp($_FILES['fileToUpload_4']['tmp_name']);
                                                } else {
                                                    echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                                                }
                                                if (isset($img_4)) {
                                                    $output_img_4 = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload_4']["name"]) . ".webp";
                                                    imagewebp($img_4, "upload/" . $output_img_4, 15);
                                                    // Post 4
                                                    if (isset($_FILES['fileToUpload_5'])) {
                                                        if ($_FILES['fileToUpload_5']["size"] > 10485760) {
                                                            echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                                                        }
                                                        $info_5 = getimagesize($_FILES['fileToUpload_5']['tmp_name']);
                                                        if (isset($info['mime'])) {
                                                            if ($info_5['mime'] == "image/jpeg") {
                                                                $img_5 = imagecreatefromjpeg($_FILES['fileToUpload_5']['tmp_name']);
                                                            } elseif ($info_5['mime'] == "image/png") {
                                                                $img_5 = imagecreatefrompng($_FILES['fileToUpload_5']['tmp_name']);
                                                            } elseif ($info_5['mime'] == "image/webp") {
                                                                $img_5 = imagecreatefromwebp($_FILES['fileToUpload_5']['tmp_name']);
                                                            } else {
                                                                echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                                                            }
                                                            if (isset($img_5)) {
                                                                $output_img_5 = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload_4']["name"]) . ".webp";
                                                                imagewebp($img_5, "upload/" . $output_img_5, 15);
                                                                // Insert Query Code Section Start
                                                                $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
                                                                $post_decs = mysqli_real_escape_string($conn, $_POST['postdesc']);
                                                                $vlink = mysqli_real_escape_string($conn, $_POST['vlink']);
                                                                $post_cate = "साहित्य";
                                                                //$post_vlink = mysqli_real_escape_string($conn, $_POST['vlink']);
                                                                $post_date = date("d M, Y");
                                                                $post_author = $_SESSION['user_id'];
                                                                $sql_insert_post = "INSERT INTO post (title,description,category,post_date,author,post_img,post_img_2,post_img_3,post_img_4,post_img_5,vlink)
                                                             VALUES ('{$post_title}','{$post_decs}','{$post_cate}','{$post_date}','{$post_author}','{$output_img}','{$output_img_2}','{$output_img_3}','{$output_img_4}','{$output_img_5}','{$vlink}')";
                                                                if (mysqli_query($conn, $sql_insert_post)) {
                                                                    ?>
                                                                    <script>alert('Post is added successfully !!')</script>
                                                                    <?php
                                                                    echo "<script>window.location.href='$hostname/admin/post.php'</script>";
                                                                } else {
                                                                    echo "<div class='alert alert-danger'>Post Not Submit</div>";
                                                                }
                                                                // Insert Query Code Section End
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image 1</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <div class="form-group">
                        <label>Post image 2</label>
                        <input type="file" name="fileToUpload_2" required>
                    </div>
                    <div class="form-group">
                        <label>Post image 3</label>
                        <input type="file" name="fileToUpload_3" required>
                    </div>
                    <div class="form-group">
                        <label>Post image 4</label>
                        <input type="file" name="fileToUpload_4" required>
                    </div>
                    <div class="form-group">
                        <label>Post image 5</label>
                        <input type="file" name="fileToUpload_5" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Video Link</label>
                        <input type="text" name="vlink" class="form-control" autocomplete="off">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" style="border-radius:16px;" value="Save"
                        required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>