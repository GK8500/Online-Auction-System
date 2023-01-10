<?php
include './partials/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
}

    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="cc/bg.css">
    <style>
        body {
            margin: 0;
            color: #C1AAC6;
            /*background: #131315;*/

        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: itemle
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .containers {
            width: 100%;
            margin: auto;
            margin-top: 5%;
            max-width: 525px;
            min-height: 670px;
            position: relative;
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
        }

        .login-container {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background: #131315;
        }

        .login-container .sign-in-htm,
        .login-container .sign-up-htm {
            top: 30%;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear;
        }

        .login-container .sign-up-htm {
            top: 20%;
        }

        .login-container .sign-in,
        .login-container .sign-up,
        .login-form .group .check {
            display: none;
        }

        .login-container .item,
        .login-form .group .label,
        .login-form .group .button {
            text-transform: uppercase;
        }

        .login-container .item {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
            cursor: pointer;
        }

        .login-container .sign-in:checked+.item,
        .login-container .sign-up:checked+.item {
            color: #fff;
            border-color: #DF00FF;
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .button {
            cursor: pointer;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            text-security: circle;
            -webkit-text-security: circle;
        }

        .login-form .group .label {
            color: #aaa;
            font-size: 12px;
        }

        .login-form .group .button {
            background: #DF00FF;
        }

        .login-form .group .check:checked+label {
            color: #fff;
        }

        .login-container .sign-in:checked+.item+.sign-up+.item+.login-form .sign-in-htm {
            transform: rotate(0);
        }

        .login-container .sign-up:checked+.item+.login-form .sign-up-htm {
            transform: rotate(0);
        }

        .hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, .2);
        }

        .footer {
            text-align: center;
        }
    </style>
</head>


<body>
<?php include "_navbar.php"; ?>
<div class="containers" >
    <div class="login-container" >
        <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1" class="item">Sign In</label>
        <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2" class="item">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <input placeholder="Username" id="users" type="text" class="input" name="username">
                </div>
                <div class="group">
                    <input placeholder="Password" name="password" id="password_SignIn" type="password" class="input" data-type="password">
                </div>

                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
                <div class="hr"></div>

            </div>
            <div class="sign-up-htm">
                <div class="group">
                    <input placeholder="Username" id="user" type="text" class="input">
                </div>
                <div class="group">
                    <input placeholder="Name" id="Name" type="text" class="input">
                </div>

                <div class="group">
                    <input placeholder="Email address" id="email" type="text" class="input">
                </div>

                <div class="group">
                    <input placeholder="Password" id="password_signUp" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input placeholder="Repeat password" id="C_password_signUp" type="password" class="input" data-type="password">
                </div>

                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>

                <div class="footer">
                    <label for="item-1">Already have an account?</a></label>
                </div>
            </div>
        </div>
    </div>
</div>

    </body>
</html>