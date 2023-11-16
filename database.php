<?php
$server = "localhost";
$username = "root";
$password = "";
$insert = false;

$con = mysqli_connect($server, $username, $password);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// $meraSql = "Create database uploadimage";
// $res = mysqli_query($con, $meraSql);

// if ($res) {
//     echo "database is created ";
// }

// $table = "
//  create table info 
//  ( id int primary key  not null auto_increment , 
//  name varchar(50), 
//  image Text(1000)

//  )
// ";

// $res = mysqli_query($con, $table);

// if ($res) {
//     echo "table is created ";
// }

