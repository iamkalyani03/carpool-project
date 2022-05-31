<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php'?>

<?php
    $err=null;
    $pickupCityErr=null;
    $dropCityErr=null;
    $pickupLocationErr=null;
    $dropLocationErr=null;
    $pickupDateErr=null;
    $pickupTimeErr=null;
    $priceErr=null;
    $passengerErr=null;
    $vehicleErr=null;
  
    require_once 'connect.php';
    if(!isset($_SESSION)) {
        session_start();
    }

	if(isset($_POST['publish']))
    {
        $pickupCity=$_POST['pickupCity'];
        echo $pickupCity;
        $dropCity=$_POST['dropCity'];
        $pickupLocation=$_POST['pickupLocation'];
        $dropLocation=$_POST['dropLocation'];
        $pickupDate=date("Y-m-d",strtotime($_POST['pickupDate']));
        echo $pickupDate;
        $pickupTime=strtotime($_POST['pickupTime']);
        echo $pickupTime;
        $price=$_POST['price'];
        $passenger=$_POST['passenger'];
        $vehicle=$_POST['vehicle'];
        if(empty($pickupCity) || empty($dropCity) || empty($pickupLocation) ||empty($dropLocation) || empty($pickupDate) || empty($pickupTime) || empty($price) || empty($passenger) || empty($vehicle))
        {
            $err="Some Feilds are required<br>";
        } else {  
            if (!preg_match("/^[a-zA-Z]*$/",$pickupCity)){
                $pickupCityErr = "Only letters are allowed<br>";
            }
            if(!preg_match("/^[a-zA-Z]*$/",$dropCity)){
                $dropCityErr = "Only letters are allowed<br>";
            }
            if(!preg_match("/^[a-zA-Z]*$/",$pickupLocation)){
                $pickupLocationErr = "Only letters are allowed<br>";
            }
            if(!preg_match("/^[a-zA-Z]*$/",$dropLocation)){
                $dropLocationErr = "Only letters are allowed<br>";
            }
            if(empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) &&empty($err) && empty($passwordErr) && empty($mobileErr))
            {
                $stmt=$conn->prepare("INSERT INTO user(email,firstname,lastname,password,mobile) values(:email,:firstname,:lastname,:password,:mobile)");
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':firstname',$firstname);
                $stmt->bindParam(':lastname',$lastname);
                $stmt->bindParam(':password',$password);
                $stmt->bindParam(':mobile',$mobile);
                try {
                  $stmt->execute();
                  header("Location:login.php");
                } catch (PDOException $e) {
                  if ($e->errorInfo[1] == 1062) {
                    $err="Account Details Already Exist";
                  }
                }
            }
        }
    }
?>

<body>
    <?php include 'navbar.php';?>
    <div class="bg-white">
        <section class="w-100 p-4">
            <!-- Section: Design Block -->
            <section class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: rgb(173, 236, 254);">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h1 class="my-5 display-5 fw-bold ls-tight">
                                    Become a <i>RideFast</i> driver and save on travel costs by sharing your ride with
                                    passengers.
                                </h1>
                                <?php echo file_get_contents("svg/publish.svg"); ?>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <form action="publish.php" method="post">
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input list="city" type="text" name="pickupCity"
                                                            id="form3Example1" class="form-control" />
                                                        <label class="form-label" for="form3Example1"
                                                            style="margin-left: 0px;">Pick Up City</label>
                                                        <?php include_once 'component/cityList.php'?>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $pickupCityErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input list="city" type="text" name="dropCity"
                                                            id="form3Example2" class="form-control" />
                                                        <label class="form-label" for="form3Example2"
                                                            style="margin-left: 0px;">Drop City</label>
                                                        <?php include_once 'component/cityList.php'?>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $dropCityErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input list="location" type="text" name="pickupLocation"
                                                            id="form3Example1" class="form-control" />
                                                        <label class="form-label" for="form3Example1"
                                                            style="margin-left: 0px;">Pick Up Location</label>
                                                        <?php include_once 'component/cityLocation.php'?>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $pickupLocationErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input list="location" type="text" name="dropLocation"
                                                            id="form3Example2" class="form-control" />
                                                        <label class="form-label" for="form3Example2"
                                                            style="margin-left: 0px;">Drop Location</label>
                                                        <?php include_once 'component/cityLocation.php'?>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $dropLocationErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Mobile input -->
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="date" name="pickupDate" id="pickupDate"
                                                            class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                                        <label class="form-label" for="price"
                                                            style="margin-left: 0px;">Pickup Date</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $pickupDateErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="time" name="pickupTime" id="pickupTime"
                                                            class="form-control"
                                                            value="<?php $date = date("H:i", strtotime("now")); echo "$date"; ?>" />
                                                        <label class="form-label" for="price"
                                                            style="margin-left: 0px;">Pickup Time</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $pickupTimeErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Mobile input -->
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type=number name="price" id="price"
                                                            class="form-control" />
                                                        <label class="form-label" for="price"
                                                            style="margin-left: 0px;">Price Per Person</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $priceErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="number" name="passenger" id="passengers"
                                                            class="form-control" value=1 />
                                                        <label class="form-label" for="price"
                                                            style="margin-left: 0px;">Passengers</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $passengerErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-4">
                                                    <div class="form-outline">
                                                        <input list="vehicle" type="text" name="vehicle"
                                                            id="vehicleList" class="form-control" />
                                                        <label class="form-label" for="vehicleList"
                                                            style="margin-left: 0px;">Vehicle Number</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $vehicleErr; ?></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-center"><span class="error"><?php echo $err; ?></span>
                                            </div>
                                            <!-- Submit button -->
                                            <?php
                                                if(isset($_SESSION['userId'])){
                                                    echo '<input type="submit" name="publish" value="Publish A Ride!"
                                                    class="btn btn-primary btn-block mb-4">';
                                                }
                                                else {
                                                    echo '<input type="submit" disabled name="publish" value="Please Login First"
                                                    class="btn btn-primary btn-block mb-4">';
                                                }
                                                ?>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->
        </section>
    </div>
    <div class="container my-4">
        <h2 class="py-4">The best of carpooling with <i>RideFast</i></h2>
        <div class="row mb-2">
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <svg viewBox="0 0 49 48" xmlns="http://www.w3.org/2000/svg" class="kirk-icon sc-ksZaOG jucjqW"
                        width="40" height="40" aria-hidden="true">
                        <g>
                            <path
                                d="M21.663 21.858c2.511 0 4.747-.516 6.33-1.307 1.65-.825 2.304-1.788 2.304-2.58v-3.13c-.447.344-.963.654-1.48.929-1.891.963-4.47 1.514-7.223 1.514-2.786 0-5.331-.55-7.223-1.514a8.999 8.999 0 01-1.479-.929v3.165h.035c3.405 0 6.535 1.479 8.736 3.852zM27.064 27.361v-2.786-.068-.138c0-.585.137-1.135.412-1.617-1.307.482-2.82.791-4.437.895a11.405 11.405 0 011.651 4.368 16.653 16.653 0 002.373-.654z"
                                fill="#708C91"></path>
                            <path
                                d="M15.162 14.084c1.582.791 3.853 1.307 6.398 1.307 2.545 0 4.816-.516 6.398-1.307 1.65-.825 2.304-1.788 2.304-2.58 0-.79-.653-1.754-2.304-2.58-1.582-.79-3.853-1.306-6.398-1.306-2.545 0-4.816.516-6.398 1.307-1.65.825-2.304 1.788-2.304 2.58 0 .79.653 1.788 2.304 2.58zM24.002 34.55c1.135-.171 2.202-.412 3.096-.756v-2.786-.069V29.288c-.688.206-1.41.413-2.201.55v.172c0 1.617-.345 3.13-.895 4.54zM28.921 24.37c0 .79.654 1.753 2.305 2.579 1.582.791 3.852 1.307 6.397 1.307 2.546 0 4.816-.516 6.398-1.307 1.651-.826 2.305-1.789 2.305-2.58 0-.791-.654-1.754-2.305-2.58-1.582-.79-3.852-1.307-6.398-1.307-2.545 0-4.815.516-6.397 1.307-1.651.826-2.305 1.789-2.305 2.58z"
                                fill="#708C91"></path>
                            <path
                                d="M37.658 30.113c-2.786 0-5.332-.55-7.224-1.513a9.002 9.002 0 01-1.479-.93v3.131c0 .791.654 1.754 2.305 2.58 1.582.79 3.852 1.307 6.398 1.307 2.545 0 4.815-.516 6.398-1.307 1.65-.826 2.304-1.789 2.304-2.58v-3.13c-.447.344-.963.653-1.479.929-1.892.963-4.471 1.513-7.223 1.513z"
                                fill="#708C91"></path>
                            <path
                                d="M37.658 36.545c-2.786 0-5.332-.55-7.224-1.513a9.009 9.009 0 01-1.479-.929v3.13c0 .792.654 1.755 2.305 2.58 1.582.791 3.852 1.307 6.398 1.307 2.545 0 4.815-.516 6.398-1.307 1.65-.825 2.304-1.788 2.304-2.58v-3.13c-.447.344-.963.654-1.479.929-1.892.963-4.471 1.513-7.223 1.513z"
                                fill="#708C91"></path>
                            <path
                                d="M23.005 28.222a10.283 10.283 0 00-2.03-4.54 9.918 9.918 0 00-2.132-2.03 10.449 10.449 0 00-5.951-1.926c-5.675 0-10.285 4.609-10.285 10.284 0 5.676 4.61 10.285 10.285 10.285 3.99 0 7.43-2.27 9.15-5.572a9.968 9.968 0 001.135-4.644v-.069c0-.619-.07-1.204-.172-1.788z"
                                fill="#2ED1FF"></path>
                        </g>
                    </svg>


                </div>
                <h4>Save on travel costs</h4>
                <p>
                    Share your travel costs and save every time you travel by car. Plus, for your 1st ride on
                    <i>RideFast</i>
                    with at least one passenger, you’ll get a 100₹ fuel voucher or 200₹ car wash voucher.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <div class="sc-bTMaZy hpebHU"><svg viewBox="0 0 49 48" xmlns="http://www.w3.org/2000/svg"
                            class="kirk-icon sc-ksZaOG jucjqW" width="40" height="40" aria-hidden="true">
                            <g>
                                <path
                                    d="M37.239 21.028l-2.25 2.25L23.342 34.88a3.14 3.14 0 01-2.206.927c-.838 0-1.632-.309-2.206-.927L7.77 23.675c-.972-.97-.972-2.559 0-3.573l3.308-3.31a2.473 2.473 0 011.764-.75c.662 0 1.324.265 1.765.75l5.735 5.736c.22.22.486.309.794.309.31 0 .574-.133.794-.31l6.794-6.793 2.339-2.338 1.544-1.544c-.044-.045-.133-.045-.177-.089-4.367-1.676-7.544-3.882-11.823-8.117-5.735 5.78-9.617 7.897-18 10.014 0 16.588 5.736 26.78 18 32.029 10.588-4.544 16.235-12.617 17.647-25.323 0-.176.044-.309.044-.485l-1.06 1.147z"
                                    fill="#708C91"></path>
                                <path d="M38.474 18.337l.044-.044-.044.044z" fill="#FFF"></path>
                                <path
                                    d="M42.974 5.146a.56.56 0 00-.794 0l-1.72 1.72-5.692 5.691-11.426 11.426a3.14 3.14 0 01-2.206.927c-.838 0-1.632-.309-2.205-.927l-5.736-5.735c-.132-.132-.264-.132-.353-.132-.088 0-.22 0-.352.132l-3.31 3.309c-.22.22-.22.53 0 .706l11.162 11.161c.22.22.486.31.794.31.31 0 .574-.133.794-.31l13.28-13.279 5.426-5.426.044-.044.53-.53.352-.352.353-.353 4.28-4.28a.56.56 0 000-.794l-3.22-3.22z"
                                    fill="#2ED1FF"></path>
                            </g>
                        </svg></div>
                </div>
                <h4>Join a trustworthy community</h4>
                <p>
                    We know each of our members: both drivers and passengers. We verify ratings, profiles and IDs, so
                    you know exactly who you’re travelling with.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        style="background:linear-gradient(80.19deg, rgb(46, 209, 255) 4.92%, rgb(0, 175, 245) 95.98%);border-radius:50%;"
                        width="40" height="40" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.105 5.407a.402.402 0 01.367.12.392.392 0 01.121.367 13.196 13.196 0 01-2.896 7.59 3.019 3.019 0 01-.427 3.777L12.832 19.7l-2.122-2.102H6.83a.417.417 0 01-.428-.428v-3.898l-2.101-2.107 2.438-2.419a2.97 2.97 0 013.75-.397 12.72 12.72 0 017.616-2.942zm-4.936 5.421a1.734 1.734 0 00-2.438 0L9.514 12.05a1.726 1.726 0 002.433 2.44l1.222-1.217a1.736 1.736 0 000-2.445z"
                            fill="#FFF"></path>
                    </svg>
                </div>
                <h4>Scroll, click, tap and go!</h4>
                <p>
                    Booking a ride has never been easier! Thanks to our simple app
                    powered by great technology, you can book a ride close to you in
                    just minutes.
                </p>
            </div>
        </div>
    </div>
    <div class="silver">
        <div class="container py-4">
            <h2 class="py-4">We’re here every step of the way</h2>
            <div class="row mb-2">
                <div class="col-lg-4">
                    <div class="bd-placeholder-img" width="140" height="140">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="kirk-icon sc-ksZaOG jucjqW"
                            width="40" height="40" aria-hidden="true">
                            <path
                                d="M21.951,10.281C21.98,10.023,22,9.764,22,9.5C22,4.813,17.29,1,11.5,1C5.71,1,1,4.813,1,9.5c0,1.801,0.691,3.52,2,4.979 V19.5c0,0.173,0.09,0.334,0.237,0.426C3.317,19.975,3.409,20,3.5,20c0.077,0,0.153-0.018,0.224-0.053l4.431-2.215 C9.667,19.752,12.424,21,15.5,21c0.547,0,1.097-0.042,1.636-0.123l4.141,2.07C21.347,22.982,21.424,23,21.5,23 c0.092,0,0.183-0.025,0.263-0.074C21.91,22.834,22,22.673,22,22.5v-3.814c1.292-1.173,2-2.651,2-4.186 C24,12.946,23.27,11.461,21.951,10.281z M3.865,13.943C2.645,12.641,2,11.104,2,9.5C2,5.364,6.262,2,11.5,2S21,5.364,21,9.5 S16.738,17,11.5,17c-1.023,0-2.045-0.135-3.038-5C2,5.364,6.262,2,11.5,2S21,5.364,21,9.5 S16.738,17,11.5,17c-1.023,0-2.045-0.135-3.038-0.399c-0.118-0.029-0.244-0.019-0.353,0.036L4,18.691v-4.406 C4,14.158,3.952,14.036,3.865,13.943z M21.176,18.079C21.064,18.175,21,18.313,21,18.46v3.23l-3.561-1.78 c-0.094-0.048-0.203-0.064-0.307-0.046C16.597,19.954,16.047,20,15.5,20c-2.334,0-4.511-0.826-5.917-2.162 C10.219,17.935,10.858,18,11.5,18c4.962,0,9.12-2.804,10.212-6.554C22.543,12.351,23,13.411,23,14.5 C23,15.805,22.353,17.076,21.176,18.079z">
                            </path>
                        </svg>


                    </div>
                    <p class="para">At your service 24/7.</p>
                    <p class="para2">Our team is at your disposal to answer
                        any questions by email or social media. You can also have a live chat directly with
                        experienced
                        members.</p>
                </div>
                <div class="col-lg-4">
                    <div class="bd-placeholder-img" width="140" height="140">
                        <div class="sc-bTMaZy hpebHU">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="kirk-icon sc-ksZaOG jucjqW" width="40" height="40" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.411 9.673l1.366.903A1.67 1.67 0 0122.5 12v8a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2h-13v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-7.989a1.678 1.678 0 01.594-1.341c.05-.04.05-.04.089-.068l.035-.023 1.372-.907 1.928-5.104A1.438 1.438 0 016.87 3.5h10.274c.63.017 1.17.452 1.324 1.023l1.943 5.15zM18.5 17h3v-5.011a.686.686 0 00-.264-.572L19.85 10.5H4.151l-1.01.667-.377.25c-.02.013-.02.013-.035.025a.595.595 0 00-.09.094A.694.694 0 002.5 12v5h16zm1 1v2h2v-2h-2zm-17 0h2v2h-2v-2zm16.778-8.5l-1.76-4.668c-.053-.196-.216-.327-.387-.332H6.884c-.185.005-.348.136-.416.377L4.7249.5h14.554zM4.5 15h3a.5.5 0 000-1h-3a.5.5 0 000 1zm15 0h-3a.5.5 0 010-1h3a.5.5 0 010 1z"
                                    fill="#708C91"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="para"><i>RideFast</i> at your side.</p>

                    <p class="para2">For just 200 ₹, benefit from the
                        reimbursement of up to 1,500₹ of your excess when you publish a ride as a driver on
                        <i>RideFast</i>.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="bd-placeholder-img" width="140" height="140">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="kirk-icon sc-ksZaOG jucjqW sc-evrZIY iCqPQo" width="40" height="40"
                            aria-hidden="true">
                            <g>
                                <path
                                    d="M21.65 5.82C17.37 4.76 15.4 3.7 12.42.74a.53.53 0 0 0-.74 0C8.69 3.7 6.73 4.76 2.45 5.82a.52.52 0 0 0-.4.5c0 8.54 2.87 14.24 9.8 17.18.12.06.27.06.4 0 6.93-2.94 9.8-8.64 9.8-17.17a.52.52 0 0 0-.4-.5zm-9.6 16.63C5.83 19.72 3.19 14.57 3.1 6.73c4.02-1.03 6.12-2.15 8.95-4.89 2.83 2.74 4.93 3.86 8.94 4.9-.08 7.83-2.72 12.98-8.94 15.71z">
                                </path>
                                <path
                                    d="M9.26 12.13a.53.53 0 0 0-.74 0c-.2.21-.2.54 0 .75l2.07 2.03c.2.2.53.2.74 0l5.17-5.08c.2-.2.2-.54 0-.74a.53.53 00 0-.74 0l-4.8 4.71-1.7-1.67z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <p class="para">100% secure information
                    </p>
                    <p class="para2">Our team is dedicated to the protection
                        of your data, which is always 100% confidential thanks to monitoring tools, secure
                        navigation
                        and encrypted data.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <h2 class="help-center">Everything you need as a driver, in our Help Centre</h2>
    </div>
    <div class="container">
        <div class="row  row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="h3">
                    <h3>How do I set the passenger contribution for my ride?</h3>
                </div>
                <div class="paragraph">
                    <p>We recommend a contribution per passenger on your rides. These suggestions help you set fair
                        contributions for your rides (those most likely to get your seats filled!), but can still be
                        adjusted within</p>
                </div>
            </div>
            <div class="feature col">
                <div class="h3">
                    <h3>When do I get my money?</h3>
                </div>
                <div class="paragraph">
                    <p>We send your money 48 hours after the ride if you travelled as planned. You’ll get your money 1
                        to 5 weekdays (not counting weekends and holidays) after we send it. If you don’t see any</p>
                </div>
            </div>
        </div>
        <div aria-hidden="true">
            <hr>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="h3">
                        <h3>What should I do if there’s an error with my ride?</h3>
                    </div>
                    <div class="paragraph">
                        <p>You should edit your ride as soon as you spot the error. If you can’t edit your ride because
                            passengers have already booked, contact them explaining the mistake. If the changes don’t
                            suit them, you</p>
                    </div>
                </div>
                <div class="feature col">
                    <div class="h3">
                        <h3>What are the benefits of travelling by carpool?</h3>
                    </div>
                    <div class="paragraph">
                        <p>There are multiple advantages to carpooling, over other means of transport. Travelling by
                            carpool is
                            usually more affordable, especially for longer distances. Carpooling is also more eco-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>