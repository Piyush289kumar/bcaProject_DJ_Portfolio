<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="index,follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="Hindi">
  <meta name="revisit-after" content="1 day">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <?php
  include("config.php");
  session_start();
  if (!isset($_GET['post_id'])) {
    $page_index_by_addbar = 1;
  } else {
    $page_index_by_addbar = $_GET['post_id'];
  }
  if ($page_index_by_addbar == 1) { ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Valmiki Sangam | Trusted Matrimony for Valmiki Samaj</title>
    <meta name="title" content="Valmiki Sangam | Trusted Matrimony for Valmiki Samaj">
    <meta name="description"
      content="Valmiki Samaj matrimony by Valmikisangam.com is a matrimonial platform trusted by Valmiki samaj brides and grooms with 100% verified profiles.">
    <meta name="keywords"
      content="valmikisangam, valmikisangam jabalpur, valmiki sangam, valmiki sangam jabalpur, valmiki shaadi valmiki shaadi jabalpur, valmiki shadi, valmiki shadi jabalpur, valmikishaadi, valmikishaadi jabalpur, valmikishadi, valmikisangam.com, valmiki samaz,  वाल्मीकि संगम,  वाल्मीकि समाज,  वाल्मीकि शादी,  वाल्मीकिशादी,  वाल्मीकि, वाल्मीकिसंगम, संगम वाल्मीकि, संगमवाल्मीकि,  वाल्मीकि संगम जबलपुर,  वाल्मीकि शादी जबलपुर, valmiki samaj, samajvalmiki, samaj valmiki, shaadi, shadi, hindushadi, hinduvalmiki, valmikiji, valmiki ji, rhishi valmiki, hrishi valmiki, pandit valmiki, pt. valmiki, jabalpur">
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Hindi">
    <meta name="revisit-after" content="1 day">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - वाल्मीकि संगम">
    <meta property="og:url" content="https://www.valmikisangam.com">
    <meta property="og:site_name" content="https://www.valmikisangam.com">
    <!-- Facebook Meta Tags -->
    <meta name="og:card" content="summary_large_image">
    <meta property="og:site" content="@valmikisangam">
    <meta property="og:creator" content="@valmikisanga">
    <meta property="og:domain" content="https://www.valmikisangam.com">
    <meta name="og:description"
      content="Valmiki Samaj matrimony by Valmikisangam.com is a matrimonial platform trusted by Valmiki samaj brides and grooms with 100% verified profiles.">
    <meta name="og:image" content="https://www.valmikisangam.com/sm.png">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Home - वाल्मीकि संगम">
    <meta property="twitter:site" content="@valmikisangam">
    <meta property="twitter:creator" content="@valmikisangam">
    <meta property="twitter:domain" content="https://www.valmikisangam.com">
    <meta property="twitter:url" content="https://www.valmikisangam.com">
    <meta name="twitter:description"
      content="Valmiki Samaj matrimony by Valmikisangam.com is a matrimonial platform trusted by Valmiki samaj brides and grooms with 100% verified profiles.">
    <meta name="twitter:image" content="https://www.valmikisangam.com/sm.png">
    <?php
  } else {
    $sql_show_post_record = "SELECT *  FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$page_index_by_addbar}" or die("Query Failed!! --> sql_show_post_record");
    $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
    if (mysqli_num_rows($result_sql_show_post_record) > 0) {
      while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
        ?>
        <title>
          <?php echo $row['title']; ?>
        </title>
        <meta name="title" content="<?php echo $row['title']; ?>">
        <meta name="description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
        <!-- Facebook tag -->
        <meta property="og:title" content="<?php echo $row['title']; ?> - वाल्मीकि संगम">
        <meta property="og:url" content="https://www.newsrecall.in/single.php?post_id=<?php $row['post_id'] ?>">
        <meta name="og:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
        <meta name="og:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['post_img']; ?>">
        <!-- Twitter Meta Tags -->
        <meta property="twitter:title" content="<?php echo $row['title']; ?> - वाल्मीकि संगम">
        <meta property="twitter:url" content="https://www.newsrecall.in/single.php?post_id=<?php $row['post_id'] ?>">
        <meta name="twitter:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
        <meta name="twitter:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['post_img']; ?>">
      <?php }
    } ?>
    <!-- Facebook Meta Tags -->
    <meta name="og:card" content="summary_large_image">
    <meta property="og:site" content="@valmikisangam">
    <meta property="og:creator" content="@valmikisangam">
    <meta property="og:domain" content="https://www.valmikisangam.com">
    <meta property="og:site_name" content="https://www.valmikisangam.com">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@valmikisangam">
    <meta property="twitter:creator" content="@valmikisangam">
    <meta property="twitter:domain" content="https://www.valmikisangam.com">
    <!-- social meta tag end  -->
  <?php } ?>
  <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- x-icon -->
  <link rel="shortcut icon" type="x-con" href=" ../images/VSlogo.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/frontend_.css" />
  <!-- google fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <!-- fontawesome -->
  <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <!-- header -->
  <header>
    <div class="navigation-container">
      <div class="top-head">
        <div class="web-name">
          <a href="../index.php"><img src="../images/VSlogo.png" alt="LOGO" /></a>
        </div>
        <div class="ham-btn">
          <span>
            <i class="fas fa-bars"></i>
          </span>
        </div>
        <div class="times-btn">
          <span>
            <i class="fas fa-times"></i>
          </span>
        </div>
      </div>
      <!-- nav bar -->
      <div class="nav-bar" id="nav-bar">
        <nav>
          <ul>
            <!-- <li><a href="up_user_profile.php">Hello : <php echo $_SESSION['username']; ?></a></li> -->
            <li><a href="up_user_profile.php">बायोडाटा</a></li>
            <li><a href="up_rishte.php">रिश्ते</a></li>
            <li><a href="up_astrology.php">ज्योतिषीय परामर्श</a></li>
            <li><a href="up_kundali_milan.php">कुंड़ली मिलान</a></li>
          </ul>
        </nav>


        <button class="login_btn mx-4"><a href="logout.php">Logout</a></button>


        <!-- DropDown -->
        <!-- <button class="login_btn mx-4 mb-2"><a href="#">log-In</a></button> -->
      </div>
    </div>
    <!--social icons -->
    <!-- Contact us -->
    <div class="col-12 contact-us-col-12">
      <div class="contact-us-links">
        <ul class="contact-us-links-li">
          <li>
            <a href="#"><i class="fab fa-facebook"></i>www.facebook.com</a>
          </li>
          <li>
            <a href="#"><i class="fab fa-twitter"></i>www.twitter.com</a>
          </li>
          <li>
            <a href="#"><i class="fab fa-instagram"></i>www.instagram.com</a>
          </li>
          <li>
            <a href="#"><i class="fab fa-youtube"></i>www.youtube.com</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Contact us -->
    <!-- Leaf section start -->
    <div class="col-12 animate_bounce" style="margin-top: -1px;">
      <img src="../images/_leaf.png" alt="error" id="leaf">
    </div>
    <!-- Leaf section end -->
  </header>
  <!-- header -->