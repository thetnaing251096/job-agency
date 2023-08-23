<?php
require_once './header.php';
?>


<?php

$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $nrc_no = $_POST['nrc_no'];
    $address = $_POST['address'];

    validationStart();
    

    if(empty(trim($name))){
        // dd("hello");
        SetError("name is required","name");
        // $errors['name'] = "Name is required!";
        // dd($errors['name']);
    }elseif(strlen($name) < 3){
        // $errors['name'] = "Name must be greater than 3 character!";
        setError("Name must be greater than 3 character!","name");

    }elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
        // $errors['name'] = "Only letter and white white space";
        setError("Only letter and white white space","name");
    }
    
    if(empty($email)){
        // $errors['email'] = "Email is required";
        setError( "Email is required","email");
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // $errors['email'] = "Invalid email format";
         setError("Invalid email format","email");

    }

    if(empty(trim($password))){
        // $errors['password'] = "Password is required";
        setError("Password is required","password");
    }elseif(strlen($password) <= 5){
        // $errors['password'] = "At least 6 character";
        setError("At least 6 character","password");
    }elseif(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){
        // $errors['password'] = "Please fill these pattern [A-Za-z0-9 and special character ";
        setError("Please fill these pattern [A-Za-z0-9] and special character ","password");
    }

    if(empty(trim($phonenumber))){
        // $errors['phonenumber'] = "Phone number is required";
        setError("Phone number is required","phonenumber");

    }elseif(!preg_match("/^[0-9]*$/",$phonenumber)){
        // $errors['phonenumber'] = "You must be number only";
        setError("You must be number only","phonenumber");

    }

    if(empty(trim($nrc_no))){
        // $errors['nrc_no'] = "Nrc no is required";
        setError("Nrc no is required","nrc_no");

    }
    if(empty(trim($address))){
        // $errors['address'] = "Your address is required";
        setError("Your address is required","address");

    }
    // dd($_SESSION);
    validationEnd();
    
    // if(empty($errors)){
    //     $sql = "INSERT INTO users (name,email,password,phone_no,nrc_no,address) VALUES ('$name','$email','$password','$phonenumber','$nrc_no','$address')";
    //     $query = mysqli_query($conn,$sql);
    //     dd($query);
    // }
     
         $sql = "INSERT INTO users (name,email,password,phone_no,nrc_no,address) VALUES ('$name','$email','$password','$phonenumber','$nrc_no','$address')";
         if(mysqli_query($conn,$sql)){
            redirect('./login.php');
         }
    
    
}

?>

<section class="home-register">
    <div class="content-register"></div>

    <div class="row w-100 text-center register-form ">
        <div class=" w-25  bg-white py-3 px-3 rounded-2 shadow-lg register">
            <h2>Register From</h2>

         

            <form action="" class="" method="post">
                <div class="form-floating mb-1">
                    <input type="text "
                    value="<?= old('name') ?>"
                    class=" form-control <?php echo hasError("name") ? 'is-invalid' : ''?>" 
                    placeholder="name" 
                    name="name" 
                    id="floatingInput">
                    <label for="floatingInput">Name</label>
                    
                    <?php if(hasError("name")):?>
                        <div class=" invalid-feedback text-danger">
                            <?= showError("name") ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class=" mb-1 form-floating">
                    <input type="text "
                    value="<?= old("email") ?>" 
                    class=" form-control <?php echo hasError("email") ? 'is-invalid' : ''?>" 
                    placeholder="Email" 
                    name="email" 
                    id="floatingEmail">
                    <label for="floatingEmail">E-mail</label>
                    <?php if(hasError("email")):?>
                        <div class=" invalid-feedback">
                            <?= showError("email") ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class=" mb-1 form-floating">
                    <input type="password"
                    value="<?= old("password") ?>" 
                    class=" form-control <?php echo hasError("password") ? 'is-invalid' : ''?>" placeholder="Password" 
                    name="password" 
                    id="floatingPassword">
                    <label for="floatingPassword">Password</label>
                    <?php if(hasError("password")):?>
                        <div class=" invalid-feedback">
                            <?= showError("password") ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class=" mb-1 form-floating">
                    <input type="text "
                    value="<?= old("phonenumber") ?>"
                    class=" form-control <?php echo hasError("phonenumber") ? 'is-invalid' : ''?>" placeholder="Phone Number" 
                    name="phonenumber" 
                    id="floatingPh">
                    <label for="floatingPh">Phone Number</label>
                    <?php if(hasError("phonenumber")):?>
                        <div class=" invalid-feedback">
                            <?= showError("phonenumber") ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class=" mb-1 form-floating">
                        <input type="text "
                        value="<?= old("nrc_no") ?>" 
                        class=" form-control <?php echo hasError("nrc_no") ? 'is-invalid' : ''?> " placeholder="Nrc_no" 
                        name="nrc_no" 
                        id="floatingNrc">
                        <label for="floatingNrc">NRC No</label>
                    <?php if(hasError("nrc_no")):?>
                        <div class=" invalid-feedback">
                            <?= showError("nrc_no") ?>
                        </div>
                    <?php endif ?>
                    </div>
                <div class="form-floating mb-1">
                    <textarea 
                    name="address"
                    value="<?= old("address") ?>"
                    class=" form-control <?php echo hasError("address") ? 'is-invalid' : ''?>"
                    id="" placeholder="Address"></textarea>
                    <label for="">Address</label>
                    <?php if(hasError("address")):?>
                        <div class=" invalid-feedback">
                            <?= showError("address") ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="  form-floating">
                    <button class="btn btn-warning w-100 text-white" name=" register">Register</button>
                </div>
            </form>
        </div>

    </div>
</section>
<?php require_once './footer.php'; ?>