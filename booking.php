<?php
require_once 'connect.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_SESSION['userId'])){
    $rideUserId = $_SESSION['userId'];
}

$err=null;
if(isset($_POST['book'])){
    $passenger=$_POST["passenger"];
    $price=$_POST["price"];
    $pickupUserId=$_POST['pickupUserId'];
    $rideId=$_POST['rideId'];

    if(empty($passenger) || empty($price) || empty($rideUserId) || empty($pickupUserId))
    {
        $err="Some Feilds are required<br>";
    } else {  
        if(empty($err))
        {
            $totalPrice = (int)$price * $passenger;
            $stmt=$conn->prepare("INSERT INTO booking(rideId,pickupUserId,rideUserId,passenger,totalPrice)VALUES(:rideId,:pickupUserId,:rideUserId,:passenger,:totalPrice)");
            $stmt->bindParam(':rideId',$rideId);
            $stmt->bindParam(':pickupUserId',$pickupUserId);
            $stmt->bindParam(':rideUserId',$rideUserId);
            $stmt->bindParam(':passenger',$passenger);
            $stmt->bindParam(':totalPrice',$totalPrice);
            try {
                $stmt->execute();
                $_SESSION['status']="booking";
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    $err="Booking Details Already Exist";
                }
                echo $e->getMessage();
            }             
        }
    }
}
if(isset($_SESSION['bookingList'])){
    $temp=$_SESSION['bookingList'];
    if(isset($_SESSION['userId'])){
        $bookingButton = ' <input type="submit" name="book" value="Book" class="btn btn-primary btn-block">';
    }
    else{
        $bookingButton = ' <input type="submit" disabled name="book" value="Please Login" class="btn btn-primary btn-block">';;
    }
    foreach($temp as $row){
        echo '<div class="card my-3">
        <form action="bookingList.php" method="post">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex flex-row align-items-center col-sm-3">
                        <div>
                            <img src="https://img.icons8.com/fluency/48/undefined/carpool.png"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 50px;">
                        </div>
                        <div class="ms-3">
                            <h5>'.$row['firstname'].' '.$row['lastname'].'</h5>
                            <p class="small mb-0">'.$row['vnumber'].'</p>
                            <p class="small mb-0">'.$row['vname'].'</p>
                            <input type="hidden" name="pickupUserId" value="'.$row['userId'].'">
                            <input type="hidden" name="rideId" value="'.$row['rideId'].'">
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-2">
                        <div>
                            <h5>'.$row['pickupCity'].'</h5>
                            <p class="small mb-0">'.$row['pickupLocation'].'</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-2">
                        <div class="ms-3">
                            <h5>'.$row['dropCity'].'</h5>
                            <p class="small mb-0">'.$row['dropLocation'].'</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-1">
                        <div>
                            <h5>'.date('h:i A',strtotime($row['pickupTime'])).'</h5>
                            <p class="small mb-0">'.$row['pickupDate'].'</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-1">
                        <div>
                            <img src="https://img.icons8.com/fluency-systems-regular/48/undefined/user-secured.png"
                                class="img-fluid" alt="Shopping item" style="width: 25px;">
        
                        </div>
                        <div>
                            <input type="number" name="passenger" placeholder="No. Of Passengers"
                                class="search-form form-control" value="'.$row['passenger'].'" style="width:70px" />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-1">
                        <div>
                            <img src="https://img.icons8.com/ultraviolet/40/undefined/rupee.png" class="img-fluid"
                                alt="Shopping item" style="width: 25px;">
        
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0">'.$row['price'].'/-</h5>
                            <input type="hidden" name="price" value="'.$row['price'].'">
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center col-sm-2 ">
                        <div class="ms-3">
                           '.$bookingButton.'
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>';
    }
}
?>
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