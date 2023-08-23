<?php 
require_once '../controller/functions.php';
require_once '../controller/connect.php';
        // dd($_SERVER['HTTP_REFERER']);
session_start();
if($_SERVER['REQUEST_METHOD'] === "GET"){
        
        
        if(isset($_SESSION['auth'])){
                
                $id = $_GET['id'];
                $title = $_GET['title'];
                $user_id = $_SESSION['auth']['id'];
                $name = $_SESSION['auth']['name'];


$sql = "INSERT INTO applications (jobs_id, users_id,jobs_title,users_name) VALUES ('$id','$user_id','$title','$name')";
$sql1 = "select * from applications where jobs_id = $id and users_id = $user_id";
$query = mysqli_query($conn,$sql1);
if($query->num_rows > 0) {
        // $_SESSION['key'] = [
        //         'message' => '$orry! You have been applied job'
        //   ];
          setSession("Sorry! You have been applied job");
          header("location:{$_SERVER['HTTP_REFERER']}");
}
        elseif(mysqli_query($conn,$sql)){
                // $_SESSION['key'] = [
                //       'message' => 'Thank for your apply jobs'
                // ];
                setSession("Thank for your apply jobs");
                header("location:{$_SERVER['HTTP_REFERER']}");
        }
                }else{
                        // $_SESSION['key'] = [
                        //         'message' => 'You must have an account. Then will be applied.'
                        //   ];
          setSession("Sorry! You must have an account. Then will be applied.");
                                
                          header("location:{$_SERVER['HTTP_REFERER']}");
                }



}

?>
