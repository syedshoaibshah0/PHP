<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leap year</title>
</head>
<body>

    
    <?php

        echo "<h1>Leap Year</h1>";
        $Year = 2004;
        if($Year %4==0) {
        echo $Year . " is Leap Year <br>";
        } else 
        echo $Year . " is not a Leap Year <br>";
    ?>
</body>
</html>