<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "FORM";

$insert = false;

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("connection failed " . mysqli_connect_error());
}

// $meraSql = "Create database FORM";
// $res = mysqli_query($con, $meraSql);

// if ($res) {
//     echo "database is created ";
// }


// $table = "
//  create table S_S_info 
//  ( id int primary key  not null auto_increment , 
//  name varchar(50), 
//  email varchar(50),
//  contact varchar(50)
//  )
// ";

// $res = mysqli_query($con, $table);

// if ($res) {
//     echo "table is created ";
// }




if (isset($_POST["name"])) {
    $namevalue = $_POST["name"];
    $emailvalue = $_POST["email"];
    $contactvalue = $_POST["contact"];

    $sql = "INSERT INTO S_S_info(name, email, contact) VALUES ('$namevalue', '$emailvalue', '$contactvalue')";

    $res =  mysqli_query($con, $sql);

    if ($res) {
        $insert = true;
    } else {
        echo "failed";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Form</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Submit successfully</strong> no submit.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
    ?>

    <div class="container">
        <form method="post" action="app2.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contact</label>
            <input type="text" class="form-control" name="contact" id="exampleInputPassword1">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit">add</button>
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>

    <div class="container">
        <h1>Table Data</h1>
        <table id="mytable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">contact</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $showsql = "SELECT * FROM S_S_info";
                $result = mysqli_query($con, $showsql);
                $totalcount = mysqli_num_rows($result);

                if ($totalcount > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["contact"] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
    
    </body>
</html>
