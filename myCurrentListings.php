<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 10/17/2017
 * Time: 12:13 AM
 */
session_start();

include 'dbh.php';
include 'header.php';

$sql="SELECT * FROM internships WHERE poster_Id='{$_SESSION['id']}'";

$result = mysqli_query($conn, $sql);

echo "<div class=\"Example\">"."<a href=\"Listingcreator.php\">Create an internship.</a></div> ";

while($row = mysqli_fetch_array($result))
{
    if($row['CV']==1) {
        $msg = "Yes";
    }
    else {
        $msg = "No";
    }

    echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
    <p>Open Positions: ".$row['open_Positions']."</p> 
    "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg</div>";

}
?>
<html>
<link rel="stylesheet" type="text/css" href="css/internships.css">

</html>


