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
                        style="border-radius: 16px; color:white; margin-bottom: 5px;">वैवाहिक
                        मिलान</a>
                </div>
                <div class="col-md-2">
                <a class="add-new" href="astro_admin_two.php"
                        style="background:#E1412E;  border-radius: 16px; color:white; margin-bottom: 5px;">समस्या समाधान</a>
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
                <a class="add-new" href="../astrology.php" style="border-radius:16px;">Add Astro.</a>
            </div>
            <div class="col-md-12"  style="overflow:scroll">
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
                        <th>Username</th>
                        <th>दिनांक</th>
                        <th>प्रकार</th>
                        <th>नाम</th>
                        <th>जन्म तिथि</th>
                        <th>जन्म समय</th>
                        <th>जन्म स्थान</th>
                        <th>मोबा. नं.</th>
                        <th>लिंग</th>
                        <th>पूर्ण पता</th>
                        <th>प्रदेश</th>
                        <th>जिला</th>
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
                        $sql_show_user = "SELECT * FROM astro_talk
                        LEFT JOIN form_data ON astro_talk.user_id = form_data.id
                        WHERE astro_talk.astro_category = 'समस्या समाधान' ORDER BY form_id DESC LIMIT {$offset},{$record_limit}";
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
                                        <td class='edit'><a href='update-astro_talk_process.php?category_index=<?php echo ($row['astro_id']) ?>'><i
                                                    class='fa fa-edit'></i></a></td>
                                    <?php } ?>


                                    <?php if ($row['astro_talk_process'] == "Done") { 
                                        ?>
                                        <td style="background:Green; color:#fff; ">
                                            <?php echo $row['astro_talk_process'] ?>
                                        </td>
                                    <?php
                                     }elseif ($row['astro_talk_process'] == "Cancel") {
                                        ?>
                                        <td style="background:#E1412E; color:#fff; ">
                                            <?php echo $row['astro_talk_process'] ?>
                                        </td>
                                    <?php

                                    } else{
                                        ?>
                                        <td>
                                            <?php echo $row['astro_talk_process'] ?>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <td class='id'>
                                        <?php echo $row['id'] ?>
                                    </td>

                                    <td>
                                        <?php echo ($row['date']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['astro_category']) ?>
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

                                    <?php
                                    if ($_SESSION['user_role'] == 1) {
                                        ?>
                                        <td class='delete'><a href='delete-astro_talk.php?category_index=<?php echo ($row['astro_id']) ?>'><i
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
                $sql_user_show_by_page = "SELECT * FROM astro_talk
                LEFT JOIN form_data ON astro_talk.user_id = form_data.id
                WHERE astro_talk.astro_category = 'समस्या समाधान'";
                $result_sql_user_show_by_page = mysqli_query($conn, $sql_user_show_by_page) or die("Query Die --> sql_user_show_by_page");
                if (mysqli_num_rows($result_sql_user_show_by_page) > 0) {
                    $total_user_record = mysqli_num_rows($result_sql_user_show_by_page);
                    $total_page = ceil($total_user_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");
                    if ($page_num_index_by_addbar > 1) {
                        echo ("<li><a href='astro_admin_two.php?page_num_index=" . ($page_num_index_by_addbar - 1) . "'>Prev</a></li>");
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page_num_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }
                        echo ("<li class=$active_page><a href='astro_admin_two.php?page_num_index=$i'>$i</a></li>");
                    }
                    if ($page_num_index_by_addbar < $total_page) {
                        echo ("<li><a href='astro_admin_two.php?page_num_index=" . ($page_num_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>