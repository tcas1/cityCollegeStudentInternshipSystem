<?php

session_start();
include '../dbh.php';

$email=$_POST['email'];
$password=$_POST['password'];


/*match entered email and password info with that stored in the database*/
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$sql);

if(!$row=mysqli_fetch_assoc($result)) {
    echo "Your email and/or password is invalid";
    header("Location: ../landingPage.php");
}
else{
    $_SESSION['id'] = $row['Id'];
    $_SESSION['email'] = $row['email'];
    /* landing page once user logs in*/
    header("Location: ../index.php");


}

//THEO

