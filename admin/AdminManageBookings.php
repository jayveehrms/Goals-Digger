<?php 
    include("..\PhpHandler\DBconnect.php");
    $getStatus = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage bookings</title>
    <link rel="stylesheet" href="adminCss\adminstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body>
<?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            
            <div class="form-group">
                <label for="statusFilter">Filter by Status:</label>
                <select id="statusFilter" class="form-control">
                    <option value="">All</option>
                    <option value="Approved" <?php if($getStatus == 'Approved') echo 'selected'; ?>>Approved</option>
                    <option value="Disapproved" <?php if($getStatus == 'Disapproved') echo 'selected'; ?>>Disapproved</option>
                    <option value="Pending" <?php if($getStatus == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Cancelled" <?php if($getStatus == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                </select>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> <?php echo $getStatus == '' ? 'All Bookings' : 'Manage ' . $getStatus . ' Bookings'; ?>
                </div>
                <div class="card-body">
                    <button id="exportButton" class="btn btn-primary">Export to PDF</button>
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
                                    $sql = "SELECT * FROM bookinglist";
                                    if (!empty($getStatus)) {
                                        $sql .= " WHERE status = '$getStatus'";
                                    }

                                    $stmt = $conn->prepare($sql);
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
                                            <td>
                                                <?php 
                                                    if($row->status == "Pending") {
                                                ?>
                                                    <a href="approve-booking.php?aid_id=<?php echo $row->aid_id;?>" class="badge badge-success"><i class = "fa fa-check"></i> Approve</a>
                                                    <a href="disapprove-booking.php?aid_id=<?php echo $row->aid_id;?>" class="badge badge-danger"><i class ="fa fa-trash"></i> Disapprove</a>
                                                <?php 
                                                    } else if ($row->status == "Approved"){
                                                ?>
                                                    <a href="disapprove-booking.php?aid_id=<?php echo $row->aid_id;?>" class="badge badge-danger"><i class ="fa fa-trash"></i> Disapprove</a>
                                                <?php 
                                                    }
                                                ?>
                                            </i>
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
    
    <script>
        $(document).ready(function() {
            $('#statusFilter').change(function() {
                var status = $(this).val();
                window.location.href = 'AdminManageBookings.php?status=' + status;
            });

            document.getElementById('exportButton').addEventListener('click', function() {
                var element = document.getElementById('dataTable');

                var opt = {
                    margin:       0.3,
                    filename:     'Bookings-record.pdf',
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'tabloid', orientation: 'landscape' } // Use tabloid or A3 for larger size
                };

                html2pdf().from(element).set(opt).save();
            });
        });
    </script>
    
</body>
</html>
