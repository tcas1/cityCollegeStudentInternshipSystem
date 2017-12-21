<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 12/21/2017
 * Time: 3:44 AM
 */
session_start();

include 'dbh.php';

$sql= "UPDATE internships SET isarchived=1 WHERE internship_Id='".$_GET['id']."'";
$result = mysqli_query($conn, $sql);

header("Location: myCurrentListings.php?archive=success");
