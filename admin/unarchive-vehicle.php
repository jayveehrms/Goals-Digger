<?php 
    include("..\PhpHandler\DBconnect.php");

    if(isset($_POST['updateVehicle'])) {
        $v_id = mysqli_real_escape_string($conn, $_GET['v_id']);
        $v_name = mysqli_real_escape_string($conn, $_POST['vName']);
        $v_reg_no = mysqli_real_escape_string($conn, $_POST['vRegNo']);
        $v_type = mysqli_real_escape_string($conn, $_POST['vType']);
        $v_status = mysqli_real_escape_string($conn, $_POST['vStatus']);

        $queryUpdate = "UPDATE embervehicles SET v_status='$v_status' WHERE v_id='$v_id'";
        $vUpdate = mysqli_query($conn, $queryUpdate);

        if ($vUpdate) {
            header("Location: AdminManageVehicle.php");
        } else {
            echo "Something WRONG!";
        }
      


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <title>Unarchive Vehicle</title>
</head>
<body>
    <?php include("AdminSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <?php include("AdminNav.php"); ?>
            <div class="card">
                    <div class="card-header">
                    Unarchive Vehicle
                    </div>
                    <div class="card-body">
                        <?php
                            $aid=$_GET['v_id'];
                            $ret="SELECT * FROM embervehicles WHERE v_id=?";
                            $stmt= $conn->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute() ;
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                        {
                        ?>
                            <form method ="POST"> 
                                <div class="form-group">
                                    <label>Vehicle Name</label>
                                    <input type="text" value="<?php echo $row->v_name;?>" required name="vName" disabled>
                                </div>
                            
                                <div class="form-group">
                                    <label>Registered Number</label>
                                    <input type="text"  value="<?php echo $row->v_reg_no;?>"  name="vRegNo" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Vehicle Type</label>
                                    <input type="text" value="<?php echo $row->v_type;?>"  name="vType" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status</label>
                                        <select id="select" name="vStatus">
                                            <option  value="Available">Available</option>
                                            <option  value="Booked">Booked</option>
                                        </select>
                                </div>

                                <button type="submit" name="updateVehicle" class="btn badge-warning"><b>Unarchive</b></button>
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