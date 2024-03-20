<?php include "header.php";

include("config.php");
if ($_SESSION['user_role'] == 0) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mb-2">
                <h5 class="admin-heading">All Notification</h5>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="notification-insert.php" style="border-radius:16px; margin-bottom:25px">Add Notification</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th style='background:#ff2e00; color:#fff;'>Expiry Date</th>
                        <th>Display</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <!-- PHP CODE -->
                        <?php
                        include("config.php");
                        if (isset($_GET['page_num_index'])) {
                            $page_num_index_by_addbar = $_GET['page_num_index'];
                        } else {
                            $page_num_index_by_addbar = 1;
                        }

                        $record_limit = 10;
                        $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                        $sql_show_user = "SELECT * FROM notification WHERE active_record = 'Yes' ORDER BY nid DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {

                        ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo ($serial_num); ?>
                                    </td>
                                    <td style='text-align: center;'>
                                        <?php echo ($row['ndate']) ?>
                                    </td>


                                    <?php
                                    if (($row['display']) == 'Yes') {
                                    ?>
                                        <td style='text-align: center; background: #25D366; color:#fff;'>
                                            <?php echo ($row['display']) ?>
                                        </td>
                                    <?php
                                    } else {
                                        ?>
                                        <td style='text-align: center; background: #ff2e00; color:#fff;'>
                                            <?php echo ($row['display']) ?>
                                        </td>
                                    <?php
                                    }

                                    ?>




                                    <td>
                                        <?php echo ($row['ntitle']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['ntype']) ?>
                                    </td>
                                    <td class='edit'><a href='notification-update.php?id=<?php echo ($row["nid"]) ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='notification-delete.php?id=<?php echo ($row["nid"]) ?>'><i class='fa fa-trash'></i></a></td>
                                </tr>

                        <?php $serial_num++;
                            }
                        } ?>
                        <!-- PHP CODE -->

                    </tbody>
                </table>
                <!-- Pagination PHHP CODE -->
                <?php
                $sql_user_show_by_page = "SELECT * FROM notification WHERE active_record = 'Yes'";
                $result_sql_user_show_by_page = mysqli_query($conn, $sql_user_show_by_page) or die("Query Die --> sql_user_show_by_page");
                if (mysqli_num_rows($result_sql_user_show_by_page) > 0) {
                    $total_user_record = mysqli_num_rows($result_sql_user_show_by_page);

                    $total_page = ceil($total_user_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");

                    if ($page_num_index_by_addbar > 1) {
                        echo ("<li><a href='notification-read.php?page_num_index=" . ($page_num_index_by_addbar - 1) . "'>Prev</a></li>");
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page_num_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }

                        echo ("<li class=$active_page><a href='notification-read.php?page_num_index=$i'>$i</a></li>");
                    }

                    if ($page_num_index_by_addbar < $total_page) {
                        echo ("<li><a href='notification-read.php?page_num_index=" . ($page_num_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>