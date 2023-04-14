<?php
include "../partials/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Taking input and assigning variables to it

    $username = $_POST["username"];
    $password = $_POST["password"];


    // The query that is to be executed.
    $exist = "SELECT * FROM `seller` WHERE username ='$username' ";

    $result_username = mysqli_query($conn, $exist);
    $username_check = mysqli_num_rows($result_username);

    // Only if there is one entry with the given username only then check the password. This reduces the chance of sql injections.
    if ($username_check == 1) {
        while ($row = mysqli_fetch_assoc($result_username)) {
            if ($password == $row['password']) {

                // start session

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];


                // reroute the page to home page
                header("location:Seller_dash.php");
            }// if password is not correct
            else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong>Please check your password
</div>';
}
}
}

// username check
else{
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>Please check your username
</div>';
}
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-image: linear-gradient(to right,#c33764 , #1d2671);
            margin: 0;
            padding: 0;
            color: #de7aef;
            font-family: montserrat;
            height: 100vh;
            overflow: hidden;

        }
        .containers{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            border: 5px solid black;
            border-radius: 20px;
            background-color: #131315;
        }

        h1{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid #ffffff;
            color: #ffffff;
        }

        form{
            padding: 0 40px;
            padding-bottom: 40px;
            box-sizing: border-box;

        }

        .login{
            position: relative;
            border: 2px solid #ff93f8;
            border-radius: 15px;
            margin: 30px 0;


        }
        .login input{
            width: 19rem;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            border-radius: 15px;
            background: none;
            outline: none;
            color: #ffffff;
        }

        .submit{

            padding: 5px;
            margin: 10px;
            /*border: 1px solid #ffffff;*/
            border-radius: 15px;
            text-align: center;
            background: #ff93f8;
        }

        .submits{
            border: none;
            background-color: #ff93f8;
            font-size: large;
            font-family: montserrat;
        }
        .btn btn-outline-info{
            background-color: white;
        }

    </style>
    <title>login</title>
</head>
<body>

<div class="containers">
    <form action="login.php" method="post" autocomplete="on">
        <h1 STYLE="padding: 5px; margin-right: auto; margin-left: auto">SELLER SIGN IN</h1>
        <div class="login">

            <input placeholder="Username" type="text" class="username" name="username">

        </div>

        <div class="login">

            <input placeholder="Password" type="password" class="username" name="password">

        </div>

        <div class="submit">
            <input type="submit" class="submits" value="login">
        </div>

        <div class="login_sell" style="text-align: center; padding-bottom: 5px; padding-top: 10px; color:#131315">
            <button type="button" ><a href="signup.php" >Become a seller</a></button>
        </div>

        <div class="signin" style="text-align: center; padding-bottom: 5px; padding-top: 10px">
            <a href="../buyer/login_1.php">Login as a user</a>
        </div>
    </form>
</div>

</body>
</html>