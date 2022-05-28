    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="./index.php">
                <img src="./images/logo.png" height="30" alt="Carpool Logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse text-center" id="navbarButtonsExample">
                <!-- Right links -->
                <div class="navbar-nav ms-auto">
                    <div class="d-flex align-items-center">
                        <a class="nav-link" href="#"><span><i class="fas fa-plus-circle fa-lg"></i></span> Publish
                            Ride</a>
                    </div>
                    <!-- Right links -->

                    <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
                    if(isset($_SESSION["userId"])){
                        require 'component/userLogo.php';
                    }
                    else {
                        require 'component/loginSignup.php';
                    }
                    ?>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->