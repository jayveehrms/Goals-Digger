<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="userCss\userStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>

    <div class="side-bar">
        <div class="menu">
            <div class="item"><a href="UserDashBoard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-fw fa-users"></i>My Profile<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="UserViewProfile.php" class="sub-item">View</a>
                </div>
            </div>
            <div class="item">
                <a href="#" class="sub-btn"><i class="fas fa-fw fa-book"></i>Bookings<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="UserBookVehicle.php" class="sub-item">Add</a>
                    <a href="UserViewBookings.php" class="sub-item">View</a>
                    <a href="UserManageBooking.php" class="sub-item">Manage</a>
                </div>
            </div>
        </div>

    </div>
    
    <script src="userJs\user_dashboard.js"></script>

</body>
</html>