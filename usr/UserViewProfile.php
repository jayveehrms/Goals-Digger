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
    <title>Profile</title>
    <link rel="stylesheet" href="userCss\userStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
            <?php
                $ret="SELECT * FROM emberusers WHERE user_id='$userID'";
                $matchProfile = mysqli_query($conn, $ret);
                while($row = mysqli_fetch_assoc($matchProfile)){

            ?>
            <div class="card col-md-8" >
                <div class="card-body">
                    <h3 class="card-title"><?php echo $row['username'];?></h3>
                </div>
                <ul>
                    <li><b>User ID:</b> <?php echo $row['user_id'];?></li>
                    <li><b>Email Address:</b> <?php echo $row['email'];?></li>
                    <li><b>Contact:</b> <?php echo $row['contact'];?></li>
                    <li><b>Loyalty Badge/s:</b> <?php echo $row['loyalty_badge'];?></li>
                </ul>
                <div class="card-body">
                    <a href="#"><i class ="fa fa-user-edit"></i> Update Profile</a>
                    <a href="#"><i class ="fa fa-key"></i> Change Password</a>
                </div>
            </div>
        <?php 
            }
            
        ?>
            </div>
        </div>
</body>
</html>


