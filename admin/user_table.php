<?php
require_once './header.php';
?>
<?php
    $sql = "SELECT * FROM users ";
    $query = mysqli_query($conn,$sql);
?>

<main>
    <div class="container">
        <div class="row">
            <h3 class=" p-0 my-3">Users Table</h3>
            <table class="  table table-hover  border-bottom bg-white">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone No</th>
                        <th>Nrc No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rows = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $rows['id'] ?></td>
                            <td><?= $rows['name'] ?></td>
                            <td><?= $rows['email'] ?></td>
                            <td><?= $rows['password'] ?></td>
                            <td><?= $rows['phone_no'] ?></td>
                            <td><?= $rows['nrc_no'] ?></td>
                            <td><?= $rows['address'] ?></td>
                        </tr>
                    <?php endwhile ?> 
                </tbody>
            </table>
        </div>
    </div>
</main>


<?php require_once './footer.php'; ?>