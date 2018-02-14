<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 2/11/2018
 * Time: 2:24 PM
 */
session_start();

include 'dbh.php';

$sql3 = "DELETE FROM internships WHERE internship_Id='".$_GET['id']."'";
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];




if (mysqli_query($conn, $sql3)) {

//    if (strpos($url, 'myCurrentListings')){
        header("Location:myCurrentListings.php?internshipdeleted=success");
    }
//    else{
//        header("Location:myPastListings.php?internshipdeleted=success");
//    }
//} else {
//    if (strpos($url, 'myCurrentListings')!==false){
//        header("Location:myCurrentListings.php?internshipdeleted=failed");
//    }
//    else{
//        header("Location:myPastListings.php?internshipdeleted=failed");
//    }
//}
elseif (!mysqli_query($conn, $sql3)) {

    printf("Errormessage: %s\n", mysqli_error($conn));
}