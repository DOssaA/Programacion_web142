<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";

	//$cxn = mysqli_connect($host,$user,$pass,$dbname) or die("Error conectandose con la base de datos: ");
	$cxn = mysqli_connect($host,$user,$pass) or die("Error conectandose con la base de datos: ");
	//echo "base de datos conectada";

?>