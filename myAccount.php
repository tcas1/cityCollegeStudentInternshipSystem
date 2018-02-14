<?php

session_start();

include 'dbh.php';

if(isset($_POST['update']) && isset($_SESSION['student'])){

    $email=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $level=$_POST['level'];


    $sql= "UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email',level='$level' WHERE Id='{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);

    if(!$result )
    {
        echo "Could not update data:";
    }
    else
    {
        echo "Updated data successfully\n";
    }

}
elseif(isset($_POST['update']) && isset($_SESSION['lecturer'])){

    $email=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];


    $sql= "UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email' WHERE Id='{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);

    if(!$result )
    {
        echo "Could not update data:";
    }
    else
    {
        echo "Updated data successfully\n";
    }

}

$sql="SELECT * FROM users WHERE Id='{$_SESSION['id']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
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
            <!--Internships-->
            <?php echo "<h1> {$row['firstName']} {$row['lastName']}'s Account</h1>"; ?>
            <br><br>
            <form method="POST" action="myAccount.php">
                First Name: <input placeholder="First Name" value="<?php echo "{$row['firstName']}"?>" name="firstName" type="text" required><br><br>
                Last Name:  <input placeholder="Last Name" value="<?php echo "{$row['lastName']}"?>" name="lastName" type="text" required><br><br>
                Email:      <input placeholder="Email" value="<?php echo "{$row['email']}"?>" name="email" type="email" required><br><br>
                <?php
//                $sql2="SELECT * FROM users";
//                $result2 = mysqli_query($conn, $sql2);
//                $row2 = mysqli_fetch_array($result2);
                if(isset($_SESSION['student'])) {

                    echo "Level: <select name=\"level\" required>\n";
                    echo "<option value=\"Level 1\">Level 1</option>\n";
                    echo "<option value=\"Level 2\">Level 2</option>\n";
                    echo "<option value=\"Level 3\">Level 3</option>\n";
                    echo "<option value=\"Graduate\">Graduate</option>\n";
                    echo " </select>";
                }
                ?>
                <br>
                <button type="submit" name="update">Update Info</button>
            </form>
        </div>
    </div>

</div>

<br><br>

</body>
</html>