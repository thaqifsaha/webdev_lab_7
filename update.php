<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$matric = $_GET['matric'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE matric='$matric'"));

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $role = $_POST['role'];
    $accessLevel = ($role == 'student') ? 'basic' : 'admin';

    $sql = "UPDATE users SET name='$name', role='$role', accessLevel='$accessLevel' WHERE matric='$matric'";
    mysqli_query($conn,$sql);

    header("Location: viewUsers.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Update User</h2>

    <form method="POST">
        <input type="text" value="<?= $user['matric'] ?>" disabled>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>

        <select name="role">
            <option value="student" <?= $user['role']=='student'?'selected':'' ?>>Student</option>
            <option value="lecturer" <?= $user['role']=='lecturer'?'selected':'' ?>>Lecturer</option>
        </select>

        <button name="update">Update</button>
    </form>

    <a class="footer-link" href="viewUsers.php">Back to list</a>
</div>

</body>
</html>
