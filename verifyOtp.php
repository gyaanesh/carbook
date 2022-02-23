<?php
session_start();
include 'include/header.php';
// print_r($_POST);
// print_r($_SESSION);

if (isset($_SESSION['otp'])) 
{
  header("Location: login.php");
}
else
{
  // GO FOR VERIFICATION

  if (isset($_POST['otp']))
  {

    // include 'include/config_inc.php';
    include 'include/adminConfig.php';

    $query = "SELECT * FROM loginotpverification WHERE mobile=".$_SESSION['mobile'];

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $userData = mysqli_fetch_array($result);
      if ($userData['otp']== $_POST['otp'])
      {
        $_SESSION['User_login_status'] = true;
        $_SESSION['OTP']= "true";

        $_SESSION['OTP']= "false";

        $_SESSION['User_id'] = $userData['id'];
        header("Location: index.php");
      }
    }
  }
}
?>

<?php 
if (isset($_SESSION['User_login_status'] ))
  {?>
<script>
  window.location.replace("index.php");
</script>
<?php  } ?>
<div class="row" >
  <div class="container">
    <div class="col-md-3 offset-3">
      <div class="card " style="width: 18rem; margin-top: 100px">
        <div class="card-body">
         
          <h5 class="card-title">PLease Verify Your Otp Below</h5>
          <p class="card-text">
            <form method="post" action="">
              <div class="form-group">
                <label for="exampleInputEmail1">OTP</label>
                <input type="text" maxlength="6" minlength="6" class="form-control" id="exampleInputEmail1" name="otp" aria-describedby="emailHelp" placeholder="Enter OTP">
              </div>
               

              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </p>
        </div>
      </div>
    </div>
  </div>  
</div>

  
