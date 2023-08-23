<?php require_once './header.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $sql = "SELECT * FROM jobs WHERE id = $id ";
  $query = mysqli_query($conn, $sql);
}



?>

<main>

  <h4 class=" mt-4">Upate Jobs Table</h4>
  <form action="jobs_update.php" class=" bg-white p-3 " method="post" enctype="multipart/form-data">
    <div class="row">
      <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
        <div class="col-12 col-lg-6 mb-2">
          <input type="hidden" class="form-control" name="id" value="<?= $rows['id'] ?>">
          <label class=" form-label" for="">Categories_id</label>
          <input type="number" class="form-control" name="categories_id" value="<?= $rows['categories_id'] ?>">

        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Title</label>
          <input type="text" class="form-control" name="title" value="<?= $rows['title'] ?>">
        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Company</label>
          <input type="text" class="form-control" name="company" value="<?= $rows['company'] ?>">
        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Location</label>
          <input type="text" class="form-control" name="location" value="<?= $rows['location'] ?>">
        </div>

        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Salary</label>
          <input type="number" class="form-control" name="salary" value="<?= $rows['salary'] ?>">
        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Job type</label>
          <select name="job_type" id="" class=" form-select">
            <option value="<?= $rows['job_type'] ?>"><?= $rows['job_type'] ?></option>
            <option value="----">----</option>
            <option value="fulltime">Fulltime</option>
            <option value="remote">Remote</option>
            <option value="freelance">Freelance</option>
          </select>
        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Address</label>
          <textarea name="address" class=" form-control" id="" "><?= $rows['address'] ?></textarea>
    </div>
    <div class=" col-12 col-lg-6 mb-2">
      <label class=" form-label" for="">Description</label>
      <textarea name="description" class=" form-control" id=""><?= $rows['description'] ?></textarea>
        </div>
        <div class="col-12 col-lg-6 mb-2">
          <label class=" form-label" for="">Requirement</label>
          <textarea name="requirement" class=" form-control" id=""><?= $rows['requirement'] ?></textarea>
        </div>
        <div class=" col-12 col-lg-6 mb-2">
          <label for="" class=" form-label">Photo</label>
          <input type="file" class=" form-control" name="photo" accept="image/jpeg,image/jpg" value="<?= $rows['photo'] ?>">
        </div>
        <div class=" col-12 col-lg-6 mb-2">
          <label for="" class=" form-label">Feature Photo</label>
          <input type="file" class=" form-control" name="feature_photo" value="<?= $rows['feature_photo'] ?>">
        </div>
      <?php endwhile ?>
    </div>
    <div class=" d-grid">
      <button class=" btn btn-primary">Update</button>
    </div>
  </form>
</main>

<?php require_once './footer.php'; ?>