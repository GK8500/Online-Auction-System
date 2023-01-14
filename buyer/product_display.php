<?php
include "../partials/db.php";

    $sql = "SELECT * FROM `products` WHERE `id` = '1'";
    $result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--  // name-->
    <title><?php echo $row['name']; ?></title>
</head>
<body>

          

</body>
</html>

<?php }
    ?>