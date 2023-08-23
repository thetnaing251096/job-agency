<?php 
require_once '../controller/functions.php';
require_once '../controller/connect.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        redirect("./new_admin.php","Admin delete successful");
    }
}