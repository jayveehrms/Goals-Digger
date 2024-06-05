<?php 
    include("..\PhpHandler\DBconnect.php");

    $bookingData = array();
  
    $bookingListResult = $conn->query("SELECT DATE_FORMAT(time_stamp, '%M') AS month, COUNT(*) AS count FROM bookinglist GROUP BY MONTH(time_stamp)");
    while ($row = $bookingListResult->fetch_assoc()) {
        $bookingData[$row['month']] = $row['count'];
    }
    
    
    $guestBookingsResult = $conn->query("SELECT DATE_FORMAT(time_stamp, '%M') AS month, COUNT(*) AS count FROM guest_bookings GROUP BY MONTH(time_stamp)");
    while ($row = $guestBookingsResult->fetch_assoc()) {
        if (isset($bookingData[$row['month']])) {
            $bookingData[$row['month']] += $row['count'];
        } else {
            $bookingData[$row['month']] = $row['count'];
        }
    }

    
    $labels = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $values = array();

    foreach ($labels as $month) {
        $count = isset($bookingData[$month]) ? $bookingData[$month] : 0;
        $values[] = $count;
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="adminCss\adminstyles.css">
    <link rel="stylesheet" href="adminCss\adminNavStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<body>
    
    <?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>

            <div class="card-container">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <?php
                        $result ="SELECT count(*) FROM emberusers";
                        $stmt = $conn->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($user);
                        $stmt->fetch();
                        $stmt->close();
                        ?>
                        <div class="mr-5"><span class="badge badge-light"><?php echo $user;?></span> Users</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="AdminViewUsers.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>

                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-bus"></i>
                        </div>
                        <?php
                        $result ="SELECT count(*) FROM embervehicles";
                        $stmt = $conn->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($vehicle);
                        $stmt->fetch();
                        $stmt->close();
                        ?>
                        <div class="mr-5"><span class="badge badge-light"><?php echo $vehicle;?></span> Vehicles</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="AdminManageVehicle.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>

                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-address-book"></i>
                        </div>
                        <?php
                        $result ="SELECT 
                                  (SELECT COUNT(*) FROM bookinglist WHERE status = 'Approved' OR status = 'Pending') 
                                  + 
                                  (SELECT COUNT(*) FROM guest_bookings WHERE status = 'Approved' OR status = 'Pending') 
                                  AS total_approved_or_pending;";
                        $stmt = $conn->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($book);
                        $stmt->fetch();
                        $stmt->close();
                        ?>
                        <div class="mr-5"><span class="badge badge-light"><?php echo $book;?></span> Bookings</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="AdminManageBookings.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div>
              <canvas id="myChart" height="100"></canvas>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      
      const ctx = document.getElementById('myChart').getContext('2d');

      const d = new Date();
      const currentYear = d.getFullYear(); 
      new Chart(ctx, {
        type: 'bar', 
        data: {
          labels: <?php echo json_encode($labels); ?>, 
          datasets: [{
            label: 'Bookings(' + currentYear + ')', 
            data: <?php echo json_encode($values); ?>, 
            backgroundColor: 'rgba(255, 196, 60, 0.8)', 
            borderColor: 'rgba(234, 163, 0, 0.8)', 
            borderWidth: 1 
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true, 
              suggestedMax: 10 
            }
          }
        }
      });
    </script>
    
</body>
</html>
