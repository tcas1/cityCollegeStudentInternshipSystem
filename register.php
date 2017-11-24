<?php
include 'dbh.php';

$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$invalidEmail = "";

//if error=empty is in the URL do this
if (strpos($url, 'error=empty')!==false){
    echo "Please fill out all fields";

}

elseif (strpos($url, 'error=email')!==false){
    echo "This email is already used. Please enter another one";
}

elseif (strpos($url, 'error=invalidemail')!==false){
    $invalidEmail = "You must register with a City College email";
}

elseif (strpos($url, 'signup=success')!==false){
    echo "Congratulations, you have successfully registered. Please enter your username and password at the top of this page to login.";
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
        Landing Page
    </title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <style>
        .error {color: #FF0000;
            font-style: italic;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <div class = "row" >
        <div class = "col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <img src="images/logo_city.png" >
        </div>
        <div class = "col-xs-6 col-sm-9 col-md-9 col-lg-9">
            <h1 class="thick-heading" style="margin-left: 30%;"> CIMS</h1>
            <h3 style="margin-left: 8%;"> Welcome to the City College Internship Management System</h3>
        </div>
    </div>
    <hr>
    <div class = "row" >
        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6" name="announced_iternships">

            <!-- Here we put announced internships-->
            <?php
            $sql="SELECT * FROM internships ORDER BY internship_Id DESC LIMIT 10";

            $result = mysqli_query($conn, $sql);


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
        </div>
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-1" style = "background-color: #dedef8;
                                                            box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444; border-radius: 10px">
            <div style = "text-align: center;">
                <h4> Register </h4>
            </div>




            <form action='includes/signup_inc.php' method='post' class="form-signin" role="form">

                <label for="inputEmail" style="display: inline-block; width: 48%; text-align: center;"> First Name:</label>
                <input name="firstName" type="text"  class="form-control" placeholder="First Name" required style="display: inline-block; width: 50%">
                <br><br>

                <label for="inputEmail" style="display: inline-block; width: 48%; text-align: center;"> Last Name:</label>
                <input name="lastName" type="text"  class="form-control" placeholder="Last Name" required style="display: inline-block; width: 50%">
                <br><br>

                <label for="inputEmail" style="display: inline-block; width: 48%; text-align: center; "> email:</label>
                <span class="error"><?php echo $invalidEmail;?></span>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus style="display: inline-block; width: 50%">


                <br><br>
                <label for="inputEmail" style="display: inline-block; width: 48%; text-align: center;"> password:</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required style="display: inline-block; width: 50%">
                <br><br>
                <div align="center">
                    <button class="btn btn-primary btn-block btn-signin" type="submit" style="width: 60%;margin-left: 8%">Sign up</button>
                    <a href="landingPage.php">login</a>
                </div>
            </form>

            <br>
        </div>
    </div>

</div>
</body>
