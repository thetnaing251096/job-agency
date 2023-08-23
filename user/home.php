<?php
require_once 'header.php';

?>

<?php
    $sql = "SELECT * FROM jobs";
    $totalsql = "SELECT * FROM jobs LIMIT 4";
    
    $totalquery = mysqli_query($conn, $totalsql);
    if(!empty($_GET['q'])) {
        $q = $_GET['q'];
        
        $sql .= "  WHERE title LIKE '%$q%' OR company LIKE '%$q%' ";
       
       $query = mysqli_query($conn,$sql);
    }
?>
<section class="home">
    <div class="content">
    </div>
    <div class="home-title row w-100">
        <h1 class=" mb-5 text-center " style="font-weight: 600;">
            Find the Carrier You Deserve
        </h1>
        <p class=" mb-5 text-center font-monospace " style=" font-weight:200">Your job search starts and ends with us</p>
        <form action="" class=" d-flex justify-content-center  pe-0 ">
            <div class="row w-100 justify-content-center">
                <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                    <input type="text" class=" form-control input " placeholder="All positions, Companies" name="q" value="<?php if(!empty($_GET['q'])) echo $q ?>">
                    <?php if(!empty($_GET['q'])) : ?>
                        <a href=" ./home.php" class=" del-icon" ><i data-feather="x-circle"></i></a>
                    <?php endif ?>
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-12 my-2 ">
                    <button class="btn  input input-bg w-100">Find Jobs</button>
                </div>
            </div>
        </form>
    </div>

</section>

<?php if(!empty($_GET['q'])) : ?>
    <section class=" container">
    <div class=" d-flex border border-1 shadow-sm p-3 m-2 align-items-center row">
    <?php if($query->num_rows == 0) : ?>           
          
                <h5 class=" text-center">No Result</h5>
           
    <?php endif ?>

                <?php while($rows = mysqli_fetch_assoc($query)) : ?>
                <div class="col-lg-3 col-md-3 col-sm-12 mb-2" >
                    <img src="../img/<?= $rows['photo'] ?>" alt="" width="100px" height="100px">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h4><?= ucwords($rows['title']) ?></h4>
                    <p><?= ucwords($rows['company']) ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <p><?= ucfirst($rows['location']) ?></p>
                    <p class=" text-primary fw-bold"><?= ucfirst($rows['job_type']) ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 text-end">
                <a class=" btn btn-sm btn-primary" href="./detail_job.php?id=<?= $rows['id'] ?>">View Detail</a>
                </div>
                <?php endwhile ?>
            </div>
    </section>
  
<?php else : ?>
    <section class="two container">
    <div class=" text-center my-4">
        <h4>Companies</h4>
    </div>

    <div class=" d-flex row bg-light shadow-sm">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center  pt-4">
                <a href="yoma_bank_all_jobs.php">
                    <img src="../img/yoma-logo.png" class="two-img" alt="" width="300px" height="150px">
                </a>
                <p>Yoma Bank</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center  pt-4">
                <a href="./wave_money_all_jobs.php">
                    <img src="../img/wave.jpg" class="two-img" alt="" width="300px" height="150px">
                </a>
                <p>wave money</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center  pt-4">
                <a href="atom_all_jobs.php">
                    <img src="../img/atom.jpg" class="two-img" alt="" width="300px" height="150px">
                </a>
                <p>Atom</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center  pt-4">
                <a href="anycall_all_jobs.php">
                    <img src="../img/anycall.png" class="two-img" alt="" width="300px" height="150px">
                </a>
                <p>Anycall</p>
            </div>
        


    </div>

    <div class=" text-center my-4  border-bottom">
        <h4>Recommened Jobs</h4>
    </div>

    <?php while ($rows = mysqli_fetch_assoc($totalquery)) : ?>
        <div class=" border-bottom mb-2">
            <h5><a href="./detail_job.php?id=<?= $rows['id'] ?>" class=" text-decoration-none text-black"><?= ucwords($rows['title']) ?></a></h5>
            <p><?= ucwords($rows['company']) ?></p>

        </div>
    <?php endwhile ?>



</section>
<?php endif ?>


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



<?php require_once 'footer.php' ?>