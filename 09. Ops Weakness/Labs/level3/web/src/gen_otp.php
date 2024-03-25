<?php
include("connect_db.php");

$info = "";
function generateOTP($digits = 4)
{
    $i = 0;
    $otp = "";
    while ($i < $digits) {
        $otp .= mt_rand(0, 9);
        $i++;
    }
    return $otp;
}

if (isset($_POST['phone'])) {
    $phone = $conn->real_escape_string($_POST['phone']);
    $time = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM Users WHERE phone_number='$phone';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ((strtotime($time) - strtotime($row['opt_created_time'])) > 900 or $row['otp'] === NULL) {
                $otp = generateOTP();
                try {
                    $sql = "UPDATE Users SET otp='$otp', opt_created_time='$time' WHERE phone_number='$phone';";
                    $conn->query($sql);
                    $info .= "<pre>WE SENT OTP TO YOUR PHONE</pre>";
                    $info .= "<a href='/index.php'>Login</a>";
                } catch (\Throwable $th) {
                    throw $th;
                }
            } else {
                $info .= "<pre>OTP is not expired</pre>";
                $info .= "<a href='/index.php'>Login</a>";
            }
        }
    } else {
        $info .= "<pre>Phone Number is not exits</pre>";
    }
}

?>

<!DOCTYPE html>
<link rel="stylesheet" href="./static/css/bootstrap.min.css" crossorigin="anonymous">
<script src="./static/js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="./static/js/popper.min.js" crossorigin="anonymous"></script>
<script src="./static/js/bootstrap.min.js" crossorigin="anonymous"></script>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE OTP</title>
</head>

<body>
    <div class="container" style="margin-top: 10%">
        <form action="#" method="post">
            <h1>Please provide your phone number</h1>
            <div class="form-outline mb-4">
                <input type="text" class="form-control" name="phone">
            </div>
            <button type="submit" value="Submit" class="btn btn-primary btn-block mb-4">Submit</button>
        </form>
        <div class="text-center">
            <?php echo $info ?>
        </div>
    </div>
</body>

</html>