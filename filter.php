<html>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</html>

<?php
include 'dbh.php';

$results_per_page = 10;

$sql='SELECT * FROM internships';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

$this_page_first_result = ($page-1)*$results_per_page;

$sql='SELECT * FROM internships LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)) {
            if($row['CV']==1) {
                $msg = "Yes";
            }
            else {
                $msg = "No";
            }

            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
                            <p>Open Positions: ".$row['open_Positions']."</p>
                            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
    }

    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<a href="filter.php?page=' . $page . '">' . $page . '</a> ';
    }
?>
