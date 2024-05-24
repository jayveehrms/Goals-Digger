<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $adminEmail = $_SESSION['adminEmail'];

    /*
        Note* 
        next feature to add would be the loyalty for regular and new users
        limit the amount of bookings a user can add based on their loyalty badges and status rank
        /For other features look into our group chat or ask team members

    */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>
    <?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Bookings
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = "SELECT * FROM bookinglist WHERE status = 'Approved' OR status = 'Pending' OR status = 'Disapproved' OR status = 'Cancelled'";
                                $stmt = $conn->prepare($ret);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row->book_id; ?></td>
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

                                            } else if ($row->status == "Disapproved"){
                                                echo '<span class="badge badge-dark">' . $row->status . '</span>';

                                            } else if ($row->status == "Cancelled"){
                                                echo '<span class="badge badge-warning">' . $row->status . '</span>';
                                            }else { 
                                                echo '<span class="badge badge-success">' . $row->status . '</span>'; 
                                            }
                                            ?>
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