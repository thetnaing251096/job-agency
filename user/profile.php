<?php
require_once './header.php';
?>

<?php
$id = $_SESSION['auth']['id'];
$sqlcount = "SELECT COUNT(id) AS total FROM applications WHERE users_id=$id";
$sql = "SELECT * FROM users WHERE id = $id ";
$query = mysqli_query($conn, $sql);
$querycount = mysqli_query($conn, $sqlcount);
$totaljob = (mysqli_fetch_assoc($querycount));

?>

<section class="home-login">
    <div class="content-login"></div>

    <div class="row profile  w-100 ">
        <div class="register w-25 m-0 mx-auto bg-light shadow-lg rounded-2  px-3 py-4 register">
            <div class=" col-12 col-md-12 col-sm-12 mt-2">
                <img src="../img/logo.jpg" alt=" " class=" rounded-circle" width="150px" style="border:1px solid">

                <p class="mt-3">Thanks for apply job with our website....</p>
            </div>
            <div class="col-12 mt-2">
                <h4 class=" border-bottom border-info mb-3">About</h4>
                <table class=" table">
                    <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><i data-feather="user" class=" text-primary"></i></td>
                            <td><?= $rows['name'] ?></td>
                        </tr>
                        <tr>
                            <td><i data-feather="mail" class=" text-primary"></i></td>
                            <td><?= $rows['email'] ?></td>
                        </tr>
                        <tr>
                            <td><i data-feather="phone" class=" text-primary"></i></td>
                            <td><?= $rows['phone_no'] ?></td>
                        </tr>
                        <tr>
                            <td><i data-feather="flag" class=" text-primary"></i></td>
                            <td><?= $rows['nrc_no'] ?></td>
                        </tr>
                        <tr>
                            <td><i data-feather="map-pin" class=" text-primary"></i></td>
                            <td><?= $rows['address'] ?></td>
                        </tr>

                    <?php endwhile ?>

                        <?php if($totaljob['total'] != 0 ) : ?>
                        <tr>
                        <td><i data-feather="bell" class=" text-primary"></i></td>
                        <td><span class="noti text-bg-danger rounded-circle"><?= $totaljob['total'] ?></span> jobs applied</td>
                    </tr>
                        <?php endif ?>

                </table>
            </div>
        </div>



    </div>
</section>
<script>
    feather.replace();
</script>
<?php require_once './footer.php'; ?>