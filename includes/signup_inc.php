<?php

session_start();
include '../dbh.php';

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$email=$_POST['email'];
$secretcode=$_POST['secretcode'];


//check if any of the fields are empty
if(empty($firstName) || empty($lastName) || empty($password) || empty($email)){
    header("Location: ../register.php?error=empty");
    exit();
}

//check if am email is already used
else {
    $sql="SELECT email FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    $emailcheck=mysqli_num_rows($result);

   if($emailcheck>0){
        header("Location: ../register.php?error=email");
        exit();
    }
    elseif(strpos($email, '@city.academic.gr')==false){
        header("Location: ../register.php?error=invalidemail");
        exit();
    }


    else{
    //filter_var($email, FILTER_VALIDATE_EMAIL);
        $sql2 = "SELECT * FROM admincode WHERE secretcode='$secretcode'";
        $result2 = mysqli_query($conn, $sql2);

        $sql3 = "SELECT * FROM admincode WHERE admincode='$secretcode'";
        $result3 = mysqli_query($conn, $sql3);

        if($row=mysqli_fetch_assoc($result2))
        {
            $sql= "INSERT INTO users (firstName,lastName,password,email,isLecturer,isAdmin) VALUES ('$firstName','$lastName','$password','$email','1','0')";
            $result = mysqli_query($conn, $sql);
            header("Location: ../landingPage.php?signup=success");
            exit();
        }

        elseif($row=mysqli_fetch_assoc($result3))
        {
            $sql= "INSERT INTO users (firstName,lastName,password,email,isLecturer,isAdmin) VALUES ('$firstName','$lastName','$password','$email','0','1')";
            $result = mysqli_query($conn, $sql);
            header("Location: ../landingPage.php?signup=success");
            exit();
        }
        else {
            if(empty($secretcode)) {
                $sql = "INSERT INTO users (firstName,lastName,password,email,isLecturer,isAdmin) VALUES ('$firstName','$lastName','$password','$email', '0','0')";
                $result = mysqli_query($conn, $sql);
                header("Location: ../landingPage.php?signup=success");
                exit();
            }
            else{
                header("Location: ../register.php?error=invalidcode");
                exit();
            }
        }
    }
}

//THEO