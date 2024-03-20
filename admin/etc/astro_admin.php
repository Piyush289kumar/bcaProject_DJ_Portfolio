<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    <a class="add-new" href="astro_admin.php"
                        style="background:#E1412E; border-radius: 16px; color:white; margin-bottom: 5px;">वैवाहिक
                        मिलान</a>
                </div>
                <div class="col-md-2">
                    <a class="add-new" href="astro_admin_two.php"
                        style="border-radius: 16px; color:white; margin-bottom: 5px;">समस्या समाधान</a>
                </div>
                <div class="col-md-2">
                    <a class="add-new" href="astro_admin_three.php"
                        style="border-radius: 16px; color:white; margin-bottom: 5px;">ETC</a>
                </div>
            </div>
            <div class="col-md-10">
                <h5 class="admin-heading">All Astrologiest Users</h5>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="../kundali_milan.php" style="border-radius:16px;">Add kundali.</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>क्रं.</th>
                        <?php
                        if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 5) {
                            ?>
                            <th>Edit</th>
                            <?php
                        }
                        ?>
                        <th>स्थिति</th>
                        <th>दिनांक</th>
                        <th style="background:Green;">Username</th>
                        <th style="background:Green;">नाम</th>
                        <th style="background:Green;">जन्म तिथि</th>
                        <th style="background:Green;">जन्म समय</th>
                        <th style="background:Green;">जन्म स्थान</th>
                        <th style="background:Green;">मोबा. नं.</th>
                        <th style="background:Green;">लिंग</th>
                        <th style="background:Green;">पूर्ण पता</th>
                        <th style="background:Green;">प्रदेश</th>
                        <th style="background:Green;">जिला</th>
                        <th style="background:#E1412E;">नाम</th>
                        <th style="background:#E1412E;">जन्म तिथि</th>
                        <th style="background:#E1412E;">जन्म समय</th>
                        <th style="background:#E1412E;">जन्म स्थान</th>
                        <th style="background:#E1412E;">मोबा. नं.</th>
                        <th style="background:#E1412E;">लिंग</th>
                        <th style="background:#E1412E;">पूर्ण पता</th>
                        <th style="background:#E1412E;">प्रदेश</th>
                        <th style="background:#E1412E;">जिला</th>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                            <th>Delete</th>
                            <?php
                        }
                        ?>
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
                        $record_limit = 5;
                        $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                        $sql_show_user = "SELECT * FROM kundali_milan
                        LEFT JOIN form_data ON kundali_milan.main_profile = form_data.id
                        ORDER BY kundali_milan.km_id DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($serial_num); ?>
                                    </td>
                                    <?php
                                    if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 5) {
                                        ?>
                                        <td class='edit'><a
                                                href='update-kundali_milan.php?category_index=<?php echo ($row['km_id']) ?>'><i
                                                    class='fa fa-edit'></i></a></td>
                                    <?php } ?>
                                    <?php if ($row['process'] == "Done") {
                                        ?>
                                        <td style="background:Green; color:#fff; ">
                                            <?php echo $row['process'] ?>
                                        </td>
                                        <?php
                                    } elseif ($row['process'] == "Cancel") {
                                        ?>
                                        <td style="background:#E1412E; color:#fff; ">
                                            <?php echo $row['process'] ?>
                                        </td>
                                        <?php
                                    } else {
                                        ?>
                                        <td>
                                            <?php echo $row['process'] ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <!-- Green Team -->
                                    <td>
                                        <?php echo ($row['b_date']) ?>
                                    </td>
                                    <td class='id'>
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dob']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dot']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dol']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['phone']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['gender']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['address']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['pradesh']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jila']) ?>
                                    </td>
                                    <!-- Red Team -->
                                    <td>
                                        <?php echo ($row['b_name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_dob']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_dot']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_dol']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_phone']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_gender']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_add']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_pradesh']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['b_jila']) ?>
                                    </td>
                                    <?php
                                    if ($_SESSION['user_role'] == 1) {
                                        ?>
                                        <td class='delete'><a
                                                href='delete-kundali_milan.php?category_index=<?php echo ($row['km_id']) ?>'><i
                                                    class='fa fa-trash'></i></a></td>
                                    <?php } ?>
                                </tr>
                                <?php $serial_num++;
                            }
                        } ?>
                        <!-- PHP CODE -->
                    </tbody>
                </table>
                <!-- Pagination PHHP CODE -->
                <?php
                $sql_user_show_by_page = "SELECT * FROM kundali_milan
                LEFT JOIN form_data ON kundali_milan.main_profile = form_data.id";
                $result_sql_user_show_by_page = mysqli_query($conn, $sql_user_show_by_page) or die("Query Die --> sql_user_show_by_page");
                if (mysqli_num_rows($result_sql_user_show_by_page) > 0) {
                    $total_user_record = mysqli_num_rows($result_sql_user_show_by_page);
                    $total_page = ceil($total_user_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");
                    if ($page_num_index_by_addbar > 1) {
                        echo ("<li><a href='astro_admin.php?page_num_index=" . ($page_num_index_by_addbar - 1) . "'>Prev</a></li>");
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page_num_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }
                        echo ("<li class=$active_page><a href='astro_admin.php?page_num_index=$i'>$i</a></li>");
                    }
                    if ($page_num_index_by_addbar < $total_page) {
                        echo ("<li><a href='astro_admin.php?page_num_index=" . ($page_num_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>