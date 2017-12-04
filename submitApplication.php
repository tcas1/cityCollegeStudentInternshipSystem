<?php
session_start();

include 'dbh.php';

    $email=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $level=$_POST['level'];
    $getid=$_REQUEST['id'];
    $sql = "INSERT INTO applications (firstName,lastName,email,level, internship_Id) VALUES ('{$_SESSION['firstName']}','{$_SESSION['lastName']}','{$_SESSION['email']}','$level','$getid')";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php?submitapp=success");


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
				<form role="form">
					<input type="text" id="search" class="form-control" placeholder="search "
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
				      	<h3>Apply for this intership</h3>
				      </div>
    			</div>

				<div class="panel panel-info">
					<div class="panel-heading">
							Fill in the required information:
					</div>
					<div class="panel-heading">
						<br>
						<div id="content">
                            <form method="POST" action="submitApplication.php">
<!--				<input type="hidden" name="size" value="1000000" />-->
					<div>
						 First Name: <input placeholder="First Name" value="<?php echo "{$_SESSION['firstName']}"?>" name="firstName" type="text" readonly><br><br> <!-- Pull first name from db-->
					</div>

					<div>
						 Last Name: <input placeholder="Last Name" value="<?php echo "{$_SESSION['lastName']}"?>" name="lastName" type="text" readonly><br><br> <!-- Pull last name from db-->
					</div>

					<div>
						Email: <input placeholder="Email" value="<?php echo "{$_SESSION['email']}"?>" name="email" type="email" readonly><br><br> <!-- Pull email from db-->
					</div>

					<div>
						Level:
        						<select name="level">
                                    <option value="level1">Level 1</option>
                                    <option value="level2">Level 2</option>
                                    <option value="level3">Level 3</option>
                                    <option value="Graduate">Graduate</option>
        						</select>

					</div>
						</br>
					<div>
						<?php
                        $sql="SELECT * FROM internships WHERE internship_Id='".$_GET['id']."'";

                        $result = mysqli_query($conn, $sql);


                        while($row = mysqli_fetch_array($result))
                        {
                        if($row['CV']==1) {
                            echo "CV: <input type = 'file' name = 'CV'>";
                          }
                        else{
                            echo "No CV Required";
                            }
                        }
                        ?>
					</div>
						<br>
                            <?php echo "<a href='viewInternship.php?id=".$_GET['id']."'> <button class=\"btn btn-primary\" type=\"reset\" style=\"width: 10%;margin-left: 8%\">Back</a>";?>

						<!--<a href=""> <button class="btn btn-primary" type="submit" style="width: 10%;margin-left: 70%">Apply</button>-->
                                <button class="btn btn-primary "  type="submit" style="width: 10%;margin-left: 70%">Apply</button>
                            </form>
                        </div>
                </div>
		</div>
	</div>
</body>
</html>
