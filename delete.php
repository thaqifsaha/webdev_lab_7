<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$matric = $_GET['matric'];

mysqli_query($conn, "DELETE FROM users WHERE matric='$matric'");
header("Location: viewUsers.php");
?>
