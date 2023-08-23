<?php
require_once './header.php';
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    validationStart();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!$email && !$password){
        setError("Your register email required","email");
        setError("Your register password required","password");
    }

        $sql = "SELECT * FROM  users WHERE email = '$email' AND password='$password' ";
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_assoc($query);
     if($query->num_rows == 0){
        setError("Incorrect Email or Password",'message');
     }
    // dd($_SESSION);
    validationEnd();
    // dd($rows['email']);
    if($query->num_rows == 1){
        // validationEnd();
        $_SESSION['auth'] = [
            "id" => $rows['id'],
            "name" => $rows['name'],
            "email" => $rows['email']
        ];
        
    }
    // unset($_SESSION);
    if(isset($_SESSION['auth'])){

        redirect('home.php');
    }else{
        redirect("./login.php");
       
    }
}
?>


<section class="home-login">
<div class="content-login"></div>

    <div class="row login  w-100">
        <div class="w-25 m-0 mx-auto bg-light shadow-lg rounded-2 text-center px-3 py-4 register">
        <?php if(hasError('message')) : ?>     
           <p class=" text-danger">  <?= showError('message') ?></p>
        <?php endif ?>
            <h3>Login Now</h3>
            <form action="" method="post">
            <div class=" mb-3 form-floating">
                
                <input type="text " value="<?= old("email") ?>" class=" form-control <?php echo hasError('email') ?'is-invalid' : '' ?>" placeholder="Email" name="email">
                <label >E-mail</label>
                <?php if(hasError("email")) : ?>
                    <div class="invalid-feedback">
                        <?= showError("email")  ?>
                    </div>
                <?php endif ?>
            </div>
            <div class=" mb-3 form-floating">
                <input type="password" value="<?= old("password") ?>" class=" form-control <?php echo hasError('password') ?'is-invalid' : '' ?>" placeholder="Password" name="password">
                <label >Password</label>
                <?php if(hasError("password")) : ?>
                    <div class="invalid-feedback">
                        <?= showError("password")  ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100"  name="login">Login</button>
            </div>
            <p>Don't have an account?</p>
            <div class="mb-3">
                <a href="./register.php" class="btn btn-outline-warning w-100">Register</a>
            </div>
            </form>
        </div>
    </div>
</section>


<?php require_once './footer.php' ?>