<?php
include("config.php");
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}
$error = "";
$msg = "";
if (isset($_REQUEST['register'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $phone = $_REQUEST['phone'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($pass)) {
        $sql = "insert into admin (auser,aemail,aphone,apass) values('$name','$email','$phone','$pass')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $msg = 'Admin Register Successfully';
        } else {
            $error = '* Not Register Admin Try Again';
        }
    } else {
        $error = "* Please Fill all the Fields!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Welcome - Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="page-wrappers login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">

                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <p style="color:red;"><?php echo $error; ?></p>
                            <p style="color:green;"><?php echo $msg; ?></p>
                            <!-- Form -->
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Phone" name="phone" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Password" name="pass">
                                </div>
                                <div class="form-group mb-0">
                                    <input class="btn btn-success btn-block" type="submit" name="register" Value="Register">
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>