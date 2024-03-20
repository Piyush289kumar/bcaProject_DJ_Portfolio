<?php
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
$category_index_by_addbar = $_GET['category_index'];
?>
<script>alert('Deleted successfully !!')</script>
<?php
$sql_category_delete = "DELETE FROM reste WHERE rid = {$category_index_by_addbar}" or die("Query Failed!! --> sql_category_delete");
if (mysqli_query($conn, $sql_category_delete)) {
    echo "<script>window.location.href='$hostname/admin'</script>";

}
mysqli_close($conn);
?>