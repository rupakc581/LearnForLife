<?php
$host="localhost";
$user="root";
$password="";
$database="assign";

$connect=mysqli_connect($host,$user,$password) or die ("Could not connect");
mysqli_select_db($connect,"assign");



?>