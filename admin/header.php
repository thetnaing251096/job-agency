<?php 
    session_start();

  require_once '../controller/functions.php';
  require_once '../controller/connect.php' ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin pannel</title>
  <link rel="icon" type="image/jpg/jpeg/png" href="../img/logo.jpg">
  <link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>">
  <link rel="stylesheet" href="style.css">
  <script src="<?= url("node_modules/feather-icons/dist/feather.js") ?>"></script>
</head>

<body>

  <?php require_once './sidebar.php'; 
  ?>
