<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$sql = "SELECT matric, name, accessLevel FROM users";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 style="text-align:center; margin-top:30px;">Users List</h2>

<table>
<tr>
    <th>Matric</th>
    <th>Name</th>
    <th>Access Level</th>
    <th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['matric'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['accessLevel'] ?></td>
    <td class="action-btns">
        <a href="update.php?matric=<?= $row['matric'] ?>">Update</a>
        <a href="delete.php?matric=<?= $row['matric'] ?>" onclick="return confirm('Delete user?');">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

<div style="text-align:center; margin:20px;">
    <a class="footer-link" href="logout.php">Logout</a>
</div>

</body>
</html>
