<?php
include "db.php";

if(isset($_POST['submit'])) {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $accessLevel = ($role == 'student') ? 'basic' : 'admin';

    $sql = "INSERT INTO users (matric, name, password, role, accessLevel)
            VALUES ('$matric','$name','$password','$role','$accessLevel')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Registration successful'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Failed to register. Matric may already exist.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- LOGO -->
<div class="logo-container">
    <img src="uthmlogo.png" class="logo" alt="UTHM Logo">
</div>


<div class="container">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="matric" placeholder="Matric Number" required>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role">
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select>

        <button type="submit" name="submit">Register</button>
    </form>

    <a class="footer-link" href="login.php">Already have an account?</a>
</div>

</body>
</html>
