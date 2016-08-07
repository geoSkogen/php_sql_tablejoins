<?php
DEFINE ('DB_USER', 'birdUser');
DEFINE ('DB_PASSWORD', 'passbird');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'birdsdb');

$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
         OR die ('connection error: ' . mysqli_conncect_error() );
mysqli_set_charset($dbcon, 'utf-8');
?>
