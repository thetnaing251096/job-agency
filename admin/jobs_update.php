<?php 
require_once './header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $categories_id = $_POST['categories_id'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $loaction = $_POST['location'];
    $salary = $_POST['salary'];
    $job_type = $_POST['job_type'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $requirement = $_POST['requirement'];
    $photo = $_FILES['photo']['name'];
    $feature_photo = $_FILES['feature_photo']['name'];

    $sql = "UPDATE jobs SET categories_id=$categories_id,title='$title',company='$company',location='$loaction',salary='$salary',job_type='$job_type',address='$address',description='$description',requirement='$requirement',photo='$photo',feature_photo='$feature_photo' WHERE id = $id";
    
    if($_FILES['error'] == 0){
    $file = "../img/";
    $photoName = $_FILES['photo']['name'];
    $featurePhotoName = $_FILES['feature_photo']['name'];
    
    move_uploaded_file($_FILES['photo']['tmp_name'],$file.$photoName);
    move_uploaded_file($_FILES['feature_photo']['tmp_name'],$file.$featurePhotoName);
    }
    if(mysqli_query($conn,$sql)){
    redirect("home.php","Update table successful");

    }
}