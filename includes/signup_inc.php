<?php

session_start();
include '../dbh.php';

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$email=$_POST['email'];

//check if any of the fields are empty
if(empty($firstName) || empty($lastName) || empty($password) || empty($email)){
    header("Location: ../landingPage.php?error=empty");
    exit();
}

//check if am email is already used
else {
    $sql="SELECT email FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    $emailcheck=mysqli_num_rows($result);

   if($emailcheck>0){
        header("Location: ../landingPage.php?error=email");
        exit();
    }
    elseif(strpos($email, '@city.academic.gr')==false){
        header("Location: ../landingPage.php?error=invalidemail");
        exit();
    }

    else{
    //filter_var($email, FILTER_VALIDATE_EMAIL);
    $sql = "INSERT INTO users (firstName,lastName,password,email) VALUES ('$firstName','$lastName','$password','$email')";
    $result = mysqli_query($conn, $sql);
        header("Location: ../landingPage.php?signup=success");

    }
}

//THEO