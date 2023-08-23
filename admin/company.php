<?php require_once './header.php'; ?>

<?php 
  $sql = "SELECT * FROM categories";

  if(!empty($_GET['q'])){
    $q = $_GET['q'];
    $sql .= " WHERE name LIKE '%$q%' ";
  }
  $query = mysqli_query($conn,$sql);
?>

<?php if (hasSession("message")) : ?>
          <div id="alertbox" class="centered-element  alert alert-info alert-dismissible fade show animate__animated animate__fadeInDown " role="alert">
             
            <strong> <?= showSession('message')?></strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
<?php endif ?>
  <main>
  

   <div class=" d-flex justify-content-between mt-5 mb-3 ">
   <h3>Companies Table</h3>
   <form action="" class=" d-flex"> 
      <input type="text" class=" form-control me-1" name="q" value="<?php if(!empty($_GET['q'])) echo $_GET['q']?>">
      <?php if (!empty($_GET['q'])) : ?>
        <a href="./company.php" class=" del-icon-1"><i data-feather="x-circle"></i></a>
      <?php endif ?>
      <button class=" btn btn-warning">Search</button>
   </form>
   </div>
    <table class=" table table-hover  p-2 border-bottom bg-white">
      <thead>
        <tr>
          <th>No </th>
          <th>Name</th>
            <th>Action</th>
        </tr>      
      </thead>
       <tbody>
        
        <?php while($rows = mysqli_fetch_assoc($query)) : ?>
          <tr>
            <td><?= $rows['id'] ?></td>
            <td><?= $rows['name'] ?></td>
            <td>
              <div class="d-flex">
              <a href="company_edit.php?id=<?= $rows['id'] ?>" class=" btn btn-primary btn-sm me-1"><i data-feather="edit"></i></a>
              <a href="company_del.php?id=<?= $rows['id'] ?>" class=" btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>
              </div>
            </td>
          </tr>
        <?php endwhile ?>
       </tbody>
    </table>
    
    <?php if($query->num_rows == 0) : ?>
        <h5 class=" text-center text-danger">Your search result not found!</h5>
      <?php endif ?>
  </main>


  <?php require_once './footer.php'; ?>