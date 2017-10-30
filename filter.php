<?php
include 'dbh.php';
include 'index.php';

if(isset($_POST['submit'])) {
    $duration = $_POST['duration'];
    $internship_level=$_POST['internship_Level'];

//$sql = "SELECT * FROM internships WHERE duration='$duration'";
//$result=mysqli_query($conn,$sql);

    if ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level1') {
        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 1%' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level2') {
        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 2%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '4months' && $_POST['internship_Level']=='level3') {
        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%level 3%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '4months'&& $_POST['internship_Level']=='Graduate') {
        $sql = "SELECT * FROM internships WHERE duration=4 AND internship_Level LIKE '%Graduate%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }

    //8 months
    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level1') {
        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 1%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
                  <p>Open Positions: ".$row['open_Positions']."</p> 
                  "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        }

    }
    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level2') {
        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 2%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '8months' && $_POST['internship_Level']=='level3') {
        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%level 3%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '8months'&& $_POST['internship_Level']=='Graduate') {
        $sql = "SELECT * FROM internships WHERE duration=8 AND internship_Level LIKE '%Graduate%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }


    //12 months
    elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='level1') {
        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 1%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        }

    }
    elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level2') {
        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 2%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '12months' && $_POST['internship_Level']=='level3') {
        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%level 3%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }
    elseif ($_POST['duration'] == '12months'&& $_POST['internship_Level']=='Graduate') {
        $sql = "SELECT * FROM internships WHERE duration=12 AND internship_Level LIKE '%Graduate%'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class=\"Listing\">"."Title: ".$row['title']."<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']." 
            <p>Open Positions: ".$row['open_Positions']."</p> 
            "." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p></div>";

            if($row['CV']==1){echo "yes";}
            else{echo "no";}
        };


    }

    else {
//        $sql = "SELECT * FROM internships";
//        $result = mysqli_query($conn, $sql);
echo "These are not the results you are loooking for";
    }
}