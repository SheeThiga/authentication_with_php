<?php
include("connection.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="user-page">
        <h2>Welcome, to Admin page!</h2>
        <p>Admin : <span><?php echo $_SESSION['admin']; ?></span></p>
        <a href="logout.php"><button class="btn font-weight-bold">Logout</button></a>
    </div>
</body>

</html>