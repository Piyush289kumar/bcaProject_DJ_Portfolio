<?php
include("config.php");
session_start();
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
 $category_index_by_addbar = $_GET['category_index'];
 
?>
<script>alert('Deleted successfully !!')</script>
<?php

$sql_category_delete = "DELETE FROM astro_talk WHERE astro_id = '{$category_index_by_addbar}'" or die("Query Failed!! --> sql_category_delete");
if (mysqli_query($conn, $sql_category_delete)) {
    
    echo "<script>window.location.href='$hostname/admin/astro_admin.php'</script>";

}
mysqli_close($conn);
?>