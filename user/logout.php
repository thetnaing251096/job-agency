<?php 

require_once '../controller/functions.php';
require_once '../controller/connect.php';
session_start();
if(isset($_SESSION['auth'])){
    unset ($_SESSION['auth']);
    redirect('home.php');
}