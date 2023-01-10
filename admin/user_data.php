<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>user table</title>
</head>
<body>
<table class="table">
  <thead>
  <tr>
    <th>user_id</th>
    <th>username</th>
    <th>name</th>
    <th>u_email</th>
    <th>u_password</th>
    <th>status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
    
    // connecting database
    include "C:/xampp/htdocs/AuctionSystem/partials/db.php";
    // to read all the data from table

  $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
      <td>".$row['user_id']."</td>
      <td>".$row['username']."</td>
      <td>".$row['name']."</td>
      <td>".$row['u_email']."</td>
      <td>".$row['u_password']."</td>
      <td>".$row['status']."</td>
      <td>
        <a href='#'>Update</a> </td>
        <td><a href='#'>Delete</a>
      </td>
    </tr>";

    }
  ?>
  </tbody>
</table>

</body>
</html>