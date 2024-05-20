<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $userID = $_SESSION['userID'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['confirmBooking'])) {

            $matchUser = "SELECT * FROM emberusers WHERE user_id = '$userID'";
            $matchResult = mysqli_query($conn, $matchUser);
            $userMatch = mysqli_fetch_assoc($matchResult);

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

            $sqlConfirm = "INSERT INTO bookinglist (user_id, username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time)
                          VALUES ('$getMatchId', '$getMatchName', '$getMatchEmail', '$getMatchContact', '$setPrefVechicle', '$setPLocation', '$setDestination', '$set_travel_date_time')";
            
            try{

                if(mysqli_query($conn, $sqlConfirm)) {
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
    <title>Confirm Bookings</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
            <div class="card">
                    <div class="card-header">
                    Update Vehicle
                    </div>
                    <div class="card-body">
                        <?php
                            $aid = $_GET['v_id'];
                            $ret ="SELECT * FROM embervehicles WHERE v_id=?";
                            $stmt = $conn->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while($row=$res->fetch_object()){

                        ?>
                            <form method ="POST"> 
                                <div class="form-group">
                                    <label>Vehicle Name</label>
                                    <input type="text" readonly value="<?php echo $row->v_name;?>" name="vName">
                                </div>
                            
                                <div class="form-group">
                                    <label>Registered Number</label>
                                    <input type="text" disabled value="<?php echo $row->v_reg_no;?>"  name="vRegNo">
                                </div>
                                <div class="form-group">
                                    <label>Vehicle Type</label>
                                    <input type="text" disabled value="<?php echo $row->v_type;?>"  name="vType">
                                </div>
                                <div class="form-group">
                                    <label>Passenger Seats</label>
                                    <input type="text" disabled value="<?php echo $row->v_pass_no;?>"  name="vSeats">
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
                                    <label>Data and Time of Departure</label>
                                    <input type="date"  name="bdate">
                                    <input type="time" name="btime">
                                </div>
                                

                                <button type="submit" name="confirmBooking" class="btn btn-success">Confirm</button>
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