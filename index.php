<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php'?>

<body>
    <?php include 'navbar.php';?>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']=="login")
        {
    ?>
    <script>
    swal({
        title: "Login Successfull",
        text: "Lets go on a ride!",
        icon: "success",
    });
    </script>
    <?php
         unset($_SESSION['status']);
        }
    ?>
    <!-- Carousel wrapper -->
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="./images/banner.png" class="c w-100" alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <form method="POST" action="bookingList.php">
                        <div class=" d-flex flex-row input-group">
                            <span class="input-group-text bg-white search-form" id="addon-wrapping"><i
                                    class="fas fa-dot-circle" height="100px"></i></span>
                            <input list="city" type="text" name="pickupCity" placeholder="leaving from ..."
                                class="search-form form-control" />
                            <datalist id="city">
                                <option value="Nashik">
                                <option value="Pune">
                                <option value="Mumbai">
                                <option value="Nagpur">
                                <option value="Aurangabad">
                            </datalist>

                            <span class="input-group-text bg-white search-form" id="addon-wrapping"><i
                                    class=" fas fa-dot-circle"></i></span>
                            <input list="city" type="text" name="dropCity" placeholder="going to..."
                                class="search-form form-control" />

                            <input type="Date" name="pickupDate" placeholder="Date" class="search-form form-control"
                                value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d');?>" />

                            <input type="number" name="passenger" placeholder="No. Of Passengers"
                                class="search-form form-control" />
                            <?php
                                if(isset($_SESSION['userId'])){
                                    echo '<input type="submit" name="booking" value="Let\'s Go" class="search-form btn btn-primary">';
                                }
                                else {
                                    echo '<input type="submit" disabled name="booking" value="Please Login" class="search-form btn btn-primary">';
                                }
                            ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->

    <div class="container my-5">
        <div class="row mb-2">
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        aria-hidden="true">
                        <g fill="none" stroke="#708C91" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.43 5.04v3.48c0 1.44 2.34 2.61 5.22 2.61s5.22-1.17 5.22-2.6V5.03"></path>
                            <path d="M2.43 8.52V12c0 1.44 2.34 2.6 5.22 2.6a8.7 8.7 0 0 0 3.48-.66"></path>
                            <path d="M2.43 12v3.48c0 1.44 2.34 2.6 5.22 2.6a8.7 8.7 0 0 0 3.48-.66"></path>
                            <ellipse cx="7.65" cy="5.04" rx="5.22" ry="2.61"></ellipse>
                            <path d="M11.13 12v3.48c0 1.44 2.34 2.6 5.22 2.6s5.22-1.16 5.22-2.6V12"></path>
                            <path d="M11.13 15.48v3.48c0 1.44 2.34 2.6 5.22 2.6s5.22-1.16 5.22-2.6v-3.48"></path>
                            <ellipse cx="16.35" cy="12" rx="5.22" ry="2.61"></ellipse>
                        </g>
                    </svg>
                </div>
                <h3>Your pick of rides at low prices</h3>
                <p>
                    No matter where you’re going, by bus or carpool, find the perfect
                    ride from our wide range of destinations and routes at low prices.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        aria-hidden="true">
                        <g>
                            <path
                                d="M19.33,8.5c0-0.276-0.225-0.5-0.5-0.5h-3.855c-0.275,0-0.5,0.224-0.5,0.5s0.225,0.5,0.5,0.5h3.855 C19.105,9,19.33,8.776,19.33,8.5z">
                            </path>
                            <path
                                d="M9.906,8.492V8.133c0-0.994-0.798-1.799-1.781-1.799S6.344,7.139,6.344,8.133v0.359 c0,0.994,0.798,1.799,1.781,1.799S9.906,9.486,9.906,8.492z"
                                fill="#708C91">
                            </path>
                            <path
                                d="M4.167,13.422v0.528c0,0.165,0.134,0.3,0.3,0.3h7.316c0.166,0,0.3-0.135,0.3-0.3v-0.528 c0-0.713-0.474-1.339-1.162-1.526c-0.75-0.204-1.773-0.417-2.797-0.417s-2.047,0.213-2.797,0.417 C4.641,12.083,4.167,12.709,4.167,13.422z"
                                fill="#708C91">
                            </path>
                            <path
                                d="M12,18H1.982V1h2.904C5.11,2.139,6.086,3,7.265,3c1.178,0,2.154-0.861,2.379-2h4.88 c0.225,1.139,1.201,2,2.379,2s2.154-0.861,2.379-2h2.903v9c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5V0.5 c0-0.276-0.224-0.5-0.5-0.5H18.83c-0.276,0-0.5,0.224-0.5,0.5c0,0.833-0.643,1.5-1.428,1.5s-1.428-0.667-1.428-1.5 c0-0.276-0.224-0.5-0.5-0.5H9.192c-0.276,0-0.5,0.224-0.5,0.5c0,0.833-0.643,1.5-1.427,1.5S5.837,1.333,5.837,0.5 c0-0.276-0.224-0.5-0.5-0.5H1.482c-0.276,0-0.5,0.224-0.5,0.5v18c0,0.276,0.224,0.5,0.5,0.5H12c0.276,0,0.5-0.224,0.5-0.5 S12.276,18,12,18z">
                            </path>
                            <path
                                d="M25.354,13.646c-0.195-0.195-0.512-0.195-0.707,0L19,19.293l-2.646-2.646c-0.195-0.195-0.512-0.195-0.707,0 s-0.195,0.512,0,0.707l3,3c0.195,0.195,0.512,0.195,0.707,0l6-6C25.549,14.158,25.549,13.842,25.354,13.646z">
                            </path>
                        </g>
                    </svg>
                </div>
                <h3>Trust who you travel with</h3>
                <p>
                    We take the time to get to know each of our members and bus
                    partners. We check reviews, profiles and IDs, so you know who
                    you’re travelling with and can book your ride at ease on our
                    secure platform.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="bd-placeholder-img mb-2" width="140" height="140">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        aria-hidden="true">
                        <path fill="none" stroke="#708C91" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round" stroke-miterlimit="10" d="M15.5 1.5h-7l-3 11h6l-2 8 10-12h-6z">
                        </path>
                    </svg>
                </div>
                <h3>Scroll, click, tap and go!</h3>
                <p>
                    Booking a ride has never been easier! Thanks to our simple app
                    powered by great technology, you can book a ride close to you in
                    just minutes.
                </p>
            </div>
        </div>
    </div>
    <div class="gray">
        <div class="container my-5">
            <div class="row featurette d-flex justify-content-center align-item-center">
                <div class="col-md-7 order-md-2 d-flex flex-column justify-content-center">
                    <h3 class="white">
                        Your safety is our priority
                        <span></span>
                    </h3>
                    <p class="white">
                        At Our Company, we're working hard to make our platform as secure as
                        it can be. But when scams do happen, we want you to know exactly
                        how to avoid and report them. Follow our tips to help us keep you
                        safe
                    </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://cdn.blablacar.com/kairos/assets/build/images/phishing-b200bc23cc51c0950d45fdaeb99f9a38.svg"
                        alt="" />
                </div>
            </div>
        </div>
    </div>

    <div class="help-center p-3">
        <h2>Carpool Help Centre</h2>
    </div>
    <div class="container">
        <div class="row  row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="h3">
                    <h3>How do I book a carpool ride?</h3>
                </div>
                <div class="paragraph">
                    <p>You can book a carpool ride on our mobile app, or on blablacar.com. Simply search for your
                        destination,
                        choose
                        the date you want to travel and pick the carpool that suits you best! Some</p>
                </div>
            </div>
            <div class="feature col">
                <div class="h3">
                    <h3>How do I publish a carpool ride?</h3>
                </div>
                <div class="paragraph">
                    <p>Offering a carpool ride on BlaBlaCar is easy. To publish your ride, use our mobile app or
                        blablacar.com.
                        Indicate your departure and arrival points, the date and time of your departure, how many</p>
                </div>
            </div>
        </div>
        <div aria-hidden="true">
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="h3">
                    <h3>How do I cancel my carpool ride?</h3>
                </div>
                <div class="paragraph">
                    <p>If you have a change of plans, you can always cancel your carpool ride from the ‘Your rides’
                        section of
                        our app. The sooner you cancel, the better. That way the driver has time to accept new
                        passengers.</p>
                </div>
            </div>
            <div class="feature col">
                <div class="h3">
                    <h3>What are the benefits of travelling by carpool?</h3>
                </div>
                <div class="paragraph">
                    <p>There are multiple advantages to carpooling, over other means of transport. Travelling by carpool
                        is
                        usually more affordable, especially for longer distances. Carpooling is also more eco-</p>
                </div>
            </div>
        </div>
        <div aria-hidden="true">
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="h3">
                    <h3>How much does a carpool ride cost?</h3>
                </div>
                <div class="paragraph">
                    <p>The costs of a carpool ride can vary greatly, and depend on factors like distance, time of
                        departure, the
                        demand of that ride and more. It is also up to the driver to decide how much to charge.</p>
                </div>
            </div>
            <div class="feature col">
                <div class="h3">
                    <h3>How do I start carpooling?</h3>
                </div>
                <div class="paragraph">
                    <p>Carpooling with BlaBlaCar is super easy, and free! Simply sign up for an account and tell us some
                        basic
                        details about yourself. Once you have a BlaBlaCar account, you can start booking or</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>