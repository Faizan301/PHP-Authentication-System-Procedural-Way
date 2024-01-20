<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "udemy";

$conn =  mysqli_connect($host, $username, $password, $dbname);

if(!$conn):
    echo "failed";
endif;    



?>