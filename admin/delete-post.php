<?php
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
$post_id_by_addbar = $_GET['post_id'];
?>
<script>alert('Deleted successfully !!')</script>
<?php

$sql_select_post_img = "SELECT * FROM post WHERE post_id = {$post_id_by_addbar}";
$result_sql_select_post_img = mysqli_query($conn, $sql_select_post_img) or die("Query Die !! --> sql_select_post_img");
if (mysqli_num_rows($result_sql_select_post_img) > 0) {
    $row = mysqli_fetch_assoc($result_sql_select_post_img);
    unlink("upload/" . $row['post_img']);
}

$sql_delete_post = "DELETE FROM post WHERE post_id = {$post_id_by_addbar};";
if (mysqli_multi_query($conn, $sql_delete_post)) {
    echo "<script>window.location.href='$hostname/admin/post.php'</script>";

} else {
    echo ("<div class='alert alert-danger'>Can't Delete Post!!</div>");
}
mysqli_close($conn);

?>