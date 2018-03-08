<?php


//$firstName=$_POST['firstName'];
//$lastName=$_POST['lastName'];


/*match entered email and password info with that stored in the database*/
if(isset($_POST['submit'])) {
    include '../dbh.php';
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($email)|| empty($password)){
        echo "Please fill out both fields";
    }
    else {
        session_start();
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)<1){
            echo "Your email and/or password is invalid";
            header("Location: ../landingPage.php?error=invalidinfo");
            exit();
        }
        else {
            if($row = mysqli_fetch_assoc($result)){
            $_SESSION['id'] = $row['Id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['level'] = $row['level'];

                if ($row['isLecturer'] == 1) {
                    /* landing page once user logs in*/
                    header("Location: ../myCurrentListings.php");
                    $_SESSION['lecturer'] = "lect";
                    die;
                }
                elseif ($row['isAdmin'] == 1) {
                    /* landing page once user logs in*/
                    header("Location: ../index.php");
                    $_SESSION['admin'] = "admin";
                    die;
                }

                else {
                    /* landing page once user logs in*/
                    header("Location: ../index.php");
                    $_SESSION['student'] = "student";
                    die;
                }

            }
        }
    }
//    if (!$row = mysqli_fetch_assoc($result)) {
//        echo "Your email and/or password is invalid";
//        header("Location: ../landingPage.php");
//    }
//
//    else {
//        $_SESSION['id'] = $row['Id'];
//        $_SESSION['email'] = $row['email'];
//        $_SESSION['firstName'] = $row['firstName'];
//        $_SESSION['lastName'] = $row['lastName'];
//        $_SESSION['level'] = $row['level'];
//
//    }
//    if ($row['isLecturer'] == 1) {
//        /* landing page once user logs in*/
//        header("Location: ../myCurrentListings.php");
//        $_SESSION['lecturer'] = "lect";
//        die;
//    } else {
//        /* landing page once user logs in*/
//        header("Location: ../index.php");
//        $_SESSION['student'] = "student";
//        die;
//    }
}
//THEO

