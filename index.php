<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 10/16/2017
 * Time: 10:44 PM
 */
session_start();

include 'header.php';
include 'dbh.php';
?>


<html>
<link rel="stylesheet" type="text/css" href="css/internships.css">

<div class="filter">


<body>

<?php

$sql="SELECT * FROM internships";

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



<form action="filter.php" method="POST">
    <select name="internship_Level">
        <option value="">Select Level...</option>
        <option value="level1">Level 1</option>
        <option value="level2">Level 2</option>
        <option value="level3">Level 3</option>
        <option value="Graduate">Graduate</option>
    </select>
    <br><br>
    <select name="duration">
        <option value="">Select Duration...</option>
        <option value="4months">4 Months</option>
        <option value="8months">8 Months</option>
        <option value="12months">12 Months</option>
    </select>

    <br><br>
    <button type='submit' name="submit">submit</button>

</form>

</body>
</html>
