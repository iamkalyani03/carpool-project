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
                $stmt=$conn->prepare("SELECT firstname,lastname,email FROM user WHERE email=:email AND password=:password");
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':password',$password);    
                if($stmt->execute()){
                    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
                    if($email != $rows['email']){
                        $err="Login failed";
                    }
                    else {
                        $_SESSION["firstname"]=$rows['firstname']; 
                        $_SESSION["lastname"]=$rows['lastname']; 
                        header("Location:home.php");
                    }
                }
                
            }
        }
    }
?>
<body>
<section class="pb-4">
  <div class="d-flex align-items-center">
    
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
      <form action="login.php" method="post" style="width: 22rem;">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" name="email" id="form2Example1" class="form-control">
          <label class="form-label" for="form2Example1" style="margin-left: 0px;">Email address</label>
        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="password" id="form2Example2" class="form-control">
          <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>

        <div class="text-center"><span class="error"><?php echo $err; ?></span></div>
        <!-- Submit button -->
        <input type="submit" name="login" value="submit" class="btn btn-primary btn-block mb-4">
        <div class="text-center">
            <p>Not a member? <a href="register.php">Register</a></p>
          </div>
      </form>
    </section>    
  </div>
</section>
</body>