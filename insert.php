      <?php
      session_start();

         if(isset($_POST['add'])) {

            $conn = mysqli_connect("localhost", "root", "", "simsdb");

            if(! $conn ) {
               die('Could not connect: ' . mysqli_error());
            }

			$title = $_POST['title'];
			$description = $_POST['description'];
            $duration = $_POST['duration'];
			$open_Positions = $_POST['open_Positions'];
			$CV = $_POST['CV'];
			$datetime = $_POST['datetime'];

			//checkboxes such as multiple check list require the folowing function to work
			$internship_Level = $_POST['internship_Level'];
			$chk="";
			foreach($internship_Level as $chk1)
			   {
			      $chk .= $chk1.",";
			   }

            $sql = "INSERT INTO internships (poster_Id,title, description, internship_Level,CV,
                duration, open_Positions, datetime ) ". "VALUES( '{$_SESSION['id']}','$title', '$description', '$chk','$CV' ,'$duration', '$open_Positions', '$datetime' )";

            mysqli_select_db($conn, 'simsdb');
            $retval = mysqli_query( $conn,  $sql );

            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }

             header("Location:index.php?internupload=success");

            mysqli_close($conn);
         }