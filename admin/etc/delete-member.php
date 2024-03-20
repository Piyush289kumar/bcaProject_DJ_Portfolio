<?php
include("config.php");
// if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
//     echo "<script>window.location.href='$hostname/admin/'</script>";
// }
$category_index_by_addbar = $_GET['category_index'];
?>
<script>alert('Deleted successfully !!')</script>
<?php
// Delete Member
$sql_category_delete = "DELETE FROM form_data WHERE id = '{$category_index_by_addbar}'" or die("Query Failed!! --> sql_category_delete");
if (mysqli_query($conn, $sql_category_delete)) {
    echo "DONE --> form_data";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the Member Record.");
}
// Delete User
$sql_delete_user = "DELETE FROM user WHERE username ='{$category_index_by_addbar}'";
if (mysqli_query($conn, $sql_delete_user)) {
    echo "<script>window.location.href='$hostname/admin/member.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
mysqli_close($conn);
?>