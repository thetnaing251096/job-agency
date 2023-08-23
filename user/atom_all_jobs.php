<?php
require_once './header.php';
?>

<?php
$sql = "SELECT  * FROM jobs WHERE categories_id IN (SELECT id FROM categories WHERE name = 'atom myanmar')";
$query = mysqli_query($conn, $sql);
?>


<section class="jobs-home-atom">
    <div class="jobs-content">
    </div>
    <div class="jobs-content-title row justify-content-center bg-light shadow-sm">
        <div class=" col-lg-3 col-md-12 col-sm-12">
            <img class="img" src="../img/atom.jpg" width="150px""alt="">
           </div>
           <div class=" col-lg-9 col-md-12 col-sm-12">
            <p>Address : Thet Campus, 1 Office Park, Floor 1-A & 2-A, Rain Tree Drive, Pun Hlaing Estate, Hlaing Thayar Township, Yangon</p>
            <p>PH : 09 775098427</p>
            <p>Industry : Telecom Company</p>
        </div>
    </div>
</section>

<section class="jobs-view container">
    <div class="row">
        <div class=" mt-5 jobs-border">
            <h2>Atom Myanmar All Jobs</h2>
        </div>
        <div class=" d-flex border border-1 shadow-sm p-3 m-2 align-items-center row detail-bg my-3">
            <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
                <div class="col-lg-3 col-md-3 col-sm-12 py-2 ">
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