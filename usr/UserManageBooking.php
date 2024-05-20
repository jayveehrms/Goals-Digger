<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $userID = $_SESSION['userID'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
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
                                    <th>Departure Date/Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                    <td><?php echo $row['travel_date_time'];?></td>
                                    <td><?php 
                                            if($row['status'] == "Pending"){ 
                                                echo '<span class = "badge badge-warning">'.$row['status'].'</span>'; 
                                            } else { 
                                                echo '<span class = "badge badge-success">'.$row['status'].'</span>';
                                            }?>
                                    </td>
                                    <td>
                                        <a href="UserDeleteBooking.php?user_id=<?php echo $row['user_id'];?>" class="badge badge-danger"><i class ="fa fa-trash"></i> Cancel</a>
                                        </i>                  
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