
<html>
<link rel="stylesheet" type="text/css" href="css/internships.css">
<h1>My Past Internships</h1>
<nav>
    <ul>
        <li><a href="myAccount.php">My Account</a> </li>
        <li><a href="myCurrentListings.php">My Current Internships</a> </li>
        <li><a href="myPastListings.php">My Past Internships</a></li>
    </ul>
</nav>
</html>
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

$sql="SELECT * FROM internships WHERE datetime < CURRENT_DATE AND poster_Id='{$_SESSION['id']}' ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));

    exit();
}

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