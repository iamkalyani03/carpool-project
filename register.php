<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
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
    $firstnameErr=null;
    $lastnameErr=null;
    $emailErr=null;
    $passwordErr=null;
    
    $rcErr=null;
    
    require_once 'connect.php';

	if(isset($_POST['create']))
    {
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST["email"];
        $password=$_POST["password"];
        if(empty($firstname) || empty($lastname) || empty($email) ||empty($password))
        {
            $err="Some Feilds are required<br>";
        } else {  
            if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
                $firstnameErr = "Only letters are allowed<br>";
            }
            if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
                $lastnameErr = "Only letters are allowed<br>";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format<br>";
            }
            if(!preg_match("/^.{4,20}$/",$password))
            {
                $passwordErr="Invalid Password";
            }
            if(empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) &&empty($err) && empty($passwordErr))
            {
                $stmt=$conn->prepare("INSERT INTO user(email,firstname,lastname,password) values(:email,:firstname,:lastname,:password)");
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':firstname',$firstname);
                $stmt->bindParam(':lastname',$lastname);
                $stmt->bindParam(':password',$password);    
                $stmt->execute();
                header("Location:login.php");
            }
        }
    }
?>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">RiderR</a>
      <div class="kirk-topBar-right">
        <a title="" target="_self" rel="" href="./search.html">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true">
            <g fill="none" stroke="#00AFF5" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              stroke-miterlimit="10">
              <line x1="22" y1="22" x2="16.4" y2="16.4"></line>
              <circle cx="10" cy="10" r="9"></circle>
            </g>
          </svg>Search
        </a>
        <a class="flex items-center mx-s large:ml-none large:mr-xl" title="" target="_self" rel="" href="./login.html">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true">
            <path stroke-width="0" fill="#00AFF5" fill-rule="evenodd"
              d="M1.14 11.5a10.36 10.36 0 1120.72 0 10.36 10.36 0 01-20.72 0zM11.5 0a11.5 11.5 0 100 23 11.5 11.5 0 000-23zm.57 6.53a.57.57 0 00-1.14 0v4.4h-4.4a.57.57 0 100 1.14h4.4v4.4a.57.57 0 101.14 0v-4.4h4.4a.57.57 0 000-1.14h-4.4z">
            </path>
          </svg>
          Publish a ride</a>
        </button>
        <a href="./login.html">
          <button type="button" class="btn btn-primary">Login</button>
        </a>
        </svg>
      </div>
    </div>
    </div>
  </nav>
<section class="pb-4">
  <div class="bg-white border rounded-5">
    
    <section class="w-100 p-4">

      <!-- Section: Design Block -->
      <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-5 fw-bold ls-tight">
                  The best rides <br>
                  <span class="text-primary">for your journey</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                rPool is an eco-smart option for handling all your travel needs by connecting you with fellow professional riders. As our cities are growing, increased traffic adds to the chaos and pollution. Hence, we have committed to providing a convenient, economical and sustainable solution to this problem through carpooling and bike pooling.
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
                            <input type="text" name="firstname" id="form3Example1" class="form-control">
                            <label class="form-label" for="form3Example1" style="margin-left: 0px;">First name</label>
                            <div class="text-center"><span class="error"><?php echo $firstnameErr; ?></span></div>
                          <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="text" name="lastname" id="form3Example2" class="form-control">
                            <label class="form-label" for="form3Example2" style="margin-left: 0px;">Last name</label>
                            <div class="text-center"><span class="error"><?php echo $lastnameErr; ?></span></div>
                          <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68px;"></div><div class="form-notch-trailing"></div></div></div>
                        </div>
                      </div>

                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <input type="email" name="email" id="form3Example3" class="form-control">
                        <label class="form-label" for="form3Example3" style="margin-left: 0px;">Email address</label>
                        <div class="text-center"><span class="error"><?php echo $emailErr; ?></span></div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <input type="password" name="password" id="form3Example4" class="form-control">
                        <label class="form-label" for="form3Example4" style="margin-left: 0px;">Password</label>
                        <div class="text-center"><span class="error"><?php echo $passwordErr; ?></span></div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>
                      
                      <div class="text-center"><span class="error"><?php echo $err; ?></span></div>
                      <!-- Submit button -->
                      <input type="submit" name="create" value="submit" class="btn btn-primary btn-block mb-4">
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
</section>
</body>
    <!-- Section: Design Block -->