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
    <title>Book</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
            <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Users
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ret = "SELECT * FROM embervehicles";
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
                                        <td>
                                            <a href="UserConfirmBooking.php?v_id=<?php echo $row->v_id;?>" class="badge badge-success">Book</a>
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