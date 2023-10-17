<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password, "SssJ");

if (!$con) {
    die("connection failed " . mysqli_connect_error());
} else {
    echo "database is success";
}


// $meraSql = "Create database SssJ";
// $res = mysqli_query($con, $meraSql);

// if ($res) {
//     echo "database is created ";
// }


// $table = "
//  create table S_S_info 
//  ( id int primary key  not null auto_increment , 
//  name varchar(50), 
//  email varchar(50),
//  pass varchar(50)
//  )
// ";

// $res = mysqli_query($con, $table);

// if ($res) {
//     echo "table is created ";
// }


$name = "Shoaib";
$email = "s@gmail.com";
$pass = "123abc";
$insert = "insert into S_S_info  (name, email, pass) values('$name', '$email', '$pass')";
$res = mysqli_query($con, $insert);

if ($res) {
    echo "code inserted";
}


$sql = "Select * from S_S_info ";
$res = mysqli_query($con, $sql);

$mytotalrows = mysqli_num_rows($res);
echo "my total rows = " . $mytotalrows . "<br>";


$row = mysqli_fetch_assoc($res);
echo "<br> this is my row  " . var_dump($row);

$row = mysqli_fetch_assoc($res);
echo "<br> this is my row  " . var_dump($row);

if ($mytotalrows > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "Name = " . $row["name"] . "<br>";
        echo "email = " . $row["email"] . "<br>";
        echo "pass = " . $row["pass"] . "<br>";
    }
}
?>