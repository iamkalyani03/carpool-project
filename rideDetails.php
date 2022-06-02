<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if (isset($_SESSION['vnumber']) && isset($_SESSION['userId']))
{
    $vnumber = $_SESSION['vnumber'];
    $userId = $_SESSION['userId'];
    
    $stmt = $conn->prepare("SELECT 
                pickupCity,dropCity,
                pickupLocation,dropLocation,
                pickupDate,pickupTime,
                price,passenger,
                vehicle
                FROM ride WHERE userId=:userId");
    $stmt->bindParam(':userId', $userId);
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
            echo '<th scope="col">Pick Ln</th>';
            echo '<th scope="col">Drop Ln</th>';
            echo '<th scope="col">Date</th>';
            echo '<th scope="col">Time</th>';
            echo '<th scope="col">Price</th>';
            echo '<th scope="col">passenger</th>';
            echo '<th scope="col">vehicle</th>';
            echo '</thead>'; 
            echo '<tbody>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                echo '<th scope="row">'.$counter.'</th>';
                echo '<td>'.$row['pickupCity'].'</td>';
                echo '<td>'.$row['dropCity'].'</td>';
                echo '<td>'.$row['pickupLocation'].'</td>';
                echo '<td>'.$row['dropLocation'].'</td>';
                echo '<td>'.$row['pickupDate'].'</td>';
                echo '<td>'.date('h:i A',strtotime($row['pickupTime'])).'</td>';
                echo '<td>'.$row['price'].'</td>';
                echo '<td>'.$row['passenger'].'</td>';
                echo '<td>'.$row['vehicle'].'</td>';
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