<?php

session_start();

include 'dbh.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Student page
    </title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class = "row" <div class = "row" style="
     background-color: skyblue;
     border-top-color: initial;
     border-top-style: solid;
     border-top-width: initial;
     border-right-color: initial;
     border-right-style: solid;
     border-right-width: initial;
     border-left-color: initial;
     border-left-style: solid;
     border-left-width: initial;">

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img src="images/logo_city.png" >
        </div>
        <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h1 class="thick-heading"> CIMS</h1>
            <form role="form">
                <input type="text" id="search" class="form-control" placeholder="search "
                       style="display: inline-block; width: 80%;border-radius:20px">
            </form>

        </div>
        <div class = "col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <br><br><br>
            <ul class = "nav navbar-nav">
                <a href="index.php" class="btn-primary btn-lg"> Home</a>
                <a href="myAccount.php" class="btn-primary btn-lg"> Account</a>
                <a href="includes/logout_inc.php" class="btn-primary btn-lg"> Log Out</a>

            </ul>

        </div>


    </div>
    <div class = "row" style="border: solid">

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 " style="border-right: solid; border-right-width: 2px; height: 1200px">
            <nav class="nav-sidebar">
                <ul class="nav">
                    <h3>Menu</h3>
                    <li><a href="myAccount.php">My Account</a></li>
                    <li><a href="myCurrentListings.php">My Current Internships</a></li>
                    <li><a href="myPastListings.php">My Archived Internships</a></li>
                    <li class="nav-divider"></li>
                </ul>
            </nav>
        </div>

        <div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <!--                    Internships-->
            <h1>My Past Internships</h1>

            <br>
            <?php
            $results_per_page = 10;
            $sql="SELECT * FROM internships WHERE isarchived=1 AND poster_Id='{$_SESSION['id']}' ";
            $result = mysqli_query($conn, $sql);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results/$results_per_page);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

//            if (!$result) {
//                printf("Error: %s\n", mysqli_error($conn));
//
//                exit();
//            }

            echo "<div class=\"panel panel-info\">";
            echo " <div class=\"panel-heading\">";
            echo "<h3>Create an Internship</h3>";
            echo "<a href=\"internshipform2.html\"><button class=\"btn btn-primary\" type=\"submit\" style=\"width: 15%;margin-left: 80%\">Create</button></a>\n";
            echo " </div>";
            echo " </div>";


            if(mysqli_num_rows($result) <= 0)
            {
                echo "You currently do not have any internships Archived";
            }

            else {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['CV'] == 1) {
                        $msg = "Yes";
                    } else {
                        $msg = "No";
                    }

                    $appview = "<a href='viewApplicants.php?id=" . $row['internship_Id'] . "'>View Applicants</a>";
                    $repost = "<a href='repost.php?id=" . $row['internship_Id'] . "'>Repost</a>";

                    echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
    <p>Open Positions: " . $row['open_Positions'] . "</p> 
    " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <br> $appview $repost</div>";
                }
                echo "<center><div> Page: ";
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<a href="myPastListings.php?page=' . $page . '">' . $page . '</a> ';
                }
                echo "</div></center>";

            }
            ?>
        </div>
    </div>

</div>
</body>
</html>