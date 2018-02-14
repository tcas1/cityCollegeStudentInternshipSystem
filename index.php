<?php

session_start();

include 'dbh.php';



$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$invalidEmail = "";

//if error=empty is in the URL do this
if (strpos($url, 'submitapp=success')!==false){
    echo "Your Application was successfully uploaded";

}
elseif (strpos($url, 'internupload=success')!==false){
    echo "Your Internship was successfully uploaded";

}?>

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
    <div class = "row" style="border: solid;">

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 " style="
        border-right: solid;
        border-right-width: 2px;
        height: 40%;float: left;
       ">
            <h1>Filter</h1>
            <form action="index.php" method="GET" style=" margin-top: 40px;">
                <select name="internship_Level">
                    <option value="select">Select Level...</option>
                    <option value="level1">Level 1</option>
                    <option value="level2">Level 2</option>
                    <option value="level3">Level 3</option>
                    <option value="Graduate">Graduate</option>
                </select>
                <br><br>
                <select name="duration">
                    <option value="select">Select Duration...</option>
                    <option value="4months">4 Months</option>
                    <option value="8months">8 Months</option>
                    <option value="12months">12 Months</option>
                </select>

                <br><br>
                <button type='submit' name="submit">submit</button>
                <button type='submit' name="reset">reset</button>

            </form>
        </div>
        <div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9" style="height: 100%">
            <!--                    Internships-->
            <br>
            <?php
            //            $results_per_page = 10;

            $sql="SELECT * FROM internships";
            //            $sql2="SELECT * FROM users";
            //            $result2 = mysqli_query($conn, $sql2);
            $result = mysqli_query($conn, $sql);
            //            $row2 = mysqli_fetch_array($result2);
            //            $number_of_results = mysqli_num_rows($result);
            //            $number_of_pages = ceil($number_of_results/$results_per_page);
            //
            //            if (!isset($_GET['page'])) {
            //                $page = 1;
            //            } else {
            //                $page = $_GET['page'];
            //            }
            //
            //            $this_page_first_result = ($page-1)*$results_per_page;
            //
            //            $sql='SELECT * FROM internships LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
            //
            //            $result = mysqli_query($conn, $sql);

            if(isset($_SESSION['lecturer'])) {
                //echo "<div class=\"Example\">" . "<a href=\"internshipform2.html\">Create an internship</a></div> ";

                echo "<div class=\"panel panel-info\">";
                echo " <div class=\"panel-heading\">";
                echo "<h3>Create an Internship</h3>";
                echo "<a href=\"internshipform2.html\"><button class=\"btn btn-primary\" type=\"submit\" style=\"width: 15%;margin-left: 80%\">Create</button></a>\n";
                echo " </div>";
                echo " </div>";

            }
            if(!isset($_GET['reset'])&&!isset($_GET['submit'])){
                $results_per_page = 10;
                $sql="SELECT * FROM internships";
                $result = mysqli_query($conn, $sql);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results/$results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $this_page_first_result = ($page-1)*$results_per_page;
                $sql="SELECT * FROM internships LIMIT $this_page_first_result ,  $results_per_page";
                $result = mysqli_query($conn, $sql);


                while(/*!isset($_GET['submit']) &&*/ $row = mysqli_fetch_array($result))
                {
                    if($row['CV']==1) {
                        $msg = "Yes";
                    }
                    else {
                        $msg = "No";
                    }

                    echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
                            <p>Open Positions: ".$row['open_Positions']."</p>
                            "." Deadline: ".$row['date']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                }
                echo "<center><div> Page: ";
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
                }
                echo "</div></center>";

            }



            if(isset($_GET['reset'])){
                $results_per_page = 10;
                $sql="SELECT * FROM internships";
                $result = mysqli_query($conn, $sql);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results/$results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $this_page_first_result = ($page-1)*$results_per_page;
                $sql="SELECT * FROM internships LIMIT  $this_page_first_result , $results_per_page";
                $result = mysqli_query($conn, $sql);


                while(/*!isset($_GET['submit']) &&*/ $row = mysqli_fetch_array($result))
                {
                    if($row['CV']==1) {
                        $msg = "Yes";
                    }
                    else {
                        $msg = "No";
                    }

                    echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
                            <p>Open Positions: ".$row['open_Positions']."</p>
                            "." Deadline: ".$row['date']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                }
                echo "<center><div> Page: ";
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<a href="index.php?internship_Level=select&duration=select&reset=&page=' . $page . '">' . $page . '</a> ';
                }
                echo "</div></center>";

            }
            //            for ($page=1;$page<=$number_of_pages;$page++) {
            //                echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
            //            }

            while(!isset($_GET['submit']) && $row = mysqli_fetch_array($result))
            {
                if($row['CV']==1) {
                    $msg = "Yes";
                }
                else {
                    $msg = "No";
                }

                echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
						<p>Open Positions: ".$row['open_Positions']."</p>
						"." Deadline: ".$row['date']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

            }

            if(isset($_GET['submit'])) {
                $duration = $_GET['duration'];
                $internship_level=$_GET['internship_Level'];

//$sql = "SELECT * FROM internships WHERE duration='$duration'";
//$result=mysqli_query($conn,$sql);


                //  4 MONTHS LEVEL 1_______________________________________________________________________________________________________________

                if ($_GET['duration'] == '4months' && $_GET['internship_Level']=='level1') {

                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level%1%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level%1%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    }
                    else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            }
                            else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                                  <p>Open Positions: " . $row['open_Positions'] . "</p> " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] .
                                " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level1&duration=4months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //  4 MONTHS LEVEL 2_______________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '4months' && $_GET['internship_Level']=='level2') {

                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level%2%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level2&duration=4months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //  4 MONTHS LEVEL 3_______________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '4months' && $_GET['internship_Level']=='level3') {

                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level%3%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level3&duration=4months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //  4 MONTHS GRADUATE_______________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '4months'&& $_GET['internship_Level']=='Graduate') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%Graduate%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=Graduate&duration=4months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //8 MONTHS LEVEL 1____________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '8months' && $_GET['internship_Level']=='level1') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 1%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level%1%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level1&duration=8months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //8 MONTHS LEVEL 2____________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '8months' && $_GET['internship_Level']=='level2') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level%2%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level2&duration=8months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //8 MONTHS LEVEL 3____________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '8months' && $_GET['internship_Level']=='level3') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level%3%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level3&duration=8months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //8 MONTHS GRADUATE____________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '8months'&& $_GET['internship_Level']=='Graduate') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%Graduate%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=Graduate&duration=8months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //12 MONTHS LEVEL 1______________________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '12months'&& $_GET['internship_Level']=='level1') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 1%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level%1%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level1&duration=12months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //12 MONTHS LEVEL 2______________________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '12months' && $_GET['internship_Level']=='level2') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level%2%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level2&duration=12months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //12 MONTHS LEVEL 3______________________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '12months' && $_GET['internship_Level']=='level3') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level%3%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level3&duration=12months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //12 MONTHS GRADUATE______________________________________________________________________________________________________________________________

                elseif ($_GET['duration'] == '12months'&& $_GET['internship_Level']=='Graduate') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%Graduate%' LIMIT $this_page_first_result, $results_per_page";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=Graduate&duration=12months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                //SELECT SELECT

                elseif ($_GET['duration'] == 'select'&& $_GET['internship_Level']=='select') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships LIMIT $this_page_first_result , $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) <= 0) {
                        echo "These aren't the results you're looking for";
                    }
                    else{
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }

                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
                                <p>Open Positions: " . $row['open_Positions'] . "</p>
                                " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=" . $row['internship_Id'] . "'>View Job</a></div>";

                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=select&duration=select&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                elseif ($_GET['duration'] == '4months' && $_GET['internship_Level']=='select') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=4";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE duration=4 LIMIT $this_page_first_result , $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    }

                    else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=select&duration=4months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }
                elseif ($_GET['duration'] == '8months' && $_GET['internship_Level']=='select') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=8";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE duration=8 LIMIT $this_page_first_result , $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=select&duration=8months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }elseif ($_GET['duration'] == '12months' && $_GET['internship_Level']=='select') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE duration=12";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE duration=12 LIMIT $this_page_first_result , $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=select&duration=12months&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                elseif ($_GET['duration'] == 'select' && $_GET['internship_Level']=='level1') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level 1%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level%1%' LIMIT $this_page_first_result, $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level1&duration=select&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                elseif ($_GET['duration'] == 'select' && $_GET['internship_Level']=='level2') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level%2%' LIMIT $this_page_first_result, $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level2&duration=select&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                elseif ($_GET['duration'] == 'select' && $_GET['internship_Level']=='level3') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%level%3%' LIMIT $this_page_first_result, $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=level3&duration=select&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }

                elseif ($_GET['duration'] == 'select' && $_GET['internship_Level']=='Graduate') {
                    $results_per_page = 10;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM internships WHERE internship_Level LIKE '%Graduate%' LIMIT $this_page_first_result, $results_per_page";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These aren't the results you're looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['date'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                        echo "<center><div> Page: ";
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo '<a href="index.php?internship_Level=Graduate&duration=select&submit=&page=' . $page . '">' . $page . '</a> ';
                        }
                        echo "</div></center>";
                    }
                }
            }

            //            if(mysqli_num_rows($result) > 0) {
            //
            //            }
            ?>
        </div>
    </div>

</div>
</body>
</html>
