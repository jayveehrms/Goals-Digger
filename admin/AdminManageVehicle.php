<?php 
    include("..\PhpHandler\DBconnect.php");

    if(isset($_POST['delete'])){
        $v_id = mysqli_real_escape_string($conn, $_POST['vID']);
        $sqlDeleteVehicle = "DELETE FROM embervehicles WHERE v_id='$v_id'";
        if (mysqli_query($conn, $sqlDeleteVehicle)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();

        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vehicles</title>
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
                        <i class="fas fa-table"></i> Vehicles
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Registration No.</th>
                                        <th>Passenger Seats</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ret = "SELECT * FROM embervehicles WHERE v_status='Available' OR v_status='Booked'";
                                        $stmt = $conn->prepare($ret);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row->v_id?></td>
                                        <td><?php echo $row->v_name?></td>
                                        <td><?php echo $row->v_reg_no; ?></td>
                                        <td><?php echo $row->v_pass_no; ?></td>
                                        <td><?php 
                                                if($row->v_status == "Available"){ 
                                                    echo '<span class = "badge badge-success">'.$row->v_status.'</span>'; 
                                                } else { 
                                                    echo '<span class = "badge badge-danger">'.$row->v_status.'</span>';
                                                }?>
                                        </td>
                                        <td>
                                            <a href="update-vehicle.php?v_id=<?php echo $row->v_id;?>" class="badge badge-success">Update</a>
                                            <a href="archive-vehicle.php?v_id=<?php echo $row->v_id;?>" class="badge badge-warning">Archive</a>
                                            </i>
                                        </td>
                                    </tr>
                                    <?php $cnt++; } ?>
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