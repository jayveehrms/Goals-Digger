<?php 
    include("..\PhpHandler\DBconnect.php");

    if (isset($_POST['disapprove'])) {
        $aid_id = mysqli_real_escape_string($conn, $_GET['aid_id']);
        
        $sql = "SELECT * FROM bookinglist WHERE aid_id='$aid_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $setPVehicle = mysqli_fetch_assoc($result);
            $getPVehicle = $setPVehicle['preferred_vehicle'];
            $getBUserId = $setPVehicle['book_id'];

            $getUser = "SELECT * FROM emberusers WHERE user_id = '$getBUserId'";
            $queryUser = mysqli_query($conn, $getUser);
            $fetchBadge = mysqli_fetch_assoc($queryUser);

            if ($fetchBadge['loyalty_badge'] > 0 && $setPVehicle['status'] == 'Approved') {
                $updateBadge = "UPDATE emberusers SET loyalty_badge = loyalty_badge - 1 WHERE user_id = '$getBUserId'";
                mysqli_query($conn, $updateBadge);

            }

            $sqlUpdate = "UPDATE bookinglist SET status='Disapproved' WHERE aid_id='$aid_id'";

            if (mysqli_query($conn, $sqlUpdate)) {
                $to = $setPVehicle['email'];
                $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                $subject = "Booking Disapproved!";
                $message = mysqli_real_escape_string($conn, $_POST['reason']);
                mail($to, $subject, $message, $headers);

                header("Location: AdminDashboard.php");
                exit();

            } else {
                echo "Error disapproving booking: " . mysqli_error($conn);

            }
        } else {
            echo "No record found.";

        }
    }

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <title>Disapprove</title>
</head>
<body>
    <?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            <div class="card">
                <div class="card-header">
                    Disapprove Booking
                </div>
                <div class="card-body">
                    <?php
                    $aid = $_GET['aid_id'];
                    $ret = "SELECT * FROM bookinglist WHERE aid_id=?";
                    $stmt = $conn->prepare($ret);
                    $stmt->bind_param('i', $aid);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    if ($res->num_rows > 0) {
                        $row = $res->fetch_object();
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" readonly value="<?php echo $row->username; ?>" required name="username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" readonly value="<?php echo $row->email; ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" readonly value="<?php echo $row->mobile_number; ?>" name="contact">
                        </div>
                        <div class="form-group">
                            <label>Preferred Vehicle</label>
                            <input type="text" readonly value="<?php echo $row->preferred_vehicle; ?>" name="prefVehicle">
                        </div>
                        <div class="form-group">
                            <label>Pickup Location</label>
                            <input type="text" readonly value="<?php echo $row->pickup_location; ?>" name="pickupLoc">
                        </div>
                        <div class="form-group">
                            <label>Destination</label>
                            <input type="text" readonly value="<?php echo $row->destination; ?>" name="destination">
                        </div>
                        <div class="form-group">
                            <label>Booking Date</label>
                            <input type="text" readonly value="<?php echo $row->travel_date_time; ?>" name="bookDate">
                        </div>
                        <div class="form-group">
                            <label>Booking Status</label>
                            <input type="text" readonly value="<?php echo $row->status; ?>" name="bStatus">
                        </div>
                        <div class="form-group">
                            <label>Reason for Disapproval</label>
                            <textarea name="reason" cols="160" rows="10"></textarea>
                        </div>
                        <button type="submit" name="disapprove" class="btn btn-danger">Disapprove Booking</button>
                    </form>
                    <?php
                    } else {
                        echo "No booking found with the provided ID.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
