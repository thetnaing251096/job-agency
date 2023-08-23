<?php
require_once './header.php';
?>

<?php
     if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "SELECT * FROM categories WHERE id = $id ";
        $query = mysqli_query($conn,$sql);
       
      }
?>


<main>
<h4 class=" mt-4">Edit Company</h4>
    <form action="company_update.php" method="post" class=" bg-white p-3 mt-4" enctype="multipart/form-data">
        <div class="row">
        <?php while($rows = mysqli_fetch_assoc($query)) : ?>
        <div class="col-12 col-lg-6 mb-2">
        <input type="hidden" class="form-control" name="id" value="<?= $rows['id'] ?>">
            <label class=" form-label" for="">Name</label>
            <input type="text" class="form-control" name="name" value="<?= $rows['name'] ?>">
        </div>
        <div class="col-12 col-lg-6 mb-2">
            <label class=" form-label" for="">Feature Photo</label>
            <input type="file" class="form-control" name="feature_photo" accept="image/jpeg,image/jpg" >
        </div>
        <div class="">
            <button class=" btn btn-primary">Update</button>
        </div>
        <?php endwhile ?>
        </div>
    </form>
</main>