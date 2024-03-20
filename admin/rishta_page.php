<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
if (!isset($_GET['member_id'])) {
    $member_id_by_addbar = $_GET['member_id'];
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="admin-heading">All Rishte</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="member.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-4">
                <a class="add-new" style="border-radius:16px;"  href="add-rishta.php?main_profile=<?php echo $member_id_by_addbar = $_GET['member_id']; ?>">Assign Rishta</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>क्रं.</th>
                        <th>Username</th>
                        <th>नाम</th>
                        <th>जन्म तिथि</th>
                        <th>शैक्षणिक योग्यता</th>
                        <th>मोबा. नं.</th>
                        <th>पिता का नाम</th>
                        <th>पिता का मोबा.</th>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                        <th>Edit</th>
                        <?php
                        }
                            ?>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        if (isset($_GET['category_page_index'])) {
                            $page_index_by_addbar = $_GET['category_page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limit = 5;
                        $offset = ($page_index_by_addbar - 1) * $record_limit;
                        $sql_show_category = "SELECT * FROM reste
                        LEFT JOIN form_data ON reste.assin_profile = form_data.id
                        WHERE reste.main_profile = '{$member_id_by_addbar}' ORDER BY reste.rid DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {

                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($serial_num); ?>
                                    </td>                                    
                                    
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo ($row['name']) ?></td>
                                    <td><?php echo ($row['dob']) ?></td>
                                    
                                    <td><?php echo ($row['edu']) ?></td>
                                    
                                    <td><?php echo ($row['phone']) ?></td>
                                    
                                    <td><?php echo ($row['fname']) ?></td>
                                    <td><?php echo ($row['fphone']) ?></td>
                                    <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                                    <td class='delete'><a
                                            href='delete-rishta.php?category_index=<?php echo ($row['rid']) ?>'><i
                                                class='fa fa-trash'></i></a></td>
                               <?php }?></tr>
                                <?php $serial_num++;
                            }
                            
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>