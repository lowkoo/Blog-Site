<?php

$database = 'mysql:host=localhost;dbname=search';
$username = 'root';
$password = '';

try{
    $connection = new PDO($database, $username, $password);
//  echo 'connected';
}
catch(PD0Exception $error){
    $errormessage = $error->getmessage();
    echo $errormessage;
}

$servername = 'localhost';
$user = 'root';
$pass = '';
$base = 'search';

$conn = mysqli_connect($servername, $user, $pass, $base);

if($conn){
    // echo 'connected';
}
else{
    die('terminate');
}