<?php include ('header.php') ?>
<!-- Hero Section Begin -->
<section class="hero spad set-bg" data-setbg="img/hero-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__text">
                    <span></span>
                    <h1>Feel the heart beats</h1>
                    <p>Where music meets magic</p>
                    <!-- <a href="https://www.youtube.com/watch?v=K4DyBUG242c" class="play-btn video-popup"><i class="fa fa-play"></i></a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="linear__icon">
        <i class="fa fa-angle-double-down"></i>
    </div>
</section>
<!-- Hero Section End -->

<!-- Event Section Begin -->
<section class="event spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Events</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="event__slider owl-carousel">


                <!-- PHP CODE -->
                <?php
                include ("config.php");
                if (isset($_GET['page_num_index'])) {
                    $page_num_index_by_addbar = $_GET['page_num_index'];
                } else {
                    $page_num_index_by_addbar = 1;
                }
                $record_limit = 8;
                $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                $sql_show_user = "SELECT * FROM achievement WHERE active_record = 'Yes' ORDER BY aid DESC LIMIT {$offset},{$record_limit}";
                $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                if (mysqli_num_rows($result_sql_show_user) > 0) {
                    $serial_num = $offset + 1;
                    while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                        ?>

                        <div class="col-lg-4">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="admin/upload/<?php echo ($row['aimg']) ?>"
                                    style='background-image: url("admin/upload/<?php echo ($row['aimg']) ?>")'></div>>
                                <div class="tag-date">
                                    <span> <?php echo ($row['adate']) ?></span>
                                </div>
                            </div>
                            <div class="event__item__text">
                                <h4><?php echo ($row['atitle']) ?></h4>
                                <p><i class="fa fa-map-marker"></i> <?php echo ($row['atype']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php }
                } ?>
        </div>
    </div>
    </div>
</section>
<!-- Event Section End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about__pic">
                    <img src="img/about/about.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__text">
                    <div class="section-title">
                        <h2>DJ Rishab Tiwari</h2>
                        <h1>About me</h1>
                    </div>
                    <p>I knows how to move your mind, body and soul by delivering tracks that stand out
                        from the norm. As if this impressive succession of high impact, floor-filling bombs wasn't
                        enough to sustain.</p>
                    <a href="contact.php" class="primary-btn">CONTACT ME</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Services Section Begin -->
<section class="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="services__left set-bg" data-setbg="img/services/service-left.jpg">

                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="row services__list">
                    <div class="col-lg-6 p-0 order-lg-1 col-md-6 order-md-1">
                        <div class="service__item deep-bg">
                            <img src="img/services/service-1.png" alt="">
                            <h4>Wedding</h4>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p> -->
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-2 col-md-6 order-md-2">
                        <div class="service__item">
                            <img src="img/services/service-2.png" alt="">
                            <h4>Clubs and bar</h4>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p> -->
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-4 col-md-6 order-md-4">
                        <div class="service__item deep-bg">
                            <img src="img/services/service-4.png" alt="">
                            <h4>DJ lessons</h4>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p> -->
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-3 col-md-6 order-md-3">
                        <div class="service__item">
                            <img src="img/services/service-3.png" alt="">
                            <h4>Corporate events</h4>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<!-- Track Section Begin -->
<section class="track spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Latest tracks</h2>
                    <h1>Music podcast</h1>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between align-items-center">

            <div class="col-md-7">
                <div class="row">


                    <!-- PHP CODE -->
                    <?php
                    include ("config.php");
                    if (isset($_GET['page_num_index'])) {
                        $page_num_index_by_addbar = $_GET['page_num_index'];
                    } else {
                        $page_num_index_by_addbar = 1;
                    }
                    $record_limit = 6;
                    $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                    $sql_show_user = "SELECT * FROM tracks WHERE active_record = 'Yes' ORDER BY aid DESC LIMIT {$offset},{$record_limit}";
                    $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                    if (mysqli_num_rows($result_sql_show_user) > 0) {
                        $serial_num = $offset + 1;
                        while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                            ?>
                            <div class="col-md-12" style='border-top: 1px solid #5C00CE; padding:12px 2px'>
                                <div
                                    style='display: flex; flex-direction:row;align-items: center; justify-content: space-between; '>
                                    <h3 style='font-weight:600;'><?php echo $row['atitle']; ?></h3>
                                    <audio controls src="admin/upload/<?php echo $row['link']; ?>"></audio>
                                </div>
                            </div>

                        <?php }
                    } ?>
                </div>
            </div>
            <div class="col-md-5">
                <img src="img/track-right.jpg" alt="Error" style="border-radius: 8px;">
            </div>
        </div>
    </div>
</section>
<!-- Track Section End -->

<!-- Youtube Section Begin -->
<section class="youtube spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Youtube feed</h2>
                    <h1>Latest videos</h1>
                </div>
            </div>
        </div>
        <div class="row">


            <!-- PHP CODE -->
            <?php
            include ("config.php");
            if (isset($_GET['page_num_index'])) {
                $page_num_index_by_addbar = $_GET['page_num_index'];
            } else {
                $page_num_index_by_addbar = 1;
            }
            $record_limit = 6;
            $offset = ($page_num_index_by_addbar - 1) * $record_limit;
            $sql_show_user = "SELECT * FROM youtube WHERE active_record = 'Yes' ORDER BY aid DESC LIMIT {$offset},{$record_limit}";
            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
            if (mysqli_num_rows($result_sql_show_user) > 0) {
                $serial_num = $offset + 1;
                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                    ?>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="youtube__item">
                            <div class="youtube__item__pic set-bg" data-setbg="admin/upload/<?php echo ($row['img']) ?>"
                                style='background-image: url("admin/upload/<?php echo ($row['img']) ?>")'>
                                <a href="<?php echo ($row['link']) ?>" class="play-btn video-popup"><i
                                        class="fa fa-play"></i></a>
                            </div>
                            <div class="youtube__item__text">
                                <h4><?php echo ($row['atitle']) ?></h4>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>
        </div>
    </div>
</section>
<!-- Youtube Section End -->

<!-- Countdown Section Begin -->
<section class="countdown spad set-bg" data-setbg="img/countdown-bg.jpg" style='margin-bottom:300px;'>

</section>
<!-- Countdown Section End -->


<?php include ('footer.php') ?>