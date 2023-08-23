<?php
require_once './header.php'
?>

<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO admin (name,email,password) VALUES ('$name','$email','$password')";
        if(mysqli_query($conn,$sql)){
            redirect("./new_admin.php");
        }
    }

    $sql1 = "SELECT * FROM admin ";
    $query1 = mysqli_query($conn,$sql1);
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto my-3 bg-white py-4 px-3 rounded">
                <h4>New Admin</h4>
                <form action="" method="post" class=" d-flex align-items-center justify-content-lg-around">
                    <div class=" col-3 mb-2">
                        <label for="" class=" form-label">Name</label>
                        <input type="text" class=" form-control" name="name">
                    </div>
                    <div class=" col-3 mb-2">
                        <label for="" class=" form-label">Email</label>
                        <input type="email" class=" form-control" name="email">
                    </div>
                    <div class=" col-3 mb-2">
                        <label for="" class=" form-label">Password</label>
                        <input type="password" class=" form-control" name="password">
                    </div>
                    <div class=" mt-3">
                        <button class=" btn btn-primary btn-sm">Add Admin</button>
                    </div>
                </form>
            </div>

           <div class=" mt-4">
                <h4 class=" " >Admin Table</h4>
                <table class=" table border-bottom bg-white table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($rows = mysqli_fetch_assoc($query1)) : ?>
                            <tr>
                                <td><?= $rows['id'] ?></td>
                                <td><?= $rows['name'] ?></td>
                                <td><?= $rows['email'] ?></td>
                                <td><?= $rows['password'] ?></td>
                                <td><a href="del_admin.php?id=<?= $rows['id'] ?>" onclick="confirm('Are you sure to delete?')" class=" btn btn-danger"><i data-feather="trash-2"></i></a></td>
                              
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>


</main>


<?php require_once './footer.php' ?>