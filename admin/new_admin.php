<?php
include "../partials/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST["username"];
    $name = $_POST['name'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $exist = "SELECT * FROM `admin` WHERE username ='$username' ";
    $result_username = mysqli_query($conn, $exist);
    $username_check = mysqli_num_rows($result_username);
    if ($username_check <= 0) {

        if ($password == $cpassword && $password != "") {
            $sql = "INSERT INTO `admin` (`admin_id`, `username`, `name`, `password`) VALUES (NULL, '$username', '$name', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // Start a session now

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                // reroute the page to home page
                header("location:Admin.php");

                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Congratulations!</strong> Your account has been created.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
            }
        }
    }
} else {   // username check
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<!doctype>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: linear-gradient(to right, #c33764, #1d2671);
            margin: 0;
            padding: 0;
            color: #de7aef;
            font-family: montserrat;
            height: 100vh;
            overflow: hidden;

        }

        .containers {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            border: 5px solid black;
            border-radius: 20px;
            background-color: #131315;
        }

        h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid #ffffff;
            color: #ffffff;
        }

        form {
            padding: 0 40px;
            box-sizing: border-box;

        }

        .login {
            position: relative;

            border-radius: 15px;
            margin: 30px 0;
            background-color: rgba(255, 255, 255, .2);


        }

        /*.login:hover{*/
        /*    border: 2px solid #ffffff;*/
        /*    position: relative;*/

        /*    border-radius: 15px;*/
        /*    margin: 30px 0;*/
        /*    background-color: rgba(255, 255, 255, .2);*/
        /*    transition: .01s;*/
        /*}*/

        /*.login:focus{*/
        /*    border: 2px solid #ffffff;*/
        /*    position: relative;*/

        /*    border-radius: 15px;*/
        /*    margin: 30px 0;*/
        /*    background-color: rgba(255, 255, 255, .2);*/
        /*    transition: .01s;*/
        /*}*/

        .login input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            color: #fffefe;
        }

        .submit {

            padding: 5px;
            margin: 10px;
            /*border: 1px solid #ffffff;*/
            border-radius: 15px;
            text-align: center;
            background: #ff93f8;
        }

        .submits {
            border: none;
            background-color: #ff93f8;
            font-size: large;
            font-family: montserrat;
        }


        .signin {
            padding: 15px 5px 15px 5px;
            text-align: center;
        }
    </style>
    <title>Sign Up</title>
</head>

<body>
    <?php
    //include "../partials/_navbar.php";
    ?>
    <div class="containers">
        <form action="new_admin.php" method="POST" autocomplete="off">
            <h1 STYLE="padding: 5px; margin-right: auto; margin-left: auto">SIGN UP</h1>
            <div class="login">
                <input placeholder="Username" type="text" class="username" name="username" required>
            </div>
            <div class="login">
                <input placeholder="Name" type="text" class="name" name="name" required>
            </div>
            <div class="login">
                <input placeholder="Password" type="password" class="username" name="password" required>
            </div>
            <div class="login">
                <input placeholder="Confirm Password" type="password" class="cpassword" id="cpassword" name="cpassword" required>
            </div>
            <div class="submit">
                <input type="submit" class="submits" value="Sign Up">
            </div>
            <div class="signin">
                <a href="Admin_login.php">Admin login</a>
            </div>
        </form>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>