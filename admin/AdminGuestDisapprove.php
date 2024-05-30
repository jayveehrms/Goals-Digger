<?php 
    include("..\PhpHandler\DBconnect.php");

    if (isset($_POST['disapprove_booking'])) {
        $aid_id = mysqli_real_escape_string($conn, $_GET['aid_id']);

        $sql = "SELECT * FROM guest_bookings WHERE book_id='$aid_id'";
        $result = mysqli_query($conn, $sql);
        $setPVehicle = mysqli_fetch_assoc($result);
        $getPVehicle = $setPVehicle['preferred_vehicle'];


        $sqlUpdate = "UPDATE guest_bookings SET status='Disapproved' WHERE book_id='$aid_id'";

            if (mysqli_query($conn, $sqlUpdate)) {

                $to = $setPVehicle['email'];
                $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                $subject = "Booking Disapproved!";
                $message = "Sorry for we have disapproved your booking <br> You can contact us for more concerns <b>09999999</b>";
                mail($to, $subject, $message, $headers);

                header("Location: AdminDashboard.php");
                exit();

            } else {
                    echo "Error disapproving booking: " . mysqli_error($conn);
            }
            
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <title>Document</title>
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
                    if ($aid) {
                        $ret = "SELECT * FROM guest_bookings WHERE book_id=?";
                        $stmt = $conn->prepare($ret);
                        $stmt->bind_param('i', $aid);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($res->num_rows > 0) {
                            $row = $res->fetch_object();
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->username); ?>" required class="form-control" id="exampleInputEmail1" name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($row->email); ?>" id="exampleInputEmail1" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact</label>
                            <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($row->mobile_number); ?>" id="exampleInputEmail1" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Preferred Vehicle</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->preferred_vehicle); ?>" class="form-control" name="prefVehicle">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pickup Location</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->pickup_location); ?>" class="form-control" name="pickupLoc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Destination</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->destination); ?>" class="form-control" name="destination">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Booking Date</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->travel_date_time); ?>" class="form-control" name="bookDate">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Booking Status</label>
                            <input type="text" readonly value="<?php echo htmlspecialchars($row->status); ?>" class="form-control" id="exampleInputEmail1" name="bStatus">
                        </div>
                        <button type="submit" name="disapprove_booking" class="btn badge-danger">Disapprove booking</button>
                    </form>
                    <?php
                        } else {
                            echo "No booking found with the provided ID.";
                        }
                    } else {
                        echo "Invalid booking ID.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

