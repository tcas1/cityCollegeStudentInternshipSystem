<?php
//include 'dbh.php';
//include 'index.php';
//
//if(isset($_POST['submit'])) {
//    $duration = $_POST['duration'];
//    $internship_level=$_POST['internship_Level'];
//
////$sql = "SELECT * FROM internships WHERE duration='$duration'";
////$result=mysqli_query($conn,$sql);
//
//    if ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level1') {
//        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 1%' ";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level2') {
//        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 2%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level3') {
//
//
//        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 3%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '4months'&& $_POST['internship_Level']=='Graduate') {
//        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%Graduate%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//
//    //8 months
//    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level1') {
//        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 1%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//                  <p>Open Positions: " . $row['open_Positions'] . "</p>
//                  " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//            }
//        }
//    }
//    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level2') {
//        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 2%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level3') {
//        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 3%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//
//
//    }
//    elseif ($_POST['duration'] == '8months'&& $_POST['internship_Level']=='Graduate') {
//        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%Graduate%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//
//
//    }
//
//
//    //12 months
//    elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='level1') {
//        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 1%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            }
//        }
//    }
//    elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level2') {
//        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 2%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level3') {
//        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 3%'";
//        $result = mysqli_query($conn, $sql);
//
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//    elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='Graduate') {
//        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%Graduate%'";
//        $result = mysqli_query($conn, $sql);
//        if(mysqli_num_rows($result) <= 0)
//        {
//            echo "These are not the results you are looking for";
//        } else {
//            while ($row = mysqli_fetch_array($result)) {
//                if ($row['CV'] == 1) {
//                    $msg = "Yes";
//                } else {
//                    $msg = "No";
//                }
//                echo "<div class=\"Listing\">" . "Title: " . $row['title'] . "<p>Description: " . $row['description'] . "</p><br>" . " Level: " . $row['internship_Level'] . "
//            <p>Open Positions: " . $row['open_Positions'] . "</p>
//            " . " Deadline: " . $row['datetime'] . "<br><p> Duration: " . $row['duration'] . " Months</p>" . "CV Required: $msg</div>";
//
//            };
//        }
//    }
//
//    elseif ($_POST['duration'] == '"null"'&& $_POST['internship_Level']=='"null"') {
//        $sql = "SELECT * FROM internships";
//        $result = mysqli_query($conn, $sql);
//        while($row = mysqli_fetch_array($result))
//        {
//            echo "<div class=\"Listing\">"."Title: ".$row['866title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
//            <p>Open Positions: ".$row['open_Positions']."</p>
//            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";
//
//        };
//
//
//    }
//}
//?>
<!---->
