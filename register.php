<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php'?>
<?php
    $err=null;
    $firstnameErr=null;
    $lastnameErr=null;
    $emailErr=null;
    $passwordErr=null;
    $mobileErr=null;
    
    
    require_once 'connect.php';

	if(isset($_POST['create']))
    {
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $mobile=$_POST['mobile'];
        if(empty($firstname) || empty($lastname) || empty($email) ||empty($password) || empty($mobile))
        {
            $err="Some Feilds are required<br>";
        } else {  
            if (!preg_match("/^[a-zA-Z]*$/",$firstname)){
                $firstnameErr = "Only letters are allowed<br>";
            }
            if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
                $lastnameErr = "Only letters are allowed<br>";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format<br>";
            }
            if(!preg_match("/^.{4,20}$/",$password)){
                $passwordErr="Invalid Password";
            }
            if(!preg_match("/^[789]\d{9}$/",$mobile)){
              $mobileErr="Invalid Mobile Number";
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
                <div class="px-4 py-5 px-md-5 text-center text-lg-start"
                    style="background-color: hsl(0, 0%, 96%); height: 550px;">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h1 class="my-5 display-5 fw-bold ls-tight">
                                    The best rides <br>
                                    <span class="text-primary">for your journey</span>
                                </h1>
                                <p style="color: hsl(217, 10%, 50.8%)">
                                    rPool is an eco-smart option for handling all your travel needs by connecting
                                    you with fellow professional riders. As our cities are growing, increased
                                    traffic adds to the chaos and pollution. Hence, we have committed to providing a
                                    convenient, economical and sustainable solution to this problem through
                                    carpooling and bike pooling.
                                </p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <form action="register.php" method="post">
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" name="firstname" id="form3Example1"
                                                            class="form-control" />
                                                        <label class="form-label" for="form3Example1"
                                                            style="margin-left: 0px;">First name</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;">
                                                            </div>
                                                            <div class="form-notch-middle" style="width: 68.8px;">
                                                            </div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $firstnameErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" name="lastname" id="form3Example2"
                                                            class="form-control" />
                                                        <label class="form-label" for="form3Example2"
                                                            style="margin-left: 0px;">Last name</label>
                                                        <div class="form-notch">
                                                            <div class="form-notch-leading" style="width: 9px;">
                                                            </div>
                                                            <div class="form-notch-middle" style="width: 68px;">
                                                            </div>
                                                            <div class="form-notch-trailing"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="error"><?php echo $lastnameErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Email input -->
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="email" name="email" id="form3Example3"
                                                        class="form-control" />
                                                    <label class="form-label" for="form3Example3"
                                                        style="margin-left: 0px;">Email address</label>
                                                    <div class="form-notch">
                                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                                        <div class="form-notch-middle" style="width: 88.8px;"></div>
                                                        <div class="form-notch-trailing"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="error"><?php echo $emailErr; ?></span>
                                                </div>
                                            </div>
                                            <!-- Password input -->
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="password" name="password" id="form3Example4"
                                                        class="form-control" />
                                                    <label class="form-label" for="form3Example4"
                                                        style="margin-left: 0px;">Password</label>
                                                    <div class="form-notch">
                                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                                        <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                        <div class="form-notch-trailing"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="error"><?php echo $passwordErr; ?></span>
                                                </div>
                                            </div>

                                            <!-- Mobile input -->
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="number" name="mobile" id="form3Example5"
                                                        class="form-control" />
                                                    <label class="form-label" for="form3Example5"
                                                        style="margin-left: 0px;">Mobile</label>
                                                    <div class="form-notch">
                                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                                        <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                        <div class="form-notch-trailing"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="error"><?php echo $mobileErr; ?></span>
                                                </div>
                                            </div>

                                            <div class="text-center"><span class="error"><?php echo $err; ?></span>
                                            </div>
                                            <!-- Submit button -->
                                            <input type="submit" name="create" value="submit"
                                                class="btn btn-primary btn-block mb-4">
                                            <div class="text-center">
                                                <p>Already a member? <a href="login.php">Login</a></p>
                                            </div>
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
    <?php include 'footer.php';?>
</body>
<!-- Section: Design Block -->