<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $userID = $_SESSION['userID'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['cancelBooking'])) {

            $cancelBook = "Cancelled";
            $getVID = mysqli_real_escape_string($conn, $_POST['vehID']);

            $matchBooking = "UPDATE bookinglist SET status = '$cancelBook' WHERE user_id = '$getVID'";

            try{

                if(mysqli_query($conn, $matchBooking)) {

                    header("Location: UserViewBookings.php");

                } else {
                    echo "Error: " . mysqli_error($conn);


                }



            } catch(mysqli_sql_exception $e) {
                
                echo "Error: Something happened";
            }


        }


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Booking</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <div class="card">
                    <div class="card-header">
                    Cancel Booking
                    </div>
                    <div class="card-body">
                    <!--Add User Form-->
                    <?php
                        $ret="SELECT * FROM bookinglist WHERE user_id='$userID'";
                        $matchCancel = mysqli_query($conn, $ret);
                        while($row = mysqli_fetch_assoc($matchCancel)){

                    ?>
                    <form method ="POST"> 
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" hidden value="<?php echo $row['user_id'];?>" name="vehID">
                            <input type="text" readonly value="<?php echo $row['username'];?>" required name="cName">
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" readonly value="<?php echo $row['email'];?>" name="cEmail">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" readonly value="<?php echo $row['mobile_number'];?>" name="cPhone">
                        </div>
                        
                        <div class="form-group">
                            <label>Preferred Vehicle</label>
                            <input type="text" readonly value="<?php echo $row['preferred_vehicle'];?>" name="cVehicle">
                        </div>

                        <div class="form-group">
                            <label>Pickup Location</label>
                            <input type="text" readonly placeholder="<?php echo $row['pickup_location'];?>" name="cPLocation">
                        </div>

                        <div class="form-group">
                            <label>Destination</label>
                            <input type="text" readonly placeholder="<?php echo $row['destination'];?>" name="cDestination">
                        </div>

                    
                        <div class="form-group">
                            <label>Booking Date</label>
                            <input type="text" readonly placeholder="<?php echo $row['travel_date_time'];?>" name="cBDate">
                        </div>

                        <div class="form-group">
                            <label>Booking Status</label>
                            <input type="text" readonly placeholder="<?php echo $row['status'];?>" name="cStatus">
                        </div>

                        

                        <button type="submit" name="cancelBooking" class="btn btn-danger">Cancel Booking</button>
                    </form>
                    <?php 
                    
                        }
                        
                    ?>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>