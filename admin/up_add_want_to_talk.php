<?php
include("config.php");
$main_profile = $_GET['main_profile'];
$want_profile = $_GET['want_profile'];
?>
<script>alert('Request Send successfully !!')</script>
<?php

// $sql_delete_user = "DELETE FROM user WHERE user_id='{$user_id_getaddbar}'";

$sql_insert_user = "INSERT INTO response (main_profile, want_profile)
                    values('{$main_profile}','{$want_profile}')";

if (mysqli_query($conn, $sql_insert_user)) {
    echo "<script>window.location.href='$hostname/admin/up_rishte.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
mysqli_close($conn);

?>