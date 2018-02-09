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
            <nav>
                <ul>
                    <li><a href="myAccount.php">My Account</a> </li>
                    <li><a href="myCurrentListings.php">My Current Internships</a> </li>
                    <li><a href="myPastListings.php">My Past Internships</a></li>
                </ul>
            </nav>
        </div>
        <div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <?php
            $sql="SELECT * FROM applications WHERE internship_Id='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($result))
                {
//                if($row['CV']==1) {
//                $msg = "Yes";
//                }
//                else {
//                $msg = "No";
//                }

                echo "<div class=\"Listing\">"."First Name: ".$row['firstName']."<p>Last Name: ".$row['lastName']."</p><br>"." email: ".$row['email']."
                    <p>Level: ".$row['level']."</p></div>";

            }
            ?>
        </div>
    </div>

</div>
</body>
</html>