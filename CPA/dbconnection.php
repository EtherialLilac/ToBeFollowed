<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "petadoption";


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error)
{
    die('connection failed :'.$conn->connect_error );
}



?>