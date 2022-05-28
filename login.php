<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

    <link rel="stylesheet" href="./style.css" />
</head>
<?php
    $err=null;
    $emailErr=null;
    $passwordErr=null;
    session_start();
    require_once 'connect.php';
    if(isset($_POST['login'])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        if(empty($email) || empty($password))
        {
            $err="Some Feilds are required<br>";
        } else {  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format<br>";
            }
            if(!preg_match("/^.{4,20}$/",$password))
            {
                $passwordErr="Invalid Password";
            }
            if(empty($emailErr) &&empty($err) && empty($passwordErr))
            {
                $stmt=$conn->prepare("SELECT userId,firstname,lastname,email FROM user WHERE email=:email AND password=:password");
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':password',$password);
                try {
                    //code...
                    if($stmt->execute())
                    {
                        $rows=$stmt->fetch(PDO::FETCH_ASSOC);
                        if(!isset($rows['email'])){
                            $err="Login failed";
                        }
                        else {
                            $_SESSION["firstname"]=$rows['firstname']; 
                            $_SESSION["lastname"]=$rows['lastname']; 
                            $_SESSION["userId"]=$rows['userId'];
                            header("Location:index.php");
                        }
                    }
                } catch (PDOException $e) {
                    $err="Login failed";
                }    
            }
        }
    }
?>

<body>
    <?php include 'header.php';?>
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
                                    <div class="card-body py-5 px-md-5 d-flex flex-row justify-content-center">
                                        <form action="login.php" method="post" style="width: 22rem;">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" name="email" id="form2Example1"
                                                    class="form-control">
                                                <label class="form-label" for="form2Example1"
                                                    style="margin-left: 0px;">Email address</label>
                                                <div class="form-notch">
                                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                                                    <div class="form-notch-trailing"></div>
                                                </div>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" name="password" id="form2Example2"
                                                    class="form-control">
                                                <label class="form-label" for="form2Example2"
                                                    style="margin-left: 0px;">Password</label>
                                                <div class="form-notch">
                                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                                    <div class="form-notch-middle" style="width: 64.8px;"></div>
                                                    <div class="form-notch-trailing"></div>
                                                </div>
                                            </div>

                                            <div class="text-center"><span class="error"><?php echo $err; ?></span>
                                            </div>
                                            <!-- Submit button -->
                                            <input type="submit" name="login" value="submit"
                                                class="btn btn-primary btn-block mb-4">
                                            <div class="text-center">
                                                <p>Not a member? <a href="register.php">Register</a></p>
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