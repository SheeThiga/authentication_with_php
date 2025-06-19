<?php
include("connection.php");
session_start();

$msg = '';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select1 = "SELECT * FROM `users` WHERE email='$email'";
    $select_user = mysqli_query($conn, $select1);

    if (mysqli_num_rows($select_user) > 0) {
        $row1 = mysqli_fetch_assoc($select_user);


        if (password_verify($password, $row1['password'])) {
            if ($row1['user_type'] == 'user') {
                $_SESSION['user'] = $row1['email'];
                $_SESSION['id']  = $row1['id'];
                header("Location: user.php");
                exit();
            } elseif ($row1['user_type'] == 'admin') {
                $_SESSION['admin'] = $row1['email'];
                $_SESSION['id']  = $row1['id'];
                header("Location: admin.php");
                exit();
            }
        } else {
            $msg = "Invalid password!";
        }
    } else {
        $msg = "User does not exist!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="form">
        <form action="" method="POST">
            <h2>Sign In</h2>
           <p class="msg text-danger font-weight-bold"><?php echo $msg; ?></p>

            <div class="form-group">
                <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
            </div>

            <button class="btn font-weight-bold" type="submit" name="submit">
                Login Now
            </button>
            <p>
                Don't have an account? <a href="register.php">Register Now</a>
            </p>
        </form>

    </div>
</body>

</html>