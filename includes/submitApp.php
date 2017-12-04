<?php

session_start();
include '../dbh.php';


$_SESSION['firstName']=$_POST['firstName'];
$_SESSION['lastName']=$_POST['lastName'];
$_SESSION['email']=$_POST['email'];
$level=$_POST['level'];
$getId=$_GET['id'];

$sql = "INSERT INTO applications (firstName,lastName,email,level, internship_Id) VALUES ('{$_SESSION['firstName']}','{$_SESSION['lastName']}','{$_SESSION['email']}','$level','$getId')";
$result = mysqli_query($conn, $sql);
header("Location: ../index.php?submitapp=success");

