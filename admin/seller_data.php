<?php

$delete = false;
include "../partials/db.php";
include "../admin/Admin_nav.php";

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `seller` WHERE `id` = $sno";
    $result = mysqli_query($conn, $sql);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit here</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- //cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</head>
<style>
body {
            background-image: linear-gradient(to right, #c33764, #1d2671);
            color: white;
        }
</style>

<body>


    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>


    <h1 class="mx-5">Del details</h1>
    <div class="container my-4">
        <table class="table" id="myTable" style="border: 5px solid black;">
            <thead style="border: 5px solid black;">
                <tr  style="border: 5px solid black;">
                    <th scope="col" style="border: 5px solid black;">Id</th>
                    <th scope="col" style="border: 5px solid black;">Username</th>
                    <th scope="col" style="border: 5px solid black;">Name</th>
                    <th scope="col" style="border: 5px solid black;">email</th>
                    <th scope="col" style="border: 5px solid black;">password</th>
                    <th scope="col" style="border: 5px solid black;">Edit</th>
                </tr>
            </thead>
            <tbody style="color: aliceblue;">
                <?php
                $sql = "SELECT * FROM `seller`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr>
    <th scope='row'>" . $sno . "</th>
    <td>" . $row['username'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['password'] . "</td>
    <td> <button class='delete btn btn-sm btn-primary' id=d" . $row['id'] . ">Delete</button>  </td>
  </tr>";
                }
                ?>

            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>
            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    console.log("delete", );
                    sno = e.target.id.substr(1, );

                    if (confirm("Are you sure")) {
                        console.log("yes");
                        window.location = `/AuctionSystem/admin/seller_data.php?delete=${sno}`;
                    } else {
                        console.log("no");
                    }
                })
            })
        </script>
</body>

</html>