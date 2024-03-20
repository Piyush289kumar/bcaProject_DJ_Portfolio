<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Response</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="member.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
           
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>क्रं.</th>

                        <th style="background:#E1412E;">Username</th>
                        <th style="background:#E1412E;">नाम</th>
                        <th style="background:#E1412E;">मोबा. नं.</th>

                        <th style="background:green;">Username</th>
                        
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                        <th>Delete</th>
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
                        $sql_show_category = "SELECT * FROM response
                        LEFT JOIN form_data ON response.main_profile = form_data.id
                        ORDER BY res_id DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($serial_num); ?>
                                    </td>                                    
                                    
                                    <td><?php echo $row['main_profile'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>

                                    <td><?php echo $row['want_profile'] ?></td>                          
                                    
                                    <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                                    <td class='delete'><a
                                            href='delete_want_to_talk.php?want_profile=<?php echo ($row['want_profile']) ?>'><i
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