<?php
include("connection.php");

$msg = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password !== $cpassword) {
        $msg = "Passwords do not match!";
    } else {
        $select1 = "SELECT * FROM users WHERE email='$email'";
        $select_user = mysqli_query($conn, $select1);

        if (mysqli_num_rows($select_user) > 0) {
            $msg = "User already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users (`name`, `email`, `user_type`, `password`) 
                       VALUES ('$name', '$email', '$user_type', '$hashed_password')";
            if (mysqli_query($conn, $insert)) {
                header("Location: login.php");
                exit();
            } else {
                $msg = "Registration failed. Try again.";
            }
        }
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
            <h2>Registration</h2>
            <?php if (!empty($msg)) : ?>
    <p class="msg text-danger font-weight-bold"><?php echo $msg; ?></p>
<?php endif; ?>

            <div class="form-group">
                <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
            </div>
            <div class="form-group">
                <select name="user_type" id="" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="cpassword" placeholder="Confirm your password" class="form-control" required>
            </div>
            <button class="btn font-weight-bold" name="submit">
                Register Now
            </button>
            <p>
                Already have an account? <a href="login.php">Login Now</a>
            </p>
        </form>

    </div>
</body>

</html>