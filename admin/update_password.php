<?php
include("config.php");
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-con" href="../images/logo.png">
    <title>ADMIN | OTP</title>
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
                        $otp = mysqli_real_escape_string($conn, $_POST['otp']);
                        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

                        // $sql_user_pass_cheack = "SELECT * FROM form_data WHERE id = '{$username}' AND email = '{$email}'" or die("Query Failed!! --> sql_user_pass_cheack");
                    
                        $sql_update_user = "UPDATE user SET password = '{$password}' WHERE otp ='{$otp}'";
                        if (mysqli_query($conn, $sql_update_user)) {
                            echo "<script>window.location.href='$hostname/admin'</script>";
                        } else {
                            echo "<div class='alert alert-danger'>Invalid OTP !!</div>";
                        }

                    }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <p style="text-align:center;">Cheack Your Mail Box</p>
                            <label>Enter OTP</label>
                            <input type="text" name="otp" class="form-control" placeholder="" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Create New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary"
                            value="&nbsp;&nbsp;Create&nbsp;&nbsp;" />
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