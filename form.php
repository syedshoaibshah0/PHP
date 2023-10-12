<?php
$server="localhost";
$username="root";
$pass="";
$database="center";
$insert = false;
$con = mysqli_connect($server, $username, $pass, $database);



    if (!$con){
        die("Connection failed: " . mysqli_connect_error());}



        if(isset($_POST["un"])){
            $firstnamevalue= $_POST["un"];
            $lastnamevalue= $_POST["ln"];
            $dobvalue= $_POST["d"];
            $emailIDvalue= $_POST["em"];
            $mobilenumbervalue= $_POST["m"];
            $gendervalue= $_POST["gender"];
            $addressvalue= $_POST["a"];
            $cityvalue= $_POST["c"];
            $pincodevalue= $_POST["p"];
            $statevalue= $_POST["s"];
            $countryvalue= $_POST["co"];
            $hobbiesvalue= $_POST["h"];
            
            $coursesvalue= $_POST["c"];


             $sql = "INSERT INTO SINFO (FirstName, LastName, DateOfBirth, Email, MobileNumber, Gender, Address, City, PINCODE, STATE, Country, Hobbies, Courses ) VALUES ('$firstnamevalue', '$lastnamevalue', '$dobvalue', '$emailIDvalue', '$mobilenumbervalue', '$gendervalue', '$addressvalue', '$cityvalue', '$pincodevalue', '$statevalue', '$countryvalue', '$hobbiesvalue', '$coursesvalue' )";

             $res= mysqli_query($con, $sql);

    
             if ($res) {

                echo "(<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>submit</strong> no submit.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>)";
                $insert = true;
                }
                }
                ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  


    <b><i><u>Student Registration Form</u></i></b> <br>
        <form action="" method="post">
    <label for="un">First Name</label>
    <input type="text" Name="un" id="un">
    <br>

    <label for="ln">Last Name</label>
    <input type="text" Name="ln" id="ln">
    <br>

    <label for="d">Date</label>
    <input type="date" name="d" id="d">
    <br>

    <label for="em">Email</label>
    <input type="email" name="em" id="em">
    <br>

    <label for="m">Mobile Number</label>
    <input type="mobile number" name="m" id="m">
    <br>

    <label for="g">Gender</label>
       male  <input type="radio" name="gender" >
       female  <input type="radio" name="gender" >
       <br>
     
       <label for="a">Address</label>
       <textarea name="a" id="" cols="30" rows="10"></textarea>
       <br>
     
       <label for="c">City</label>
       <input type="text" name="c" id="c">
       <br>
     
       <label for="p">Pin Code</label>
       <input type="text" name="p" id="p">
       <br>
     
       <label for="s">State</label>
       <input type="text" name="s" id="s">
       <br>
     
       <label for="co">Country</label>
       <select name="co" id="co">
       <option value="">Pakistan</option>
       <option value="">India</option>
       <option value="">UK</option>
       </select>
       <br>

    <label for="h">Hobbies</label>
       
       
        Drawing <input type="checkbox" name="Drawing" id="">
        Singing <input type="checkbox" name="Singing" id="">
        Dancing <input type="checkbox" name="d" id="">
        Sketching <input type="checkbox" name="s" id="">
        Others <input type="checkbox" name="o" id="">
        <input type="text" name="h" id="">
       <br>
       
       
       
      
    
    
        <label for="C">COURSES APPLIED FOR</label>
        
        
        BCA<input type="checkbox" name="Drawing" id="">
        B.COM <input type="checkbox" name="Singing" id="">
        B.SC <input type="checkbox" name="d" id="">
    B.A <input type="checkbox" name="s" id="">
    
            <br>
        
             submit<input type="submit" value="">
            reset<input type="reset" value="">  
        
             </form>
    
    
        
        
        
        
        
        
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      </body>
</html> 