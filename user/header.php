<?php require_once '../controller/functions.php' ?>
<?php require_once '../controller/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs</title>
    <link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?= url("css/style.css") ?>">
    <link rel="icon" type="image/jpg/jpeg/png" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?= url("js/app.js") ?>"></script>
    <script src="<?= url("node_modules/feather-icons/dist/feather.js") ?>"></script>

</head>

<body>
    <?php require_once './navbar.php';
    session_start();
    ?>