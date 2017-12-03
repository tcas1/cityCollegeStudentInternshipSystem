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
    <div class = "row" >
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
    <hr>
    <div class = "row">

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 " style="border-right: solid; border-right-width: 2px; height: 1200px">
            <form action="index.php" method="POST">
                <select name="internship_Level">
                    <option value="null">Select Level...</option>
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
                <button type='submit' name="reset">reset</button>

            </form>
        </div>
        <div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <!--                    Internships-->
            <br>
            <?php

            $sql="SELECT * FROM internships";

            $result = mysqli_query($conn, $sql);


            echo "<div class=\"Example\">"."<a href=\"Listingcreator.php\">Create an internship.</a></div> ";

            if(isset($_POST['reset'])){
                while(!isset($_POST['submit']) && $row = mysqli_fetch_array($result))
                {
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

            }


            while(!isset($_POST['submit']) && $row = mysqli_fetch_array($result))
            {
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

            if(isset($_POST['submit'])) {
                $duration = $_POST['duration'];
                $internship_level=$_POST['internship_Level'];

//$sql = "SELECT * FROM internships WHERE duration='$duration'";
//$result=mysqli_query($conn,$sql);

                if ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level1') {
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 1%' ";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level2') {
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level3') {


                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '4months'&& $_POST['internship_Level']=='Graduate') {
                    $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }

                //8 months
                elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level1') {
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 1%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
                  <p>Open Positions: " . $row['open_Positions'] . "</p> 
                  " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";
                        }
                    }
                }
                elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level2') {
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level3') {
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }


                }
                elseif ($_POST['duration'] == '8months'&& $_POST['internship_Level']=='Graduate') {
                    $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }


                }


                //12 months
                elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='level1') {
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 1%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        }
                    }
                }
                elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level2') {
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 2%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level3') {
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 3%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }
                elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='Graduate') {
                    $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%Graduate%'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) <= 0)
                    {
                        echo "These are not the results you are looking for";
                    } else {
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['CV'] == 1) {
                                $msg = "Yes";
                            } else {
                                $msg = "No";
                            }
                            echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . " 
            <p>Open Positions: " . $row['open_Positions'] . "</p> 
            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a></div>";

                        };
                    }
                }

                elseif ($_POST['duration'] == '"null"'&& $_POST['internship_Level']=='"null"') {
                    $sql = "SELECT * FROM internships";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

                    };


                }
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>
