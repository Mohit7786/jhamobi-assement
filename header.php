<?php
session_start();
include("config.php");
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}
?>
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="dashboard.php" class="logo">
            <h2 class="sub-menu" style="margin-top:12px;color:black;">Admin</h2>
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left" style="color:black;"></i>
    </a>

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- User Menu -->
        <h4 style="color:black;margin-top:13px;text-transform:capitalize;">
            <?php echo $_SESSION['auser']; ?></h4>
        <li class="nav-item dropdown app-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt=""></span>
            </a>

            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6><?php echo $_SESSION['auser']; ?></h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>

        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>

<!-- header --->



<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="menu-title">
                    <span>Questions</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-map"></i> <span> Questions</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="addquestion.php"> Add Question</a></li>
                        <li><a href="viewquestion.php"> View Question </a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Question Paper</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-text-align-left"></i> <span> Question Paper</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href=""> Add Question Paper</a></li>
                        <li><a href=""> View Question Paper</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->