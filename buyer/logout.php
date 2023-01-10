<?php
session_start();
session_unset();
session_destroy();
header("location: login_1.php")

?>

<script>
    alert("You have been logged out!")
</script>