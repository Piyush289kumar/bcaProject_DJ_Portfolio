<?php include('up_header.php');
$user = $_SESSION['username'];
if ($_SESSION['user_role'] != 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div class="container">
    <!-- Home Page Section Start -->
    <section>
        <div class="row m-4">
            <div class="row">
                <div class="offset-md-6 col-md-3 mb-4 text-center">
                    <a href="up_astrology.php" class="btn btn-primary"
                        style="background-color: #F31559; border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;"><i
                            class="fa-solid fa-arrows-rotate"></i> Refresh</a>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <a href="../astrology.php?user_detail=<?php echo  $_SESSION['username'] ?>" class="btn btn-primary"
                        style="background-color: sky; border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;"><i
                            class="fa-solid fa-circle-plus"></i> ADD ज्योतिषीय परामर्श</a>
                </div>
            </div>
            <!-- PHP CODE -->
            <?php
            include("config.php");
            if (isset($_GET['page_index'])) {
                $page_index_by_addbar = $_GET['page_index'];
            } else {
                $page_index_by_addbar = 1;
            }
            $record_limi = 10;
            $offset = ($page_index_by_addbar - 1) * $record_limi;
            $sql_show_category = "SELECT * FROM astro_talk
            LEFT JOIN form_data ON astro_talk.user_id = form_data.id
            WHERE astro_talk.user_id = '{$user}' ORDER BY form_id DESC LIMIT {$offset},{$record_limi}";
            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
            if (mysqli_num_rows($result_sql_show_category) > 0) {
                $serial_num = 1;
                while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                    $want_profile = $row['id'];
                    ?>
                    <!-- Card start -->
                    <div class="col-md-3 mb-2">
                        <div class="card" style="border: 1px solid #ff5733; border-radius: 12px;">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
                                style="display: flex; justify-content: center;">
                                <img src="upload/member/<?php echo $row['img']; ?>" alt="Unlink" class="img-fluid mt-3"
                                    style="border: 2px solid #ff5733; border-radius: 50%;  width:100px; height: 100px;" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <!-- <h5 class="card-title"></h5> -->
                                <p class="card-text m-0">
                                    <?php echo $row['astro_category']; ?>
                                </p>
                                <p class="card-text m-0">
                                    <?php
                                    if ($row['astro_date'] != NULL) {
                                        echo $row['astro_date'];
                                    } else {
                                        echo ("-----");
                                    }
                                    ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $row['edu']; ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $row['astro_talk_process']; ?>
                                </p>
                                <?php
                                $sql_button_skill = "SELECT want_profile FROM response WHERE want_profile = '{$want_profile}'";
                                $result_sql_button_skill = mysqli_query($conn, $sql_button_skill) or die("Query Failed!! --> sql_button_skill");
                                if (mysqli_num_rows($result_sql_button_skill) > 0) {
                                    while ($record = mysqli_fetch_assoc($result_sql_button_skill)) {
                                        if ($record['want_profile'] != NULL) {
                                            ?>
                                            <a href="up_delete_want_to_talk.php?want_profile=<?php echo ($row['id']) ?>"
                                                class="btn btn-primary"
                                                style="background: rgba(128, 128, 128, 0.146); color: #1c2331; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">&#160&#160&#160
                                                रद्द करे &#160&#160&#160</a>
                                            <?php
                                        } else {
                                        }
                                    }
                                } else {
                                    ?>
                                    <a href="up_add_want_to_talk.php?main_profile=<?php echo $_SESSION['username'] ?>&want_profile=<?php echo ($row['id']) ?>"
                                        class="btn btn-primary"
                                        style="background-color: #ff5733; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">संपर्क
                                        करें</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Card End -->
                    <?php
                }
            }
            ?>
            <?php
            // pagenation block start
            $sql_total_post_record = "SELECT * FROM astro_talk
            LEFT JOIN form_data ON astro_talk.user_id = form_data.id
            WHERE astro_talk.user_id = '{$user}'" or die("Query Failed !! --> sql_total_post_record");
            $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
            if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                $total_page = ceil($total_post_record / $record_limi);
                echo ("<ul class='pagination admin-pagination'>");
                if ($page_index_by_addbar > 1) {
                    echo ("<li><a href='$hostname/admin/up_astrology.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page_index_by_addbar == $i) {
                        $active_page = "active";
                    } else {
                        $active_page = "";
                    }
                    echo ("<li class=$active_page><a href='$hostname/admin/up_astrology.php?page_index=$i'>$i</a></li>");
                }
                if ($page_index_by_addbar < $total_page) {
                    echo ("<li><a href='$hostname/admin/up_astrology.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                }
                echo ("</ul>");
            }
            // pagenation block end
            ?>
        </div>
    </section>
    <!-- Home Page Section End -->
</div>
<?php include('up_footer.php');