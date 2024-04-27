<?php

$host = "localhost";
$username = "root";
$password="";
$database="crime-reporting-system";


$conn = new mysqli($host,$username,$password,$database);

if($conn->connect_error){
    die("connetion failed " . $conn->connect_error);
}


$name = $_POST['name'];
$number = $_POST['number'];
$description = $_POST['description'];
$date = $_POST['date'];


$sql = "INSERT INTO reports (name,number,description,date VALUES ('$name, $number, $description, $date)";

if($conn->query($sql)==TRUE){
    echo "Submitted";
}
else{
    echo "Not submitted";
}