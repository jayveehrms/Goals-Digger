<?php
include("PhpHandler\handler.php");
session_start();

$verification_successful = false;
$verification_failed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vSubmit'])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $v1 = mysqli_real_escape_string($conn, $_POST['v1']);
    $v2 = mysqli_real_escape_string($conn, $_POST['v2']);
    $v3 = mysqli_real_escape_string($conn, $_POST['v3']);
    $v4 = mysqli_real_escape_string($conn, $_POST['v4']);
    $v5 = mysqli_real_escape_string($conn, $_POST['v5']);
    $v6 = mysqli_real_escape_string($conn, $_POST['v6']);

    $verification_code = $v1 . $v2 . $v3 . $v4 . $v5 . $v6;

    $sqlUpdate = "UPDATE bookingverification SET email_verified_at = NOW() WHERE email = '$email' AND verification_code = '$verification_code'";
    $result = mysqli_query($conn, $sqlUpdate);

    if (mysqli_affected_rows($conn) > 0) {
        $verification_successful = true;
        $_SESSION['vhelp'] = $email;

        $getVerifiedUser = "SELECT * FROM bookingverification WHERE email = '$email'";
        $vResult = mysqli_query($conn, $getVerifiedUser);
        $getVal = mysqli_fetch_assoc($vResult);

        $vUsername = $getVal['username'];
        $vMobile_number = $getVal['mobile_number'];
        $vPVehicle = $getVal['preferred_vehicle'];
        $vPLocation = $getVal['pickup_location'];
        $vDestination = $getVal['destination'];
        $vTravel_date_time = $getVal['travel_date_time'];

        $insertVerified = "INSERT INTO bookinglist (username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time)
                          VALUES ('$vUsername', '$email', '$vMobile_number', '$vPVehicle', '$vPLocation', '$vDestination', '$vTravel_date_time')";
        mysqli_query($conn, $insertVerified);
    } else {
        $verification_failed = true;
    }
}

if (isset($_POST['vSuccess'])) {
    header("Location: homepage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\otpcode.css">
    <link rel="stylesheet" href="css\checkverify.css">
    <link rel="stylesheet" href="css\wrongverify.css">
    <title>OTP Verification</title>
</head>
<body class="background-color-change-4x">
    <div class="otp-card">
        <form method="POST">
            <h1>OTP Verification</h1>
            <p>Code has been sent to 
                <?php 
                    $maskedEmail = substr_replace($_SESSION['vhelp'], '******', 0, 6);
                    echo $maskedEmail; 
                ?>
            </p>
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
            <div class="otp-card-inputs">
                <input type="text" maxlength="1" autofocus name="v1">
                <input type="text" maxlength="1" name="v2">
                <input type="text" maxlength="1" name="v3">
                <input type="text" maxlength="1" name="v4">
                <input type="text" maxlength="1" name="v5">
                <input type="text" maxlength="1" name="v6">
            </div>
            <button type="submit" name="vSubmit">Verify</button>
        </form>
    </div>

    <div class="popup" id="successPopup">
        <form method="POST">
            <img src="images\veriPIE Images\check.gif">
            <h2>Thank You!</h2>
            <p>Your details have been successfully verified</p>
            <button type="submit" name="vSuccess">OK</button>
        </form>
    </div>

    <div class="popup" id="failurePopup">
        <img src="images\veriPie Images\close.gif">
        <h2>Sorry!</h2>
        <p>Your details have not been successfully verified</p>
        <button type="button" onclick="closePopup()" id="btnvWrong">OK</button>
    </div>

    <script>
        function openPopup(popupId) {
            document.getElementById(popupId).classList.add("open-popup");
        }

        function closePopup() {
            document.getElementById("failurePopup").classList.remove("open-popup");
        }

        <?php if ($verification_successful): ?>
        document.addEventListener("DOMContentLoaded", function() {
            openPopup("successPopup");
        });
        <?php elseif ($verification_failed): ?>
        document.addEventListener("DOMContentLoaded", function() {
            openPopup("failurePopup");
        });
        <?php endif; ?>
    </script>

    <script src="JsFilez\otpcode.js"></script>
</body>
</html>
