<?php
    require_once 'header.php';
?>

<?php 

$uri = $_SERVER['REQUEST_URI'];
$uriArr = parse_url($uri);
$path = $uriArr["path"];

$sql = "SELECT * FROM jobs";
// $query = mysqli_query($conn,$sql);
// dd(mysqli_fetch_assoc($query));

$totalsql = str_replace("*","COUNT(id) AS total",$sql);

$totalquery = mysqli_query($conn, $totalsql);
$total = mysqli_fetch_assoc($totalquery)['total'];


$limit = 3;
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




$query = mysqli_query($conn, $sql);
?>


<div class="container-fluid"> 
    <div class="row">
        <div class="all-jobs"></div>    
    </div>
</div>
<div class="container">
    <div class="row">  
        <h4 class="p text-center mt-3"> All Job Categories</h4>
    </div>
            <div class=" d-flex border border-1 shadow-sm p-3 m-2 align-items-center row detail-bg">
                <?php while($rows = mysqli_fetch_assoc($query)) : ?>
                <div class="col-lg-3 col-md-3 col-sm-12 py-2 " >
                    <img src="../img/<?= $rows['photo'] ?>" alt="" width="100px" height="">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 py-2">
                    <h5><?= ucwords($rows['title']) ?></h5>
                    <p><?= ucwords($rows['company']) ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 py-2">
                    <p><?= ucfirst($rows['location']) ?></p>
                    <p class=" text-primary fw-bold"><?= ucfirst($rows['job_type']) ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 py-2 text-end">
                    <a href="./detail_job.php?id=<?= $rows['id'] ?>" class=" btn btn-sm btn-primary">View Detail</a>
                    </form>
                </div>
                <?php endwhile ?>
            </div>
       
        <div class=" d-flex justify-content-center  mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php foreach ($links as $link) : ?>
                        <li class="page-item"><a class="page-link <?= $link['is_active'] ?>" href="<?= $link['url'] ?>"><?= $link['page_number'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
</div>
<footer class="footer  mx-auto  container-fluid">
    <div class="row  d-flex align-items-center text-center py-5">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h4>Partners</h4>
            <p>Ananda Digital Myanmar</p>
            <p>Atom Myanmar</p>
            <p>Aya Bank</p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h4>Find a job</h4>
            <p><a class=" text-decoration-none" href="fulltime_jobs.php" target="_blank">Full-tmie jobs</a></p>
            <p><a class=" text-decoration-none" href="freelance_jobs.php" target="_blank">Freelance jobs</a></p>
            <p><a class=" text-decoration-none" href="remote_jobs.php" target="_blank">Remote jobs</a></p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h4 class=" ">Contact Us</h4>
            
                <div class=" d-flex justify-content-center">
                <span><i data-feather="map-pin"></i></span><p class=" ms-2">Yangon </p>
                </div>
            
           <div class=" d-flex justify-content-center">
           <span><i data-feather="phone"></i></span> <a class=" ms-2 text-decoration-none text-white mb-2" href=" tel:09969659254">09-969-659-254</a>
           </div>
           <div class=" d-flex justify-content-center">
           <span><i data-feather="mail"></i></span><a class=" ms-2 text-decoration-none text-white" href=" mailto:thetnaingoo96.mm@gmail.com">thetnaingoo96.mm@gmail.com</a>

           </div>
        </div>
    </div>
    <div class="row text-center">
        <p><span class=" me-1">&#169;</span>Copyright-2023. All Right Reserved</p>
    </div>
</footer>


<?php require_once './footer.php' ?>