<?php require_once './header.php'; ?>
<?php 

  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = parse_url($uri);
  $path = $uriArr["path"];

  
  $sql = "SELECT * FROM jobs";
  $sqlcount =  "SELECT COUNT(id) FROM jobs";
  $querycount = mysqli_query($conn,$sqlcount);
  $count = mysqli_fetch_row($querycount)[0];
  if(!empty($_GET['q'])){
    $q = $_GET['q'];
    $sql .= " WHERE  title LIKE '%$q%' OR company LIKE '%$q%' OR location LIKE '%$q%' OR job_type LIKE '%$q%' ";
    
  }

  $totalsql = str_replace("*","COUNT(id) AS total",$sql);
  $totalquery = mysqli_query($conn, $totalsql);
  $total = mysqli_fetch_assoc($totalquery)['total'];
  $limit = 2;
  $totalPages = ceil($total / $limit);
  $currentPage = isset($_GET['page']) ? $_GET['page']  : "1";
  $offset = ($currentPage - 1) * $limit;
  $sql .= " LIMIT $offset, $limit";

  for ($i = 1; $i <= $totalPages; $i++) {
      $links[] = [
          "url" => url() . $path . "?page=" . $i,
          "page_number" => $i,
          "is_active" => $i == $currentPage ? "active" : ""
      ];
  }
  $query = mysqli_query($conn,$sql);

  $sql1 = "SELECT * FROM applications";
  $query1 = mysqli_query($conn,$sql1);

  $sql2 = "SELECT * FROM users";
  $query2 = mysqli_query($conn,$sql2);
?>

<?php if (hasSession("message")) : ?>
          <div id="alertbox" class="centered-element  alert alert-info alert-dismissible fade show animate__animated animate__fadeInDown " role="alert">
             
            <strong> <?= showSession('message')?></strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
<?php endif ?>

  <main>
  <div class="row text-center justify-content-center mt-3">
    <div class="col-12 col-lg-3 bg-light me-3 p-2">
      <h5>Total Jobs</h5>
      <p><span class=" text-info me-2"><i data-feather="table"></i></span> <strong class=""><?= $count ?></strong></p>
      <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar" style="width: <?= $count ?>%"></div>
      </div>
    </div>
    <div class="col-12 col-lg-3 bg-light me-3 p-2">
      <h5>Total Applications</h5>
        <p><span class=" text-warning me-2"><i data-feather="activity"></i></span><strong><?= $query1->num_rows ?></strong></p>
     <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar" style="width: <?= $query1->num_rows ?>%"></div>
</div>
    </div>
    <div class="col-12 col-lg-3 bg-light me- p-2">
      <h5>Total Users</h5>
        <p><span class=" text-success me-2"><i data-feather="users"></i></span><strong><?= $query2->num_rows ?></strong></p>
     <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar" style="width: <?= $query2->num_rows ?>%"></div>
</div>
    </div>
  </div>

   <div class=" d-flex justify-content-between my-3">
   <h3>Jobs Table</h3>
   <form action="" class=" d-flex"> 
      <input type="text" class=" form-control me-1" name="q" value="<?php if(!empty($_GET['q'])) echo $_GET['q']?>">
      <?php if (!empty($_GET['q'])) : ?>
        <a href="./home.php" class=" del-icon"><i data-feather="x-circle"></i></a>
      <?php endif ?>
      <button class=" btn btn-warning ">Search</button>
   </form>
   </div>
    <table class=" table table-hover  border-bottom bg-white">
      <thead>
        <tr>
          <th>No </th>
          <th>Title</th>
          <th>Company </th>
          <th>Location </th>
          <th>Salary </th>
          <th>Description </th>
          <th>Requirement</th>
          <th>Job_Type </th>
          <th>Created_at </th>
          <th> Updated_at</th>
          <th>Action</th>
        </tr>      
      </thead>
       <tbody>
        
        <?php while($rows = mysqli_fetch_assoc($query)) : ?>
          <tr>
            <td><?= $rows['id'] ?></td>
            <td><?= $rows['title'] ?></td>
            <td><?= $rows['company'] ?></td>
            <td><?= $rows['location'] ?></td>
            <td><?= $rows['salary'] ?></td>
            <td><?= mb_strimwidth( $rows['description'],0,50,'...') ?></td>
            <td><?= mb_strimwidth( $rows['requirement'],0,50,'...') ?></td>
            <td><?= $rows['job_type'] ?></td>
            <td><?= $rows['created_at'] ?></td>
            <td><?= $rows['updated_at'] ?></td>
            <td>
              <div class="d-flex">
              <a href="jobs_edit.php?id=<?= $rows['id'] ?>" class=" btn btn-primary btn-sm me-1"><i data-feather="edit"></i></a>
              <a href="jobs_del.php?id=<?= $rows['id'] ?>" class=" btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>
              </div>
            </td>
          </tr>
        <?php endwhile ?>

        
      </tbody>
    </table>

      <?php if($query->num_rows == 0) : ?>
        <h5 class=" text-center text-danger">Your search result not found!</h5>
      <?php endif ?>

      <div class=" d-flex justify-content-center ">
            <navbar aria-label="Page navigation example">
                <ul class="pagination">
                    <?php foreach ($links as $link) : ?>

                        <li class="page-item"><a class="page-link <?= $link['is_active'] ?>" href="<?= $link['url'] ?>"><?= $link['page_number'] ?></a></li>

                    <?php endforeach ?>
                </ul>
            </navbar>
        </div>
     
  </main>

  <!-- <script>
                function hideAlert() {
                    const alertBox = document.getElementById("alertbox");
                    alertBox.style.display = "none"; // Hide the alert box
                }
                delayToShowInMilliseconds = 5000;
        setTimeout(hideAlert, delayToShowInMilliseconds);
    </script> -->
  <?php require_once './footer.php'; ?>