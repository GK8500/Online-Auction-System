<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Admin</title>
    <style>
        body{
            background-image: linear-gradient(to right,#c33764 , #1d2671);
        }
        h1{
            margin: 20px ;
            padding: 10px;
            text-align: center;
            color: darkseagreen;
        }
        .buttons{
            padding: 10px;
        }
        #user{
            margin: 10px;
            border: 3px solid black;
        }
        #auction{
            margin: 10px;
            border: 3px solid #00ffff;
        }
        #auction:hover{
            color: azure;
        }

        #admin{
            margin: 10px;
            border: 3px solid #ff3131;
            color: black;
        }
    </style>
</head>
<?php include "C:/xampp/htdocs/AuctionSystem/_navbar.php"; ?>
<body>
      <div>
        <h1> ADMINISTRATOR PANEL </h1>
      </div>
      <div class="buttons">
          <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-outline-dark" type="button" id="user">Users</button>
              <button class="btn btn-outline-info" type="button" id="auction">Auctions</button>
              <button class="btn btn-outline-danger" type="button" id="admin">Add New Admin</button>
          </div>
      </div>
</body>
</html>