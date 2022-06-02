<?php
require_once 'connect.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if (isset($_POST['ride']))
{   
    $pickupCity=$_POST['pickupCity'];
    $dropCity=$_POST['dropCity'];
    $pickupDate=$_POST['pickupDate'];
    $passenger=$_POST['passenger'];
    $stmt = $conn->prepare("SELECT pickupCity,dropCity,pickupDate,passenger
                FROM ride 
                WHERE pickupCity=:pickupCity 
                AND dropCity=:dropCity AND pickupDate=:pickupDate");
    $stmt->bindParam(':pickupCity', $pickupCity);
    $stmt->bindParam(':dropCity', $dropCity);
    $stmt->bindParam(':pickupDate', $pickupDate);
    try
    {
        //code...
        if ($stmt->execute())
        {
            $counter=1;
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Ride No</th>';
            echo '<th scope="col">Pickup City</th>';
            echo '<th scope="col">Drop City</th>';
            echo '<th scope="col">Date</th>';
            echo '<th scope="col">passenger</th>';
            echo '</thead>'; 
            echo '<tbody>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                echo '<th scope="row">'.$counter.'</th>';
                echo '<td>'.$row['pickupCity'].'</td>';
                echo '<td>'.$row['dropCity'].'</td>';
                echo '<td>'.$row['pickupDate'].'</td>';
                echo '<td>'.$row['passenger'].'</td>';
                echo '</tr>';
                $counter=$counter+1;
            }
            echo '</tbody>';

        }
    }
    catch(PDOException $e)
    {
        $err = "Vehicle Data Failed";
        echo $e->getMessage();
    }
}
?>