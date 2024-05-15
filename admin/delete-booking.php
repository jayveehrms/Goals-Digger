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
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" readonly value="<?php echo $row->username;?>" required class="form-control" id="exampleInputEmail1" name="username">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" readonly class="form-control" value="<?php echo $row->email;?>" id="exampleInputEmail1" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact</label>
                            <input type="text" readonly class="form-control" value="<?php echo $row->mobile_number;?>" id="exampleInputEmail1" name="contact">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Preferred Vehicle</label>
                            <input type="email" readonly value="<?php echo $row->preferred_vehicle;?>" class="form-control" name="prefVehicle">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Pickup Location</label>
                            <input type="email" readonly value="<?php echo $row->pickup_location;?>" class="form-control" name="pickupLoc">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Destination</label>
                            <input type="email" readonly value="<?php echo $row->destination;?>" class="form-control" name="destination">
                        </div>

                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Booking Date</label>
                            <input type="text" readonly value="<?php echo $row->travel_date_time;?>" class="form-control"   name="bookDate">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Booking Status</label>
                            <input type="text" readonly value="<?php echo $row->status;?>" class="form-control" id="exampleInputEmail1"  name="bStatus">
                        </div>

                        

                        <button type="submit" name="delete_booking" class="btn btn-danger">Delete Booking</button>
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
    if(isset($_POST['delete_booking']))
    {
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

        $sql = "SELECT * FROM bookinglist WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM bookinglist WHERE user_id='$user_id'";
            if(mysqli_query($conn, $sql)) {
                echo"<br> Record Deleted";

            } else {
                echo "Error Deleted record." . mysqli_errno($conn);

            }


        }else {
            echo "No Record Exist";

        }
        mysqli_close($conn);

    }



?>