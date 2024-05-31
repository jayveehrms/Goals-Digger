<?php 
    include("..\PhpHandler\DBconnect.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['addVehicle'])) {
            $v_name = mysqli_real_escape_string($conn, $_POST['v_name']);
            $v_reg_no = mysqli_real_escape_string($conn, $_POST['v_reg_no']);
            $v_pass_no = mysqli_real_escape_string($conn, $_POST['v_pass_no']);
            $v_type = mysqli_real_escape_string($conn, $_POST['v_type']);
    
                                
            $checkVehicle = "SELECT * FROM embervehicles WHERE v_name = '$v_name'";
            $verifyResult = mysqli_query($conn, $checkVehicle);
    
            if(mysqli_num_rows($verifyResult) > 0) {
                //To be modified, for when the vehicle already exists in the database
                $maxBookingsReached = true;
    
            } else {
    
                $insertNewVehicle = "INSERT INTO embervehicles (v_name, v_reg_no, v_pass_no, v_type)
                                VALUES ('$v_name', '$v_reg_no', '$v_pass_no', '$v_type')";
    
                if (mysqli_query($conn, $insertNewVehicle)) {
                    header("Location: AdminDashBoard.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
    
    
            }
            
    
    
        }


        if (isset($_POST['maxBadge'])) {
            header("Location: AdminDashBoard.php");
            exit();
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="..\css\checkverify.css">
    <link rel="stylesheet" href="..\css\wrongverify.css">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>
<?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            <div class="card">
                <div class="card-header">
                New Vehicle
                </div>
                <div class="card-body">
                
                <form method ="POST"> 
                    <div class="form-group">
                        <label>Vehicle name</label>
                        <input type="text" required name="v_name">
                    </div>

                    <div class="form-group">
                        <label>Registration No.</label>
                        <input type="text" name="v_reg_no">
                    </div>

                    <div class="form-group">
                        <label>Max Passenger Seat</label>
                        <input id="select" type="number" name="v_pass_no">
                    </div>

                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <input type="text" name="v_type" placeholder="VAN, SUV, BUS, etc..">
                    </div>

                    <button type="submit" name="addVehicle">Add Vehicle</button>
                </form>
                
                </div>
            </div>
        </div>
    </div>

    <div class="popup" id="maxBookingsPopup">
        <form method="POST">
            <img src="../images/veriPIE Images/close.gif">
            <h2>Hey!</h2>
            <p>We already have this vehicle silly!</p>
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