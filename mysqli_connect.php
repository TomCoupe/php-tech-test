<?php

$host = 'localhost';
$user = 'studentdb';
$pass = 'secret123';
$name = 'Users';
 

$dbc = @mysqli_connect($host, $user, $pass, $name, 3306)
OR die('Could not connect to MySQL: '. mysqli_connect_error());
?>