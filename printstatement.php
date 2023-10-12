<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print statements</title>
</head>
<body>
    <?php
    echo "<h1><i><b>Print statements</b></i></h1>";
    $Number = 4;

    if($Number > 0){

    echo $Number . " is Positive Number <br>";

    }else

    echo $Number . " is Negative Number <br>";
    
    if($Number %2==0){

    echo $Number . " is Even Number <br>";

    }else

    echo $Number . " is Odd Number <br>";

    ?>
</body>
</html>