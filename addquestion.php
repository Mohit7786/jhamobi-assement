<?php
session_start();
include("config.php");
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}
$error = "";
$msg = "";
if (isset($_POST['insert'])) {

    $questiontext = $_POST['questiontext'];
    $complexity = $_POST['complexity'];
    $grade = $_POST['grade'];
    $subject = $_POST['subject'];
    $status = $_POST['status'];
    $solutiontext = $_POST['solutiontext'];

    if (!empty($questiontext) && !empty($complexity) && !empty($grade) && !empty($subject) && !empty($status) && !empty($solutiontext)) {
        $sql = "insert into question ( questiontext, complexity, grade, subject, status, solutiontext ) VALUES  ('$quetiontext','$complexity','$grade', '$subject','$status','$solutiontext')";
        $result = mysqli_query($con, $sql);
        if ($result) {

            $error = "Question added successfully";
        } else {

            $error = "Try Again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->


    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Questions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Question</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- question add section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Add Questions</h1>

                        </div>
                        <form method="post" id="insert product" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h5 class="card-title">Basic Details</h5>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Program Name</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="grade">
                                                    <option value="">--- Select ---</option>
                                                    <option name="BCA" value="">BCA</option>
                                                    <option name="BSC" value="">BSC</option>
                                                    <option name="MCA" value="">MCA</option>
                                                    <option name="MSC" value="">MSC</option>
                                                    <option name="btech" value="">B.Tech</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Course Name</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="subject">
                                                    <option value="">--Select--</option>
                                                    <option name="mathematics" value="">Mathematics</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Course Name</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="status">
                                                    <option value="">--Select--</option>
                                                    <option name="active" value="">Active</option>
                                                    <option name="inactive" value="">InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h5 class="card-title">Question Details</h5>
                                        <div class="form-group row" name="complexity">
                                            <label class="col-lg-3 col-form-label">Complexity:</label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="test" id="simple" checked>
                                                            <label class="form-check-label" name="simple" for="simple">
                                                                Simple
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="test" id="medium">
                                                            <label class="form-check-label" name="medium" for="simple">
                                                                Medium
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="test" id="complex">
                                                            <label class="form-check-label" name="complex" for="simple">
                                                                Complex
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Specify Question</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <textarea class="" name="questiontext" style="padding:10px;letter-spacing:1px;" rows="3" cols="70" placeholder="Question Text" aria-label=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">

                                        <h5 class="card-title">Answer Question</h5>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">How Many Options:</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="option" id="option">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Answer Options Would have ?</label>
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="icons" id="icons" checked>
                                                    <label class="form-check-label" for="icons">
                                                        Icons Only
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="icons" id="text">
                                                    <label class="form-check-label" for="text">
                                                        Text Only
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="icons" id="icontext">
                                                    <label class="form-check-label" for="icontext">
                                                        Icons + Text
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="icons" id="pictext">
                                                    <label class="form-check-label" for="pictext">
                                                        Picture + Text
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">

                                        <h5 class="card-title">Solution Details</h5>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Solution Details:</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <textarea class="" name="solutiontext" style="padding:10px;letter-spacing:1px;" rows="3" cols="70" placeholder="Solution Text" aria-label=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Correct Answer Options</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="">
                                                    <option value="">--- Select ---</option>
                                                    <option value="">Option A</option>
                                                    <option value="">Option B</option>
                                                    <option value="">Option C</option>
                                                    <option value="">Option D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Question Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"> Question: </label>
                                                        <div class="col-lg-9">
                                                            <?php
                                                            $query1 = mysqli_query($con, "select * from question");
                                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                            ?>
                                                                <h5><?php echo $row1['2']; ?></h5>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="card-title">Solution Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"> Solution: </label>
                                                        <div class="col-lg-9">
                                                        <?php
                                                            $query1 = mysqli_query($con, "select * from question");
                                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                            ?>
                                                                <h5><?php echo $row1['7']; ?></h5>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>
                            <?php
                            if (isset($_GET['msg']))
                                echo $_GET['msg'];
                            ?>

                            <div class="text-left">
                                <input type="submit" class="btn btn-info" value="Submit" name="insert" style="margin-left:200px; margin-bottom:20px; width:20%; font-size:1.2rem;">
                            </div>
                        </form>
                    </div>
                </div>
                <!----End City add section  --->


                <!-- jQuery -->
                <script src="assets/js/jquery-3.2.1.min.js"></script>

                <!-- Bootstrap Core JS -->
                <script src="assets/js/popper.min.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>

                <!-- Slimscroll JS -->
                <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                <!-- Datatables JS -->
                <!-- Datatables JS -->
                <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
                <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
                <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

                <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

                <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
                <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
                <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
                <script src="assets/plugins/datatables/buttons.flash.min.js"></script>
                <script src="assets/plugins/datatables/buttons.print.min.js"></script>

                <!-- Custom JS -->
                <script src="assets/js/script.js"></script>

</body>

</html>