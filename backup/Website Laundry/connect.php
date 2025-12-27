<?php
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');  
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'db_laundry');
    $mysqli = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
    OR die("could not connect");
?>