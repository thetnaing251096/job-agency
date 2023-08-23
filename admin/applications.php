<?php require_once './header.php' ?>
<?php
$sql = "SELECT id,jobs_title,users_name FROM applications ";

$query = mysqli_query($conn, $sql);


?>
<main>

    <div class="container">
        <div class="row">
            <h3 class=" mt-4 mb-3">Applications Table</h3>
            <table class=" table bg-white border-bottom table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jobs Title</th>
                        <th>Users Name</th>
                    </tr>

                </thead>
                <tbody>
                    <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $rows['id'] ?></td>
                            <td><?= $rows['jobs_title'] ?></td>
                            <td><?= $rows['users_name'] ?></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<?php require_once './footer.php' ?>