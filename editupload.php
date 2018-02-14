<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 2/10/2018
 * Time: 5:51 PM
 */
session_start();

include 'dbh.php';

if(isset($_POST['update'])){

    $title=$_POST['title'];
    $description=$_POST['description'];
    $duration=$_POST['duration'];
    $CV = $_POST['CV'];
    $datetime = $_POST['datetime'];
    $open_Positions=$_POST['open_Positions'];

    $internship_Level = $_POST['internship_Level'];
    $chk="";
    foreach($internship_Level as $chk1)
    {
        $chk .= $chk1.",";
    }


    $sql= "UPDATE internships SET title='$title',description='$description',duration='$duration', internship_Level='$internship_Level',
 CV=='$CV',datetime='$datetime', open_Positions='$open_Positions' WHERE internship_Id='".$_GET['id']."'";

    //$sql= "UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email',level='$level' WHERE Id='{$_SESSION['id']}'";

    $result = mysqli_query($conn, $sql);

    if(!$result )
    {
        echo "Could not update data:";
    }
    else
    {
        header("Location:myCurrentListings.php?internupdate=success");
    }

}