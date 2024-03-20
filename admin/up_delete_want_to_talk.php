<?php
include("config.php");
$want_profile = $_GET['want_profile'];
$sql_delete_user = "DELETE FROM response WHERE want_profile='{$want_profile}'";

?>
<script>alert('Request Deleted successfully !!')</script>
<?php

if (mysqli_query($conn, $sql_delete_user)) {
    echo "<script>window.location.href='$hostname/admin/up_rishte.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
mysqli_close($conn);

?>