<?php
$error="Something Went Wrong!";
require_once 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['vid']) && isset($_SESSION['userId'])){
    $userId=$_SESSION['userId'];
    echo "userdId->$userId";
    $stmt=$conn->prepare("select vid,vname,vnumber from vehicle where userId=:userId");
    $stmt->bindParam(':userId',$userId);
    try {
        //code...
        if($stmt->execute())
        {
            $rows=$stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($rows['vid'])){
                $_SESSION["vid"]=$rows['vid'];
                $_SESSION["vname"]=$rows['vname'];
                $_SESSION["vnumber"]=$rows['vnumber'];
            }
            $vid=$_SESSION["vid"];
            echo "vId->$vid";
            
        }
    } catch (PDOException $e) {
        $err="Vehicle Data Failed";
    }    
}
?>

<?php require_once 'header.php'?>
<?php include 'navbar.php';?>

<body>
    <style>
    .accordion-button:not(.collapsed):after {
        background-image: none;
    }
    </style>
    <div class="container">
        <div class="row my-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <!-- Personal Details -->
                <div class="accordion-item">
                    <div class="align-items-center">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Personal Details
                            </button>
                        </h2>
                    </div>
                    <div class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">First Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php
                                                if(isset($_SESSION['firstname'])){
                                                    echo $_SESSION['firstname'];
                                                }
                                                else {
                                                    echo $error;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Last Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php
                                                if(isset($_SESSION['lastname'])){
                                                    echo $_SESSION['lastname'];
                                                }
                                                else {
                                                    echo $error;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php
                                                if(isset($_SESSION['email'])){
                                                    echo $_SESSION['email'];
                                                }
                                                else {
                                                    echo $error;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php
                                                if(isset($_SESSION['mobile'])){
                                                    $mobile=$_SESSION['mobile'];
                                                    echo "+91$mobile";
                                                }
                                                else {
                                                    echo $error;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Vehicle Details -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Vehicle Details
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <?php
                            if(isset($_SESSION['vid'])){
                                require_once 'vehicleDetails.php';                            
                            } else {
                                require_once 'vehicle.php';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseThree">
                            Ride History
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse show" aria-labelledby="headingThree">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'?>