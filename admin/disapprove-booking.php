<?php 
    include("..\PhpHandler\DBconnect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("AdminSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <div class="card">
                    <div class="card-header">
                    Approve Booking
                    </div>
                    <div class="card-body">
                    <!--Add User Form-->
                    <?php
                        $aid=$_GET['user_id'];
                        $ret="select * from bookinglist where user_id=?";
                        $stmt= $conn->prepare($ret) ;
                        $stmt->bind_param('i',$aid);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                    {
                    ?>
                    <form method ="POST"> 
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" readonly value="<?php echo $row->username;?>" required name="username">
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" readonly value="<?php echo $row->email;?>" name="email">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" readonly value="<?php echo $row->mobile_number;?>" name="contact">
                        </div>
                        
                        <div class="form-group">
                            <label>Preferred Vehicle</label>
                            <input type="email" readonly value="<?php echo $row->preferred_vehicle;?>" name="prefVehicle">
                        </div>

                        <div class="form-group">
                            <label>Pickup Location</label>
                            <input type="email" readonly value="<?php echo $row->pickup_location;?>" name="pickupLoc">
                        </div>

                        <div class="form-group">
                            <label>Destination</label>
                            <input type="email" readonly value="<?php echo $row->destination;?>" name="destination">
                        </div>

                    
                        <div class="form-group">
                            <label>Booking Date</label>
                            <input type="text" readonly value="<?php echo $row->travel_date_time;?>"   name="bookDate">
                        </div>

                        <div class="form-group">
                            <label>Booking Status</label>
                            <input type="text" readonly value="<?php echo $row->status;?>"  name="bStatus">
                        </div>

                        <div class="form-group">
                            <label>Reason for Disapproval</label>
                            <textarea name="reason"></textarea>
                        </div>

                        

                        <button type="submit" name="disapprove" class="btn btn-danger">Disapprove Booking</button>
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
<?php 
    if(isset($_POST['disapprove']))
    {
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

        $sql = "SELECT * FROM bookinglist WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $sqlUpdate = "UPDATE bookinglist SET status='Disapproved' WHERE user_id='$user_id'";
            $rows = mysqli_fetch_assoc($result);
            if(mysqli_query($conn, $sqlUpdate)) {
                echo"<br> Record Deleted";
 
                $to = $rows['email'];
                $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                $subject = "Booking Disapproved!";
                $message = mysqli_real_escape_string($conn, $_POST['reason']);
               
                mail($to, $subject, $message, $headers);


            } else {
                echo "Error Deleted record." . mysqli_errno($conn);

            }


        }else {
            echo "No Record Exist";

        }

    }



?>