<?php
function url(string $path = null) : string
{
    $url = isset($_SERVER['HTTPS']) ? "https" : "http";
    $url .= "://";
    $url .= $_SERVER['HTTP_HOST'];
    if (isset($path)) {
        $url .= "/";
        $url .= $path;
    }
    return $url;
}

function dd(mixed $data, bool $showtype = false): void
{
    echo "<pre style='background: #1d1d1d; color: #cdcdcd; padding: 20px; margin: 10px; border-radius: 10px; line-height: 1.5rem'>";
    if ($showtype) {
        var_dump($data);
    } else {
        print_r($data);
    }
    die();
    "</pre>";
}

function redirect(string $path, string $message = null): void
{
    if(!is_null($message)){
        setSession($message);
    }
    header("location:$path",$message);
}
function redirectBack(string $message = null): void
{
    redirect($_SERVER['HTTP_REFERER'],$message);
}


// validation start //
function setError(string $message,string $key): void {
    $_SESSION['error'][$key] = $message;
}
function hasError($key) : bool {
    if(!empty($_SESSION['error'][$key])) return true;
    return false;
}
function showError($key) : string  {
    $message = $_SESSION['error'][$key];
    unset($_SESSION['error'][$key]);
    return $message;
}
function old(string $key): string | null  {
    if(isset($_SESSION['old'][$key])){
        $message =  $_SESSION['old'][$key];
        unset($_SESSION['old'][$key]);
        return $message;
    }

        return null;
}
function validationStart() : void {
    unset($_SESSION['error']);
    unset($_SESSION['old']);
    $_SESSION['old'] = $_POST;
}
function validationEnd() : void {
    if(hasSession("error")){
        redirect($_SERVER['HTTP_REFERER']);
        die();
    }else{
        unset($_SESSION['old']);
    }
}
// validation end //

function setSession(string $message, string $key = "message"): void{
     ($_SESSION[$key] = $message);
}
function hasSession( string $key ):bool{
    if(!empty($_SESSION[$key])) return true;
    return false;
}
function showSession(string $key ) : string {
    $message = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
}

// function register()
// {
    

//     if (isset($_POST['register'])) {
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         $password = $_POST['password'];
//         $phonenumber = $_POST['phonenumber'];
//         $nrc_no = $_POST['nrc_no'];
//         $address = $_POST['address'];

//         if(!$name){
//             setError("name is required");
//         }elseif(strlen($name) > 3){
//             $errors ['name'] = "name is greater than 3 characteristic";
//         }

//         $sql = "INSERT INTO users (name,email,password,phone_no,nrc_no,address) VALUES ('$name','$email','$password','$phonenumber','$nrc_no','$address')";

//         if (mysqli_query($GLOBALS['conn'], $sql)) {
//             return redirect("login.php");
//         }
//             return redirect("register.php");
//     }
// }



function toUpper($string = null, $a = null){


    if(str_starts_with($string,$a)){
        return strtoupper($a);
    }

}


function create(){
}