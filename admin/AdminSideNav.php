<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>

    <div class="side-bar">
        <div class="menu">
            <div class="item"><a href="AdminDashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-fw fa-users"></i>Users<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="AdminViewUsers.php" class="sub-item">View</a>
                    <a href="AdminManageUsers.php" class="sub-item">Manage</a>
                </div>
            </div>
            <div class="item">
                <a href="#" class="sub-btn"><i class="fas fa-fw fa-book"></i>Bookings<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="AdminDashboard.php" class="sub-item">View</a>
                    <a href="AdminManageBookings.php" class="sub-item">Manage</a>
                </div>
            </div>
            <div class="item">
                <a href="#" class="sub-btn"><i class="fas fa-fw fa-car"></i>Vehicle<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="AdminViewVehicles.php" class="sub-item">View</a>
                    <a href="AdminManageVehicle.php" class="sub-item">Manage</a>
                </div>
            </div>
        </div>

    </div>
    
    <script src="adminJs\admin_dashboard.js"></script>

</body>
</html>