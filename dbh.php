<?php

/*the database being connected to*/
$conn=mysqli_connect("localhost","root","","simsdb");
if(!$conn){
    echo("Connection failed");
}