<?php


$exist = "SELECT * FROM `users` WHERE username ='$username' ";
$result_username = mysqli_query( $conn,$exist);
$username_check= mysqli_num_rows($result_username);

if($username_check == 1) {
    while ($row = mysqli_fetch_assoc($result_username)) {
        if ($password == $row['u_password']) {
            // start session

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            // reroute the page to home page
            header("location:index.php");
        }
    }

else{    // password check
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong>Please check your username
				</div>';
    }
}
else{   // username check
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong>Please check your username
				</div>';
}
}















?>