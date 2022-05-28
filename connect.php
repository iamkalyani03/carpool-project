<?php 
$servername=!empty(getenv("MYSQL_HOST"))? getenv("MYSQL_HOST") : "127.0.0.1";
$username=!empty(getenv("MYSQL_USERNAME"))? getenv("MYSQL_USERNAME") : "root";
$password=!empty(getenv("MYSQL_PASSWORD"))? getenv("MYSQL_PASSWORD"):"";
$db_name=!empty(getenv("MYSQL_DB"))?getenv("MYSQL_DB"):"carpool";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>