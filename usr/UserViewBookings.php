<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Bookings
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Vehicle</th>
                                    <th>Pickup Location</th>
                                    <th>Destination</th>
                                    <th>Departure Date/Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    $userID = $_SESSION['userID'];
                                    $ret="SELECT * FROM bookinglist WHERE user_id = '$userID'";
                                    $matchBooking = mysqli_query($conn, $ret);
                                    $cnt=1;
                                        while($row = mysqli_fetch_assoc($matchBooking))
                                        {
                                ?>
                                <tr>
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['mobile_number'];?></td>
                                    <td><?php echo $row['preferred_vehicle'];?></td>
                                    <td><?php echo $row['pickup_location'];?></td>
                                    <td><?php echo $row['destination'];?></td>
                                    <td><?php echo $row['travel_date_time'];?></td>
                                    <td><?php 
                                            if($row['status'] == "Pending"){ 
                                                echo '<span class = "badge badge-warning">'.$row['status'].'</span>'; 
                                            } else { 
                                                echo '<span class = "badge badge-success">'.$row['status'].'</span>';
                                            }?>
                                    </td>
                                </tr>

                                <?php  
                                    $cnt= $cnt + 1;
                                    }

                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    <div class="card-footer small text-muted">
                        <?php
                        date_default_timezone_set("Asia/Manila");
                        echo "Generated : " . date("h:i:sa");
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
