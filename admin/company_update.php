<?php
require_once './header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql = "UPDATE categories SET name='$name' WHERE id=$id";
    if($_FILES['error'] == 0){
        $file = "../img/";
        $featurePhotoName = $_FILES['feature_photo']['name'];
        
        move_uploaded_file($_FILES['feature_photo']['tmp_name'],$file.$featurePhotoName);
        }
        if(mysqli_query($conn,$sql)){
        redirect("company.php","Update company successful");
    
        }
}