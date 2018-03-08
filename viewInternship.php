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
                $sql = "SELECT * FROM internships WHERE isarchived=0 AND title LIKE '%$search%' OR description LIKE '%$search%' OR internship_Level LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                //$row = mysqli_fetch_array($result);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results / $results_per_page);
                header('Location:index.php?search='.$search);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $this_page_first_result = ($page - 1) * $results_per_page;
                $sql = "SELECT * FROM internships WHERE isarchived=0 AND title LIKE '%$search%' OR description LIKE '%$search%' OR internship_Level LIKE '%$search%' LIMIT $this_page_first_result ,  $results_per_page";
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


			<div class = "col-xs-3 col-sm-3 col-md-5 col-lg-3" style="width: auto">
				<br><br><br>
				<ul class = "nav navbar-nav">
                    <a href="index.php" class="btn-primary btn-lg"> Home</a>
                    <a href="myAccount.php" class="btn-primary btn-lg"> Account</a>
                    <a href="includes/logout_inc.php" class="btn-primary btn-lg"> Log Out</a>
				</ul>
			</div>
		</div>
		<div class = "row" style="border: solid">

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

            				while($row = mysqli_fetch_array($result))
            					{
                				if($row['CV']==1) {
                   				 $msg = "Yes";
               					 }
               				 else {
                    			$msg = "No";
                				}

               				 echo "<p>Description: ".$row['description']."</p><br>"." Level: ".$row['internship_Level']."
                			<p>Open Positions: ".$row['open_Positions']."</p>
                			"." Deadline: ".$row['date']."<br><p> Duration: ".$row['duration']." Months</p>"."CV Required: $msg";
            				}

            				?>
						<br>

                        <ul class = "nav navbar-nav" style="margin-left: 300px; float:none;">

                            <?php
                            $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                            if (strpos($url, 'redirect=myCurrentListings')!==false){
                                echo "<a href=\"myCurrentListings.php\" class=\"btn-primary btn-lg\" type=\"reset\">Back</a>";
                            }

                            elseif (strpos($url, 'redirect=myPastListings')!==false){
                                echo "<a href=\"myPastListings.php\" class=\"btn-primary btn-lg\" type=\"reset\">Back</a>";
                            }

                            else{
                                echo "<a href=\"index.php\" class=\"btn-primary btn-lg\" type=\"reset\">Back</a>";

                            }

                            ?>

                            <a href="createPdf.php/?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn-primary btn-lg" type="submit" >Download PDF</a>
                            <?php
                            if(isset($_SESSION['student'])) {
                                $sql="SELECT * FROM applications WHERE applicant_id='{$_SESSION['id']}' AND internship_Id='".$_GET['id']."'";

                                $result = mysqli_query($conn, $sql);

                                $appcheck=mysqli_num_rows($result);

                                if($appcheck>0){
                                    echo "";
                                    exit();
                                }
                                else{
                                    echo "<a href='submitApplication.php?id=" . $_GET['id'] . "'> <button class=\"btn btn-primary\" type=\"submit\" style=\"width: 10%;margin-left: 8%\">Apply</a>";
                                }
                                //echo "<a href='submitApplication.php?id=" . $_GET['id'] . "'> <button class=\"btn btn-primary\" type=\"submit\" style=\"width: 10%;margin-left: 8%\">Apply</a>";
                            }
                            ?>
                        </ul>
					</div>

				</div>
		</div>
		</div>
	</div>
</body>
</html>