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
                    <a href="up_kundali_milan.php" class="btn btn-primary"
                        style="background-color: #F31559; border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;"><i
                            class="fa-solid fa-arrows-rotate"></i> Refresh</a>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <a href="../kundali_milan.php?user_detail=<?php echo $_SESSION['username'] ?>"
                        class="btn btn-primary"
                        style="background-color: sky; border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;"><i
                            class="fa-solid fa-circle-plus"></i> ADD कुंड़ली मिलान</a>
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
            $sql_show_category = "SELECT * FROM kundali_milan
            LEFT JOIN form_data ON kundali_milan.main_profile = form_data.id
            WHERE kundali_milan.main_profile = '{$user}' ORDER BY kundali_milan.km_id DESC LIMIT {$offset},{$record_limi}";
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
                                    • कुंड़ली मिलान •
                                </p>
                                <p class="card-text m-0">
                                <?php echo $row['b_name']; ?>
                                </p>
                                <p class="card-text m-0">
                                <?php echo $row['b_gender']; ?>
                                </p>
                                <p class="card-text m-0">
                                    <?php
                                    if ($row['b_date'] != NULL) {
                                        echo $row['b_date'];
                                    } else {
                                        echo ("-----");
                                    }
                                    ?>
                                </p>
                                <!-- <p class="card-text">
                                    <php echo $row['edu']; ?>
                                </p> -->
                                <p class="card-text">                               
                                </p>
                                <?php
                                if ($row['process'] == "Cancel") { ?>

                                    <a href="#"
                                        class="btn btn-primary"
                                        style="background-color: #F31559; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;"><?php echo $row['process']; ?></a>

                                    <?php
                                } else  if ($row['process'] == "Done")  {
                                    ?>

                                    <a href="#"
                                        class="btn btn-primary"
                                        style="background-color: #5cdb5c; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">&nbsp;&nbsp;<?php echo $row['process']; ?>&nbsp;&nbsp;</a>

                                    <?php
                                }else{
                                    ?>

                                    <a href="#"
                                        class="btn btn-primary"
                                        style="background-color: grey; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;"><?php echo $row['process']; ?></a>

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
                    echo ("<li><a href='$hostname/admin/up_kundali_milan.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page_index_by_addbar == $i) {
                        $active_page = "active";
                    } else {
                        $active_page = "";
                    }
                    echo ("<li class=$active_page><a href='$hostname/admin/up_kundali_milan.php?page_index=$i'>$i</a></li>");
                }
                if ($page_index_by_addbar < $total_page) {
                    echo ("<li><a href='$hostname/admin/up_kundali_milan.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
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