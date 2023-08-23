<?php
session_start();
require_once '../controller/functions.php';
require_once '../controller/connect.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($query);
    if ($rows['email'] === $email & $rows['password'] === $password) {
        // validationEnd();
        $_SESSION['admin'] = [
            "id" => $rows['id'],
            "name" => $rows['name'],
            "email" => $rows['email']
        ];
        //   dd($_SESSION['admin']['name']);
    }
    // unset($_SESSION);
    if (isset($_SESSION['admin'])) {

        redirect('home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin pannel</title>
    <link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/jpg/jpeg/png" href="../img/logo.jpg">
</head>

<body>
    <div class="container">
        <div class="row vh-100">
            <div class=" col-4  mx-auto my-auto bg-white py-5 px-4 rounded shadow-sm">
                <h3 class=" text-primary">Welcome Admin</h3>
                <form action="" method="post">
                    <div class=" mb-2">
                        <label for="" class=" form-label">Email</label>
                        <input type="email" class=" form-control" name="email">
                    </div>
                    <div class=" mb-2">
                        <label for="" class=" form-label">Password</label>
                        <input type="password" class=" form-control" name="password">
                    </div>
                    <div class=" text-end">
                        <button class=" btn btn-primary ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= url("js/bootstrap.js") ?>"></script>

</body>

</html>