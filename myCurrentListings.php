<?php

session_start();

include 'dbh.php';
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'archive=success')!==false){
    echo "Your Internship has been successfully archive. You can now find it in the Archive Listing Tab";
}
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

    <div class = "row" style="
     background-color: skyblue;
     border-top-color: initial;
     border-top-style: solid;
     border-top-width: initial;
     border-right-color: initial;
     border-right-style: solid;
     border-right-width: initial;
     border-left-color: initial;
     border-left-style: solid;
     border-left-width: initial;" >

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
            <h1>My Current Internships</h1>

            <br>
            <?php
            $results_per_page = 10;
            $sql="SELECT * FROM internships WHERE isarchived=0 AND poster_Id='{$_SESSION['id']}' ";
            //$sql2="SELECT * FROM users";
            //$result2 = mysqli_query($conn, $sql2);
            $result = mysqli_query($conn, $sql);
            //$row2 = mysqli_fetch_array($result2);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results/$results_per_page);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page-1)*$results_per_page;
            $sql="SELECT * FROM internships WHERE isarchived=0 AND poster_Id='{$_SESSION['id']}' LIMIT $this_page_first_result ,  $results_per_page";
            $result = mysqli_query($conn, $sql);



        if(isset($_SESSION['lecturer'])) {
            echo "<div class=\"panel panel-info\">";
            echo " <div class=\"panel-heading\">";
            echo "<h3>Create an Internship</h3>";
            echo "<a href=\"internshipform2.html\"><button class=\"btn btn-primary\" type=\"submit\" style=\"width: 15%;margin-left: 80%\">Create</button></a>\n";
            echo " </div>";
            echo " </div>";
        }

            if(mysqli_num_rows($result) <= 0)
            {
                echo "You currently do not have any internships listed";
            }

            else {
                while ($row = mysqli_fetch_array($result)) {

                    if ($row['CV'] == 1) {
                        $msg = "Yes";
                    } else {
                        $msg = "No";
                    }

                    if ($_SESSION['lecturer']) {
                        $appview = "<a href='viewApplicants.php?id=" . $row['internship_Id'] . "'>View Applicants</a>";
                        $arch = "<a href='arch.php?id=" . $row['internship_Id'] . "'>Archive</a>";
                        $edit = "<a href='edit.php?id=" . $row['internship_Id'] . "'>Edit</a>";
                        $delete = "<a href='delete.php?id=" . $row['internship_Id'] . "'>Delete</a>";

                    } else {
                        $appview = "";
                        $arch = "";
                    }

                    echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
    <p>Open Positions: " . $row['open_Positions'] . "</p> 
    " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg $appview <br>$arch $edit $delete</div>";

                }
                echo "<center><div> Page: ";
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<a href="myCurrentListings.php?page=' . $page . '">' . $page . '</a> ';
                }
                echo "</div></center>";

            }
            ?>

        </div>
    </div>

</div>
</body>
</html>



