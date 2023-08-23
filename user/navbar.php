<?php
require_once '../controller/functions.php';
require_once '../controller/connect.php';
session_start();

?>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="../img/logo.jpg " style="width: 70px; border-radius:50%" alt=""></a>
    <button class="navbar-toggler border-2 border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars icon text-white"></i>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="menu" class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-around">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/home.php' ? 'active' : '' ?>" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/all_companies.php' ? 'active' : '' ?> " href="all_companies.php">Companies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/all_jobs.php' ? 'active' : '' ?>" href="./all_jobs.php">Jobs</a>
        </li>
        <?php if (isset($_SESSION['auth'])) : ?>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/profile.php' ? 'active' : '' ?>" href="profile.php">View Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <div class="navbar-profile  rounded-circle border" >
              <span class=" text-black"><?= toUpper($_SESSION['auth']['name'],$_SESSION['auth']['name']['0']) ?></span>
            </div>            
          </li>

        <?php elseif (!isset($_SESSION['auth'])) : ?>


          <li class="nav-item">
            <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/register.php' ? 'active' : '' ?> " href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light <?php echo $_SERVER['PHP_SELF'] == '/user/login.php' ? 'active' : '' ?>" href="login.php">Login</a>
          </li>
        
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>