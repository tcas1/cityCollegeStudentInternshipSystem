<?php
/**
 * Created by PhpStorm.
 * User: scass
 * Date: 12/25/2017
 * Time: 6:05 PM
 */
session_start();

include 'dbh.php';

if(isset($_POST['repost'])){

    $title=$_POST['title'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration=$_POST['duration'];
    $CV = $_POST['CV'];
    $date = $_POST['date'];
    $open_Positions=$_POST['open_Positions'];

    $internship_Level = $_POST['internship_Level'];
    $chk="";
    foreach($internship_Level as $chk1)
    {
        $chk .= $chk1.",";
    }


    $sql = "INSERT INTO internships (poster_Id,title, description, internship_Level,CV,
                duration, open_Positions, date ) ". "VALUES( '{$_SESSION['id']}','$title', '$description', '$chk','$CV' ,'$duration', '$open_Positions',  '$date' )";
    $result = mysqli_query($conn, $sql);


    if(!$result )
    {
        printf("Errormessage: %s\n", mysqli_error($conn));    }
    else
    {
        header("Location:myCurrentListings.php?internupdate=success");
    }

}

$sql="SELECT * FROM internships WHERE internship_Id='".$_GET['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<html>

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
            <form role="form">
                <input type="text" id="search" class="form-control" placeholder="search "
                       style="display: inline-block; width: 80%;border-radius:20px">
            </form>
        </div>
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
                    <form method="post"  enctype="multipart/form-data">
                        <table width = "400" border = "0" cellspacing = "1"
                               cellpadding = "2">

                            <tr>
                                <td width = "100">Title</td>
                                <td><input name = "title" type = "text"
                                           id = "title" value="<?php echo "{$row['title']}"?>" required></td>
                            </tr>

                            <tr>
                                <td width = "100">Description</td>
                                <td><textarea name = "description" type = "text"
                                              id = "description"  required> <?php echo "{$row['description']}"?></textarea></td>
                            </tr>

                            <tr>
                                <td width = "100"></td>
                                <td>
                                    Internship Level <br>
                                    <input type="checkbox" name="internship_Level[]" value="Level 1 Year 1" <?php if(strpos($row['internship_Level'],'Year 1')) echo 'checked="checked"'; ?>> BSc Level 1 Year 1 (4 year program)<br>
                                    <input type="checkbox" name="internship_Level[]" value="Level 1 Year 2" <?php if(strpos($row['internship_Level'],'Year 2')) echo 'checked="checked"'; ?>> BSc Level 1 Year 2 (4 year program)<br>
                                    <input type="checkbox" name="internship_Level[]" value="Level 1" <?php if(strpos($row['internship_Level'],'Level 1')) echo 'checked="checked"'; ?>>Level 1<br>
                                    <input type="checkbox" name="internship_Level[]" value="Level 2" <?php if(strpos($row['internship_Level'],'Level 2')) echo 'checked="checked"'; ?>>Level 2<br>
                                    <input type="checkbox" name="internship_Level[]" value="Level 3" <?php if(strpos($row['internship_Level'],'Level 3')) echo 'checked="checked"'; ?>>Level 3<br>
                                    <input type="checkbox" name="internship_Level[]" value="Graduate" <?php if(strpos($row['internship_Level'],'Graduate')) echo 'checked="checked"'; ?>>Graduate<br> <br> </td>

                            </tr>
                            <tr>
                                <td width = "100"></td>
                                <td>

                                    Student Commitment in Months: <select name="duration">
                                        <option  <?php if ($row['duration']==4) { echo "SELECTED"; } ?> value="4months">4 Months</option>
                                        <option  <?php if ($row['duration']==8) { echo "SELECTED"; } ?> value="8months">8 Months</option>
                                        <option  <?php if ($row['duration']==12) { echo "SELECTED"; } ?> value="12months">12 Months</option>
                                    </select> <br>
                            </tr>
                            <tr>
                                <td width = "100"></td>
                                <td>
                                    Open Positions for Student <br>
                                    <input type="number" name="open_Positions" min="1" id="open_Positions" value="<?php echo "{$row['open_Positions']}"?>" required> <br>
                            </tr>
                            <tr>
                                <td width = "100"></td>
                                <td>


<!--                            <tr>-->
<!--                                <td width = "100"></td>-->
<!--                                <td>-->
<!--                                    Expiration Date <br>-->
<!--                                    <input type="datetime-local" name="datetime" id="datetime" value="--><?php //echo $row['datetime']?><!--" required> <br>-->
<!--                            </tr>-->

                            <tr>
                                <td width = "100"></td>
                                <td>
                                    Expiration Date <br>
                                    <input type="date" name="date" id="date" value="<?php echo $row['date']?>" required> <br>
                            </tr>

                            <tr>
                                <td width = "100"> </td>
                                <td> </td>
                            </tr>

                            <tr>
                                <td width = "100"></td>
                                <td>
                                    CV Required <br>
                                    <input type="radio" name="CV" <?php if($row['CV']==1) {echo "checked";}?> value="1"> Yes<br>
                                    <input type="radio" name="CV" <?php if($row['CV']==0) {echo "checked";}?> value="0"> No <br>
                            </tr>

                            <tr>
                                <td width = "100"> </td>
                                <td>
                                    <input name = "repost" type = "submit" id = "repost"
                                           value = "Reupload Internship">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
