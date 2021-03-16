<?php

//database variables
$host = 'localhost';
$user = 'local';
$pass = '87654321';
$dbname = 'local';

//connect to the mysql database
$mysql = mysqli_connect($host, $user, $pass);
$db = mysqli_select_db($mysql, $dbname);
mysqli_set_charset($mysql, 'utf8');