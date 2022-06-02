<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php'?>

<?php 
$err=null;
$vnameErr=null;
$vnumberErr=null;
require 'connect.php';
if(isset($_POST['vehicle']))
{
   $vname=$_POST['vname'];
   $vnumber=$_POST['vnumber'];
   if(empty($vname) || empty($vnumber))
    {
            $err="Some Feilds are required<br>";
    } else {  
        if (!preg_match("/^[a-zA-Z]*$/",$vname)){
            $vnameErr = "Only letters are allowed<br>";
        }
        if(!preg_match("/(([A-Za-z]){2,3}(|-)(?:[0-9]){1,2}(|-)(?:[A-Za-z]){2}(|-)([0-9]){1,4})|(([A-Za-z]){2,3}(|-)([0-9]){1,4})/",$vnumber)){
            $vnumberErr="Invalid vehicle number";
        }
        if(empty($vnameErr) && empty($vnumberErr) && empty($err) && isset($_SESSION['userId']))
        {
            $userId=$_SESSION['userId'];
            $stmt=$conn->prepare("INSERT INTO vehicle(vname,vnumber,userId)values(:vname,:vnumber,:userId)");
            $stmt->bindParam(':vname',$vname);
            $stmt->bindParam(':vnumber',$vnumber);
            $stmt->bindParam(':userId',$userId);
            try {  
                $stmt->execute();  
            } catch (PDOException $e) {
                $err="Something Went Wrong";
              if ($e->errorInfo[1] == 1062) {
                $err="Vehicle Details Already Exist";
              }
            }
        }
    }
}
?>

<body>
    <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card">
            <div class="card-body py-5 px-md-5 d-flex flex-row justify-content-center">
                <form action="profile.php" method="post" style="width: 22rem;">
                    <!-- Vehicle Name -->
                    <div class="form-outline mb-4">
                        <input type="text" name="vname" id="form2Example1" class="form-control">
                        <label class="form-label" for="form2Example1" style="margin-left: 0px;">Vehicle name</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 88.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                        <div class="text-center">
                            <span class="error"><?php echo $vnameErr; ?></span>
                        </div>
                    </div>

                    <!-- Vehicle Number -->
                    <div class="form-outline mb-4">
                        <input type="text" name="vnumber" id="form2Example2" class="form-control">
                        <label class="form-label" for="form2Example2" style="margin-left: 0px;">Vehicle Number</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 64.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                        <div class="text-center">
                            <span class="error"><?php echo $vnumberErr; ?></span>
                        </div>
                    </div>
                    <div class="text-center"><span class="error"><?php echo $err; ?></span></div>
                    <!-- Submit button -->
                    <input type="submit" name="vehicle" value="submit" class="btn btn-primary btn-block mb-4">
                </form>
            </div>
        </div>
    </div>
</body>