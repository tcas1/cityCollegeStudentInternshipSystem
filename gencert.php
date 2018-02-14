<?php
session_start();

include 'dbh.php';

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class = "row" >
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img src="images/logo_city.png" >
        </div>
        <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h1 class="thick-heading"> CIMS</h1>
            <form method="post">
                <input type="search" name="search" class="form-control" placeholder="search "
                       style="display: inline-block; width: 80%;border-radius:20px">
            </form>
        </div>
        <div class = "col-xs-3 col-sm-3 col-md-5 col-lg-3">
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

        <div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <?php
                    $sql="SELECT title FROM internships WHERE internship_Id='".$_GET['id']."'";

                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<h3>{$row['title']}</h3>";
                    }
                    ?>				      </div>
            </div>
            <div class="panel panel-info">
                <!--<div class="panel-heading">-->
                <!--							<!--Internship title-->
                <!---->
                <!--</div>-->
                <div class="panel-heading">
                    <br>
                    <!--Internship description-->
                    <?php
                    $sql="SELECT * FROM internships WHERE internship_Id='".$_GET['id']."'";
                    $sql2="SELECT * FROM users";
                    $result2 = mysqli_query($conn, $sql2);
                    $result = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_array($result2);
                    $row = mysqli_fetch_array($result);

//                    $time=date('d') ."th ". date('F  Y');
//                    while($row = mysqli_fetch_array($result))
//                    {
//                        if($row['CV']==1) {
//                            $msg = "Yes";
//                        }
//                        else {
//                            $msg = "No";
//                        }
//
//                        echo "<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
//                			<p>Open Positions: ".$row['open_Positions']."</p>
//                			"." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg";
//                    }

                    ?>
                    <center><h1>Certificate of Internship</h1></center>

                    <br>
                    <center><h4>This Certificate is awarded to:</h4></center>


                    <h2><?php  echo $_GET['fn'] . " " . $_GET['ln']?></h2>
                    <br>
                    <p>
                      in recognition of their successful performance in the <b><?php  echo $row['title']?></b> for <b><?php  echo $row['duration']?> Months</b> pharetra interdum odio a dignissim. Aliquam erat volutpat. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Maecenas quis lacus eu nulla pretium cursus non a sem.
                    </p>
                    <center><?php echo date('d') ."th ". date('F  Y'); ?></center>


                    <br>
                    <a href="index.php"><button class="btn btn-primary" type="reset" style="width: 10%;margin-left: 8%">Back</button>
                        <a href="createCertPdf.php/?id=<?php echo $_GET['id']?>&fn=<?php echo $_GET['fn']?>&ln=<?php echo $_GET['ln']?> " target="_blank" >
                        <button class="btn btn-primary" type="submit" style="width: 15%;margin-left: 40%">Download PDF</button>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
