<?php
?>

<body>
    <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card">
            <div class="card-body py-5 px-md-5 d-flex flex-row justify-content-center">
                <form action="login.php" method="post" style="width: 22rem;">
                    <!-- Vehicle Name -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control">
                        <label class="form-label" for="form2Example1" style="margin-left: 0px;">Email address</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 88.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>

                    <!-- Vehicle Number -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control">
                        <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>

                    <!-- Vehicle Registration Number -->
                    <!-- <div class="text-center"><span class="error"><?php echo $err; ?></span></div> -->
                    <!-- Submit button -->
                    <input type="submit" name="login" value="submit" class="btn btn-primary btn-block mb-4">
                </form>
            </div>
        </div>
    </div>
</body>