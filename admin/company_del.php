<?php 
require_once './header.php';
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM categories WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        redirect($_SERVER['HTTP_REFERER'],"Delete company successful");
    }
}