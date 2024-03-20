<?php
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
$want_profile = $_GET['want_profile'];
$sql_delete_user = "DELETE FROM response WHERE want_profile='{$want_profile}'";

?>
<script>alert('Deleted successfully !!')</script>
<?php


if (mysqli_query($conn, $sql_delete_user)) {
    echo "<script>window.location.href='$hostname/admin/want_to_talk.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
mysqli_close($conn);

?>