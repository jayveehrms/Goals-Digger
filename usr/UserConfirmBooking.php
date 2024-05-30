<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $userID = $_SESSION['userID'];

    $maxBookingsReached = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['confirmBooking'])) {
            $matchUser = "SELECT * FROM emberusers WHERE user_id = '$userID'";
            $matchResult = mysqli_query($conn, $matchUser);
            $userMatch = mysqli_fetch_assoc($matchResult);

            $countBookings = "SELECT COUNT(*) AS RowCount FROM bookinglist WHERE book_id = '$userID'";
            $queryCount = mysqli_query($conn, $countBookings);
            $rowCount = mysqli_fetch_assoc($queryCount);

            $getMatchId = $userMatch['user_id'];
            $getMatchName = $userMatch['username'];
            $getMatchEmail = $userMatch['email'];
            $getMatchContact = $userMatch['contact'];

            $getvID = $_GET['v_id'];
            $setPrefVechicle = $_POST['vName'];
            $setPLocation = mysqli_real_escape_string($conn, $_POST['pLocation']);
            $setDestination = mysqli_real_escape_string($conn, $_POST['destination']);
            $travel_date = mysqli_real_escape_string($conn, $_POST['bdate']);
            $travel_time = mysqli_real_escape_string($conn, $_POST['btime']);
            $set_travel_date_time = $travel_date . ' ' . $travel_time;

            if ($userMatch['loyalty_badge'] == 0 || $userMatch['loyalty_badge'] < 3) {
                if ($rowCount['RowCount'] >= 1) {
                    $maxBookingsReached = true;
                } else {
                    $sqlConfirm = "INSERT INTO bookinglist (book_id, username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time)
                                VALUES ('$getMatchId', '$getMatchName', '$getMatchEmail', '$getMatchContact', '$setPrefVechicle', '$setPLocation', '$setDestination', '$set_travel_date_time')";
                    try {
                        mysqli_query($conn, $sqlConfirm);
                        $to = $getMatchEmail;
                        $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                        $subject = "Book Success!";
                        $message = "You just booked!<br> Please wait for us to approve your bookings <br> for more concern please contact us #099999";
                        mail($to, $subject, $message, $headers);
                        header("Location: UserDashBoard.php");
                        exit();
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: Something happened";
                    }
                }
            } else if ($userMatch['loyalty_badge'] == 3) {
                if ($rowCount['RowCount'] >= 5) {
                    $maxBookingsReached = true;
                } else {
                    $sqlConfirm = "INSERT INTO bookinglist (book_id, username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time)
                                VALUES ('$getMatchId', '$getMatchName', '$getMatchEmail', '$getMatchContact', '$setPrefVechicle', '$setPLocation', '$setDestination', '$set_travel_date_time')";
                    try {
                        if (mysqli_query($conn, $sqlConfirm)) {
                            $to = $getMatchEmail;
                            $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                            $subject = "Book Success!";
                            $message = "You just booked!<br>";
                            mail($to, $subject, $message, $headers);
                            header("Location: UserDashBoard.php");
                            exit();
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: Something happened";
                    }
                }
            }
        }

        if (isset($_POST['maxBadge'])) {
            header("Location: UserBookVehicle.php");
            exit();
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userCss/userView.css">
    <link rel="stylesheet" href="../css/checkverify.css">
    <link rel="stylesheet" href="../css/wrongverify.css">
    <title>Confirm Bookings</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("UserNav.php"); ?>
            <div class="card">
                <div class="card-header">
                    Book Vehicle
                </div>
                <div class="card-body">
                    <?php
                        $aid = $_GET['v_id'];
                        $ret ="SELECT * FROM embervehicles WHERE v_id=?";
                        $stmt = $conn->prepare($ret);
                        $stmt->bind_param('i', $aid);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        while ($row = $res->fetch_object()) {
                    ?>
                    <form method="POST"> 
                        
                        <div class="form-group">
                            <label>Vehicle Name</label>
                            <input type="text" readonly value="<?php echo $row->v_name; ?>" name="vName">
                        </div>
                        <div class="form-group">
                            <label>Registered Number</label>
                            <input type="text" disabled value="<?php echo $row->v_reg_no; ?>" name="vRegNo">
                        </div>
                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <input type="text" disabled value="<?php echo $row->v_type; ?>" name="vType">
                        </div>
                        <div class="form-group">
                            <label>Passenger Seats</label>
                            <input type="text" disabled value="<?php echo $row->v_pass_no; ?>" name="vSeats">
                        </div>
                        <div class="form-group">
                            <label>Pick up location</label>
                            <input type="text" required name="pLocation">
                        </div>
                        <div class="form-group">
                            <label>Destination</label>
                            <input type="text" required name="destination">
                        </div>
                        <div class="form-group">
                            <label>Date of Departure</label>
                            <input id="departureDate" type="date" name="bdate" required>
                        </div>
                        <div class="form-group">
                            <label>Time of Departure</label>
                            <input type="time" name="btime" required>
                        </div>
                        
                        <button type="submit" name="confirmBooking" class="btn btn-outline-success">Confirm</button>
                    </form>
                    <?php 
                        } 
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

    
    <div class="popup" id="maxBookingsPopup">
        <form method="POST">
            <img src="../images/veriPIE Images/close.gif">
            <h2>Sorry!</h2>
            <p>You have reached the maximum number of bookings allowed.</p>
            <button type="submit" onclick="closePopup('maxBookingsPopup')" id="btnMaxBookings" name="maxBadge">OK</button>
        </form>
    </div>

    <script>
        function openPopup(popupId) {
            document.getElementById(popupId).classList.add("open-popup");
        }

        function closePopup(popupId) {
            document.getElementById(popupId).classList.remove("open-popup");
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date();

            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); 
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

            document.getElementById("departureDate").setAttribute("min", today);
        });

        <?php if ($maxBookingsReached): ?>
            document.addEventListener("DOMContentLoaded", function() {
            openPopup("maxBookingsPopup");

        });

        <?php 
            endif; 
        
        ?>
    </script>
</body>
</html>
