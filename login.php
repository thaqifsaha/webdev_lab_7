<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $matric = $_POST['matric'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE matric='$matric' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['user'] = $matric;
        header("Location: viewUsers.php");
    } else {
        $error = "Invalid matric or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- LOGO -->
<div class="logo-container">
    <img src="uthmlogo.png" class="logo" alt="UTHM Logo">
</div>


<div class="container">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="matric" placeholder="Matric Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <a class="footer-link" href="register.php">Create an account</a>
</div>

</body>
</html>
