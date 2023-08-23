<?php require_once './header.php'; 
?>

<?php 

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
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
      $sql = "INSERT INTO jobs (categories_id,title,company,location,salary,job_type,address,description,requirement,photo,feature_photo)  VALUES ($categories_id,'$title','$company','$loaction','$salary','$job_type','$address','$description','$requirement','$photo','$feature_photo')";
      if($_FILES['photo']['error'] == 0){
        $file = "../img/";
        $photoName = $_FILES['photo']['name'];
        $featurePhotoName = $_FILES['feature_photo']['name'];
        
        move_uploaded_file($_FILES['photo']['tmp_name'],$file.$photoName);
        move_uploaded_file($_FILES['feature_photo']['tmp_name'],$file.$featurePhotoName);
      }
      if(mysqli_query($conn,$sql)){
        redirect("home.php","Create table successful");
    
        }
  }
  

  
?>


<main>

  <h3 class=" my-4">Insert Jobs</h3>
  <form action="" class=" bg-white p-3 " method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Categories_id</label>
      <input type="number" class="form-control" name="categories_id">
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Title</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Company</label>
      <input type="text" class="form-control" name="company">
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Location</label>
      <input type="text" class="form-control" name="location">
    </div>
    
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Salary</label>
      <input type="number" class="form-control" name="salary">
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Job type</label>
      <select name="job_type" id="" class=" form-select">
      <option value="---" selected>---</option>
        <option value="fulltime">Fulltime</option>
        <option value="remote">Remote</option>
        <option value="freelance">Freelance</option>
      </select>
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Address</label>
      <textarea name="address" class=" form-control" id=""></textarea>
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Description</label>
      <textarea name="description" class=" form-control" id=""></textarea>
    </div>
    <div class="col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Requirement</label>
      <textarea name="requirement" class=" form-control" id=""></textarea>
    </div>
    <div class=" col-12 col-lg-6 mb-2">
      <label for="" class=" form-label" >Photo</label>
      <input type="file" class=" form-control" name="photo" accept="image/jpeg,image/jpg" >
    </div>
    <div class=" col-12 col-lg-6 mb-2">
      <label for="" class=" form-label" >Feature Photo</label>
      <input type="file" class=" form-control" name="feature_photo">
    </div>
  </div>
  <div class=" d-grid">
    <button class=" btn btn-primary" >Create Job</button>
  </div>
  </form>
</main>
    
<?php require_once './footer.php'; ?>