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

                <script type="text/javascript"> function submitSearch() {document.forms[search].submit();}</script>

                <form id="search" role="form" action="" method="GET">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search"
                           style="display: inline-block; width: 80%;border-radius:20px">
                    <a href="javascript: submitSearch()"></a>
                </form>

            </div>
            <?php
            if(isset($_GET['search'])) {
                $results_per_page = 8;
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $sql = "SELECT * FROM internships WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR internship_Level LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                //$row = mysqli_fetch_array($result);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results / $results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $this_page_first_result = ($page - 1) * $results_per_page;
                $sql = "SELECT * FROM internships WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR internship_Level LIKE '%$search%' LIMIT $this_page_first_result ,  $results_per_page";
                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) <= 0) {
                    echo "No search results found";
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['CV'] == 1) {
                            $msg = "Yes";
                        } else {
                            $msg = "No";
                        }
                        echo "<div class=\"Listing\">" . "<h4 style='margin-bottom: 5px;'><a href='viewInternship.php?id=" . $row['internship_Id'] . "'>" . $row['title'] . "</h4></a><br>" . " Level: " . $row['internship_Level'] . "
            <p>Deadline: " . $row['date'] . "</p><br><p>CV Required: $msg </p></div>";

                    };
                    echo "<center><div> Page: ";
                    for ($page = 1; $page <= $number_of_pages; $page++) {
                        echo '<a href="index.php?search=' . $search . '&page=' . $page . '">' . $page . '</a> ';
                    }
                    echo "</div></center>";
                }
            }


            ?>
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
		<div class = "row" style="border: solid">

		<div class = "col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="panel panel-info">
				      <div class="panel-heading">
				      	<h3>Apply for this intership</h3>
				      </div>
    			</div>

				<div class="panel panel-info">

                    <?php
                    if(isset($_POST['Submit'])) {
                        $level = $_POST['level'];
                        $getid = $_REQUEST['id'];
                        $filename = $_FILES["CV"]["name"];
                        $tmp_name = $_FILES["CV"]["tmp_name"];
                        //$filepath-="cvs/$filename";


                        if(sizeof($_FILES) > 0) {
                            $extension = pathinfo($filename, PATHINFO_EXTENSION);
                            if ($extension !== 'pdf' && $extension !== 'doc' && $extension !== 'docx') {
                                echo 'Please select one of the supported filetypes';
                                die();
                            }
                            $target_dir = "cvs/";
                            $target_file = $target_dir . $filename;
                            move_uploaded_file($tmp_name, $target_file);
                        }

                        $sql = "INSERT INTO applications (firstName,lastName,email,level, internship_Id, applicant_id, cv) VALUES ('{$_SESSION['firstName']}','{$_SESSION['lastName']}','{$_SESSION['email']}','$level','$getid' , {$_SESSION['id']}, '$filename')";
                        $result = mysqli_query($conn, $sql);
                        header("Location: index.php?submitapp=success");
                    }
                    ?>
					<div class="panel-heading">
							Fill in the required information:
					</div>
					<div class="panel-heading">
						<br>
						<div id="content">

                            <form role="form" method="POST" enctype="multipart/form-data" action="">
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
                                    <option value="Level 1">Level 1</option>
                                    <option value="Level 2">Level 2</option>
                                    <option value="Level 3">Level 3</option>
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
                            echo "CV: <input type = 'file' accept=  '.pdf,.doc,.docx' value='CV' id='CV' name = 'CV'>";
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
                                <button class="btn btn-primary " name="Submit" type="submit" style="width: 10%;margin-left: 70%">Apply</button>
                            </form>
                        </div>
                </div>
		</div>
	</div>
</body>
</html>

