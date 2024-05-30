<?php 
    include("..\PhpHandler\DBconnect.php");

    if(isset($_POST['archiveMe'])) {
        $v_id = mysqli_real_escape_string($conn, $_GET['v_id']);
        $v_name = mysqli_real_escape_string($conn, $_POST['vName']);
        $v_reg_no = mysqli_real_escape_string($conn, $_POST['vRegNo']);
        $v_type = mysqli_real_escape_string($conn, $_POST['vType']);
        $fault = mysqli_real_escape_string($conn, $_POST['fault']);

        $queryUpdate = "UPDATE embervehicles SET v_status='Archived', fault_archive='$fault' WHERE v_id='$v_id'";
        $vUpdate = mysqli_query($conn, $queryUpdate);

        if ($vUpdate) {
            header("Location: AdminManageVehicle.php");
        } else {
            echo "Something WRONG!";
        }
        mysqli_close($vUpdate);


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <title>Update Vehicle</title>
</head>
<body>
    <?php include("AdminSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <?php include("AdminNav.php"); ?>
            <div class="card">
                    <div class="card-header">
                    Update Vehicle
                    </div>
                    <div class="card-body">
                        <?php
                            $aid=$_GET['v_id'];
                            $ret="SELECT * FROM embervehicles WHERE v_id=?";
                            $stmt= $conn->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute() ;//ok
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
                                    <label>Reason/Fault</label>
                                    <textarea name="fault" cols="170" rows="10"></textarea>
                                </div>
                    

                                <button type="submit" name="archiveMe" class="btn badge-warning"><b>Archive Vehicle</b></button>
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