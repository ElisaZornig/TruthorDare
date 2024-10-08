<?php
$host       = "localhost";
$database   = "truth_or_dare";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());

?>