<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $firstname=$_SESSION["firstname"]; 
        $lastname=$_SESSION["lastname"];
    ?>
    <h1>Welcome to Carpooling <?php echo $firstname; ?> <?php echo $lastname; ?></h1>
</body>
</html>