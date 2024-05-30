<?php 
    include("..\PhpHandler\DBconnect.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage bookings</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
<?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Guest Bookings
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Preferred Vehicle</th>
                                        <th>Pickup Location</th>
                                        <th>Destination</th>
                                        <th>Travel Date/Time</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM guest_bookings WHERE status = 'Pending' OR status = 'Disapproved' OR status = 'Cancelled' OR status = 'Approved'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    $cnt = 1;
                                    
                                    while ($row = $res->fetch_object()) {
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row->book_id;?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->mobile_number; ?></td>
                                            <td><?php echo $row->preferred_vehicle; ?></td>
                                            <td><?php echo $row->pickup_location; ?></td>
                                            <td><?php echo $row->destination; ?></td>
                                            <td><?php echo $row->travel_date_time; ?></td>
                                            <td>
                                                <?php 
                                                if ($row->status == "Pending") { 
                                                    echo '<span class="badge badge-warning">' . $row->status . '</span>'; 
                                                } else if ($row->status == "Disapproved") {
                                                    echo '<span class="badge badge-dark">' . $row->status . '</span>';
                                                } else if ($row->status == "Cancelled") {
                                                    echo '<span class="badge badge-warning">' . $row->status . '</span>';
                                                } else { 
                                                    echo '<span class="badge badge-success">' . $row->status . '</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?php 

                                                if($row->status == "Pending") {

                                            ?>
                                                <a href="AdminGuestApprove.php?aid_id=<?php echo $row->book_id;?>" class="badge badge-success"><i class = "fa fa-check"></i> Approve</a>
                                                <a href="AdminGuestDisapprove.php?aid_id=<?php echo $row->book_id;?>" class="badge badge-danger"><i class ="fa fa-trash"></i> Disapprove</a>
                                            <?php 
                                                } else if ($row->status == "Approved"){

                                            ?>
                                                <a href="disapprove-booking.php?aid_id=<?php echo $row->book_id;?>" class="badge badge-danger"><i class ="fa fa-trash"></i> Disapprove</a>

                                            <?php 
                                                }

                                            ?>
                                            </td>
                                        </tr>
                                    <?php 
                                        $cnt++; 
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

<?php

    /*
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ApproveB'])) {    
            $guestBookId = $getBookId;

            $approveGuest = "UPDATE guest_bookings SET status = 'Approved' WHERE book_id = '$guestBookId'";
            
            if (mysqli_query($conn, $approveGuest)) {
                $newVStatus = "Booked";
                $updateVehicle = "UPDATE embervehicles SET v_status = '$newVStatus' WHERE v_name = '$getprefVehicle'";
                mysqli_query($conn, $updateVehicle);

                $to = $getGuestEmail;
                $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                $subject = "Booking Approved!";
                $message = "Thank you for booking!";
                mail($to, $subject, $message, $headers);

            } else {
                echo "Error approving booking: " . mysqli_error($conn);
            }

        
        } else if (isset($_POST['DisapproveB'])) {
            $guestBookId = $getBookId;

            $approveGuest = "UPDATE guest_bookings SET status = 'Disapproved' WHERE book_id = '$guestBookId'";
            
            if (mysqli_query($conn, $approveGuest)) {

                $to = $getGuestEmail;
                $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                $subject = "Booking Disapproved!";
                $message = "Sorry for we have disapproved your booking <br> You can contact us for more concerns <b>09999999</b>";
                mail($to, $subject, $message, $headers);

            } else {
                echo "Error approving booking: " . mysqli_error($conn);
            }

        }

    }

    */
?>