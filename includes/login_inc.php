<?php

session_start();
include '../dbh.php';

$email=$_POST['email'];
$password=$_POST['password'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];


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
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['level'] = $row['level'];

}
if ($row['isLecturer']==1){
    /* landing page once user logs in*/
    header("Location: ../myCurrentListings.php");
    die;
}

else {
    /* landing page once user logs in*/
    header("Location: ../index.php");
    die;
}

//THEO

