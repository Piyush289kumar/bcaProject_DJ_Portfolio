<?php
include("config.php");
session_start();
if (isset($_SESSION['username'])) {
    echo "<script>window.location.href='$hostname/admin/member.php'</script>";
    // header("Location:{$hostname}/admin/post.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-con" href="../images/logo.png">
    <title>ADMIN | Forgot Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min_.css" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/adminstyle_.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <!-- logo -->
                    <img class="logo" src="../images/admin_logo.png" alt="Valmiki Sangam">
                    <!-- logo -->
                    <!-- <img class="logo" src="images/news.jpg"> -->
                    <h3 class="heading  text-center" style="font-weight:700">Forgot Password</h3>
                    <!-- Form Start -->
                    <?php
                    if (isset($_POST['login'])) {
                        include("config.php");
                        $username = mysqli_real_escape_string($conn, $_POST['username']);

                        // $sql_user_pass_cheack = "SELECT * FROM form_data WHERE id = '{$username}' AND email = '{$email}'" or die("Query Failed!! --> sql_user_pass_cheack");
                        $sql_user_pass_cheack = "SELECT * FROM form_data WHERE id = '{$username}'";
                        $result_sql_user_pass_cheack = mysqli_query($conn, $sql_user_pass_cheack);
                        $otp_str = rand(11, 99);
                        $otp = strtoupper(substr(md5($otp_str), 0, 6));
                        if (mysqli_num_rows($result_sql_user_pass_cheack) > 0) {
                            while ($row = mysqli_fetch_assoc($result_sql_user_pass_cheack)) {

                                $_SESSION['forgot_username'] = $row['id'];
                                $_SESSION['forgot_email'] = $row['email'];
                                $_SESSION['forgot_otp'] = $otp;                            
                                echo "<script>window.location.href='$hostname/admin/forgot_password_otp.php'</script>";

                            }
                        } else {
                            echo "<div class='alert alert-danger'>Invalid Username !!</div>";
                        }

                    }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" autocomplete="off"
                                required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary"
                            value="&nbsp;&nbsp;Next&nbsp;&nbsp;" />
                            <button class="btn btn-secondary"><a
                                href="<?php echo $hostname ?>">&nbsp;&nbsp;Back&nbsp;&nbsp;</a></button>
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>