<?php
require_once './header.php';

?>

<?php
$uri = $_SERVER['REQUEST_URI'];
$uriArr = parse_url($uri);
$path = $uriArr["path"];


$sql = "SELECT * FROM categories";
if (!empty($_GET['q'])) {
    $q = $_GET['q'];

    $sql .= "  WHERE name LIKE '%$q%'";
   
}
// $sql1 = "SELECT COUNT(id) AS total FROM categories";
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




$query = mysqli_query($conn, $sql);
// dd($query);
?>
<section class="home-1">
    <div class="content">
    </div>
    <div class="home-title row w-100">
        <h1 class=" mb-5 text-center ">
            Find Your Choice Company
        </h1>
        <p class=" mb-5 pe-0 text-center font-monospace ">Your job search starts and ends with us</p>
        <form action="" class=" d-flex justify-content-center  pe-0 ">
            <div class="row w-100 justify-content-center">
                <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                    <input type="text" class=" form-control input " name="q" value="<?php if (!empty($_GET['q'])) echo $q ?>" placeholder=" Companies">
                    <?php if (!empty($_GET['q'])) : ?>
                        <a href=" ./all_companies.php" class=" del-icon"><i data-feather="x-circle"></i></a>
                    <?php endif ?>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                    <button class="btn  input input-bg w-100 ">Find Companies</button>
                </div>
            </div>
        </form>
    </div>

</section>

<section class="container">
    <div class="row justify-content-center">
        <h4 class="text-center my-5" style="font-weight: 600;">Feature Companies</h4>
        
        <?php if($query->num_rows == 0) : ?>           
            <div class="row text-center">
                <h5>No Result</h5>
            </div>
        <?php endif ?>
        <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
          
            <div class=" col-12 col-md-5 col-sm-12">
                <a href="
                <?php if ($rows['name'] == 'yoma bank') : ?>
                    <?= url("user/yoma_bank_all_jobs.php") ?>
                    <?php elseif ($rows['name'] == 'wave money') : ?>
                    <?= url("user/wave_money_all_jobs.php") ?>
                    <?php elseif ($rows['name'] == 'any call mobile') : ?>
                    <?= url("user/anycall_all_jobs.php") ?>
                    <?php elseif ($rows['name'] == 'atom myanmar') : ?>
                    <?= url("user/atom_all_jobs.php") ?>
                    <?php elseif ($rows['name'] == 'coca cola') : ?>
                    <?= url("user/coca_cola_all_jobs.php") ?>
                    <?php elseif ($rows['name'] == 'myanmar net') : ?>
                    <?= url("user/myanmar_net_all_jobs.php") ?>

                    <?php endif ?>
            " class=" text-decoration-none">
                    <div class="card mb-4">
                        <div class="all-company-bg">
                        </div>
                        <img src="../img/<?= $rows['feature_photo'] ?>" class="" width="" height="200px" alt="...">
                        <div class="card-body">
                            <p class="card-text " style="font-weight: 600;"><?= ucwords($rows['name']) ?></p>
                        </div>
                    </div>
                </a>
            </div>
           
        <?php endwhile ?>
        
    </div>
    <div class=" d-flex justify-content-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php foreach ($links as $link) : ?>

                        <li class="page-item"><a class="page-link <?= $link['is_active'] ?>" href="<?= $link['url'] ?>"><?= $link['page_number'] ?></a></li>

                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
</section>


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


<?php require_once './footer.php'; ?>