<?php

require_once '../controller/functions.php';
require_once '../controller/connect.php';
session_start();

?>
<nav>
    <div class=" text-center">
        <img src="../img/logo.jpg" alt="" style="width: 70px; border-radius:50%">
    </div>
    <ul>
        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/home.php' ? 'active' : '' ?> d-flex justify-content-start ">
            <i data-feather="table"></i>
            <a class="ms-2" href="home.php">
                Jobs Table
            </a>
        </li>
        <li class=" <?php echo $_SERVER['PHP_SELF'] == '/admin/insert_jobs.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="inbox"></i>
            <a class="ms-2" href="insert_jobs.php">
                Input Jobs
            </a>
        </li>

        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/company.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="home"></i>
            <a class="ms-2" href="company.php">
                Companies
            </a>
        </li>
        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/insert_company.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="inbox"></i>
            <a class="ms-2" href="insert_company.php">
                Input Company
            </a>
        </li>
        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/user_table.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="users"></i>
            <a class="ms-2" href="user_table.php">
                Users Table
            </a>
        </li>
        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/applications.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="activity"></i>
            <a class="ms-2" href="applications.php">
                Applications
            </a>
        </li>
        <li class="<?php echo $_SERVER['PHP_SELF'] == '/admin/new_admin.php' ? 'active' : '' ?> d-flex justify-content-start">
            <i data-feather="user-plus"></i>
            <a class="ms-2" href="./new_admin.php">
                Add Admin
            </a>
        </li>
        <div class="d-flex mt-5 align-items-center justify-content-center h-25">
            <?php if (isset($_SESSION['admin'])) : ?>

                <div class="">
                    <div class="admin-img">

                    </div>
                    <i data-feather="log-out"></i>
                </div>
                <div class=" ms-3 admin">
                    <p class="  m-0"><?= $_SESSION['admin']['name'] ?> </p>
                    <p class="">admin</p>

                    <a href="login.php" class=" text-decoration-none text-white"> Logout</a>
                </div>



            <?php endif ?>
        </div>

</nav>