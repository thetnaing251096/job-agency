<?php require_once './header.php'; ?>

<?php 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = $_POST['name'];
    $feature_photo = $_FILES['feature_photo']['name'];

    if($_FILES['feature_photo']['error'] == 0){
      $file = "../img/";
      $fileName = $_FILES['feature_photo']['name'];
      move_uploaded_file($_FILES['feature_photo']['tmp_name'],$file.$fileName);
    }
    $sql = "INSERT INTO categories (name, feature_photo) VALUES ('$name','$feature_photo')";
    if(mysqli_query($conn,$sql)){
      redirect("company.php","Create company successful");
    }
  }
?>
<main>

 
  <h3 class=" mt-4">Input Company</h3>
  <form action="" method="post" class=" bg-white p-3 mt-4" enctype="multipart/form-data">
    <div class="row">
    
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Feature Photo</label>
      <input type="file" class="form-control" name=" feature_photo" accept="image/jpeg,image/jpg">
    </div>
  <div class="">
    <button class=" btn btn-primary">Create Company</button>
  </div>
    </div>
  </form>
</main>
    
<?php require_once './footer.php'; ?>