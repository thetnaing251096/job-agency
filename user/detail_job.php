<?php
require_once '../controller/functions.php';
require_once '../controller/connect.php';

?>

<?php
$imgUrl = '../img/yoma-1.jpg';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM jobs WHERE id=$id";
    $sql1 = "SELECT * FROM jobs WHERE id=$id";
    $query1 = mysqli_query($conn, $sql1);
    $query = mysqli_query($conn, $sql);
    // dd(mysqli_fetch_assoc($query1));
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?= url("css/style.css") ?>">
    <link rel="icon" type="image/jpg/jpeg/png" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Find Jobs</title>
    <script src="<?= url("node_modules/feather-icons/dist/feather.js") ?>"></script>

    <style>
        .dynamic-bg {
            <?php while ($rows = mysqli_fetch_assoc($query1)) : ?>background-image: url('../img/<?= $rows['feature_photo'] ?>');
            <?php endwhile ?>background-position: center;
            background-size: cover;
            height: 60vh;
        }
    </style>
</head>

<body>
    <?php require_once 'navbar.php' ?>

    <?php if (hasSession("message")) : ?>
        <div id="alertbox" class="centered-element  alert alert-info alert-dismissible fade show animate__animated animate__fadeInDown " role="alert">
            <strong>Hey! <?= $_SESSION['auth']['name'] . ' . ' ?></strong>
            <?= showSession("message") ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="container-fluid">
        <div class="row">
            <div class="dynamic-bg"></div>
        </div>
    </div>
    <div class="container">

        <div class=" d-flex border border-1 shadow-sm p-3 m-2 align-items-center row mb-3 detail-bg">
            <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">

                    <img src="../img/<?= $rows['photo'] ?>" alt="" width="150px">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h4><?= ucwords($rows['title']) ?></h4>
                    <p><?= ucwords($rows['company']) ?></p>
                    <p><?= ucfirst($rows['salary']) ?> mmk</p>
                    <p class=" text-primary fw-bold"><?= ucfirst($rows['job_type']) ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <p><?= ucfirst($rows['location']) ?></p>
                    <p><?= ucfirst($rows['address']) ?></p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4>Requirement</h4>
                    <ul>
                        <?php foreach (explode(".", $rows['requirement']) as $row) : ?>
                            <li><?= $row ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4>Description</h4>
                    <ul>
                        <?php foreach (explode(".", $rows['description']) as $row) : ?>
                            <li><?= $row ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a class=" btn btn-sm btn-primary w-100" href="apply.php?id=<?= $rows['id'] ?>&title=<?= $rows['title'] ?>">Apply Job</a>
                </div>
            <?php endwhile ?>
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


    <script>
        feather.replace();
    </script>
    <script src="<?= url('js/bootstrap.bundle.js') ?>"></script>
    <script src="<?= url('js/app.js') ?>"></script>
</body>

</html>