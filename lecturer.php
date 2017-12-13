<?php
session_start();

include 'dbh.php';

?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
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
					<a href="lecturer.php"><button class="btn-primary btn-lg"> Home</button></a>
					<a href="myAccount.php"><button class="btn-primary btn-lg"> Account</button></a>
					<a href="includes/logout_inc.php"><button class="btn-primary btn-lg"> Log Out</button></a>
				</ul>
			</div>
		</div>
		<hr>
		<div class = "row">
			<div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 " style="border-right: solid; border-right-width: 2px; height: 1200px">


						<nav class="nav-sidebar">
							<ul class="nav">
								<li><a href="myCurrentListings.php">My Current Internships</a></li>
								<li><a href="myPastListings.php">My Archived Internships</a></li>
								<li><a href="generatecertificate.html">Generate Certificates</a></li>
								<li class="nav-divider"></li>
							</ul>
						</nav>

				</div>




		<div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
		
		<?php
		$sql="SELECT * FROM internships";
 		$result = mysqli_query($conn, $sql);
           
		    while($row = mysqli_fetch_array($result))
            {
                if($row['CV']==1) {
                    $msg = "Yes";
                }
                else {
                    $msg = "No";
                }

                echo "<div class=\"panel-info\"><div class=\"panel-heading\"><h3>{$row['title']}</h3></div><div class=\"panel-body\"><p>Description: ".$row['description']."</p><br>"."Level: ".$row['internship_Level']."<p>Open Positions: ".$row['open_Positions']."</p>"." Deadline: ".$row['datetime']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg <a href='viewInternship.php?id=".$row['internship_Id']."'>View Job</a> </div></div>";
				}
?>
				<div class="panel panel-info">
				      <div class="panel-heading">
				      	<h3>Create Internship...</h3>
				      	<a href="createinternship.html"><button class="btn btn-primary" type="submit" style="width: 15%;margin-left: 80%">CREATE</button></a>
				      </div>
    			</div>

				<div class="panel panel-info">
					<div class="panel-heading">
					
					</div>
					<div class="panel-body">
						<br>
						<br>
						<button class="btn btn-primary" type="submit" style="width: 15%;margin-left: 80%">VIEW</button>
					</div>
				</div>


		</div>
		</div>
	</div>
</body>
</html>