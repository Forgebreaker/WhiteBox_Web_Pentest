<?php
include("connect_db.php");
if (isset($_POST['phone']) and isset($_POST['otp'])) {
  $time = date("Y-m-d H:i:s");
  $phone = $conn->real_escape_string($_POST['phone']);
  $otp = $conn->real_escape_string($_POST['otp']);

  $sql = "SELECT * FROM Users WHERE phone_number='$phone' AND otp='$otp';";
  $result = $conn->query($sql);

  $info = "";
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // OTP will expire in 15 minutes
      if ((strtotime($time) - strtotime($row['opt_created_time'])) > 900) {
        $info = "<pre>Token is expired</pre>";
      } else {
        // this a phone number of vip account 
        if ($row['phone_number'] === '0123456789') {
          $info .= "<pre>Login successful</pre>";
          $info .= "<br>";
          $info .= "<pre>CBJS{FAKE_FLAG_FAKE_FLAG}</pre>";
        } else {
          $info = "<pre>Login successful</pre>";
        }
      }
    }
  } else {
    $info = "<pre>User not exist or OTP is wrong</pre>";
  }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="./static/css/bootstrap.min.css" crossorigin="anonymous">
<script src="./static/js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="./static/js/popper.min.js" crossorigin="anonymous"></script>
<script src="./static/js/bootstrap.min.js" crossorigin="anonymous"></script>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div class="container" style="margin-top: 10%">
    <h2>Login Form</h2>
    <form action="/" method="post">
      <div class="form-outline mb-4">
        <label class="form-label" for="uname">Phone number</label>
        <input type="number" id="uname" name="phone" class="form-control" required />
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">OTP</label>
        <input type="text" id="form2Example2" name="otp" class="form-control" placeholder="Only 4 digits" required />
      </div>
      <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
      <div class="text-center">
        <a href="/gen_otp.php">Create new OTP</a>
        <p><?php echo $info ?></p>
      </div>
    </form>
  </div>
</body>

</html>