<?php

session_start();
session_destroy();

//redirect to this page
header("Location: ../landingPage.php");
//THEO