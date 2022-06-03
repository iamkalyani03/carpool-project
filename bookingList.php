<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php'?>
<?php
require_once 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_SESSION['userId'])){
    $rideUserId = $_SESSION['userId'];
}
if (isset($_POST['booking']))
{   
    $pickupCity=$_POST['pickupCity'];
    $dropCity=$_POST['dropCity'];
    $pickupDate=$_POST['pickupDate'];
    $passenger=$_POST['passenger'];
    $stmt = $conn->prepare("SELECT 
    u.userId,u.firstname,u.lastname,
    v.vnumber,v.vname,
    r.rideId,r.userId,r.pickupCity,
    r.dropCity,r.pickupDate,
    r.pickupLocation,r.dropLocation,
    r.pickupDate,r.pickupTime,
    r.passenger,r.price
                FROM ride r
                INNER JOIN user u ON u.userId=r.userId
                INNER JOIN vehicle v ON v.vnumber=r.vehicle
                WHERE pickupCity=:pickupCity 
                AND dropCity=:dropCity AND pickupDate=:pickupDate AND r.userId!=:rideUserId");
    $stmt->bindParam(':pickupCity', $pickupCity);
    $stmt->bindParam(':dropCity', $dropCity);
    $stmt->bindParam(':pickupDate', $pickupDate);
    $stmt->bindParam(':rideUserId', $rideUserId);
    try
    {
        //code...
        $result = array();
        if ($stmt->execute())
        {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $result[]=$row;
            }
            $_SESSION['bookingList']=$result;
        }
    }
    catch(PDOException $e)
    {
        $err = "Vehicle Data Failed";
        echo $e->getMessage();
    }
}
?>

<body>
    <?php include 'navbar.php';?>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']=="booking")
        {
    ?>
    <script>
    swal({
        title: "Booking Confirmed",
        text: "Happy Journey",
        icon: "success",
    });
    </script>
    <?php
         unset($_SESSION['status']);
        }
    ?>
    <div class="wrapper">
        <div class="col-md-10 offset-md-1 align-self-center">
            <?php require 'booking.php'?>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>