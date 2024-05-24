<?php 
    include("..\PhpHandler\DBconnect.php");
    session_start();
    $userID = $_SESSION['userID'];

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        if(isset($_POST['updateProf'])) {
            $updName = mysqli_real_escape_string($conn, $_POST['cName']);
            $updEmail = mysqli_real_escape_string($conn, $_POST['cEmail']);
            $updContact = mysqli_real_escape_string($conn, $_POST['cContact']);

            $updateUser = "UPDATE emberusers SET username = '$updName', email = '$updEmail', contact = '$updContact' WHERE user_id = '$userID'";

            try{

                if(mysqli_query($conn, $updateUser)) {
                    header("Location: UserViewProfile.php");

                } else {
                    echo "Error: " . mysqli_error($conn);

                }



            } catch(mysqli_sql_exception $e) {
                
                echo "Error: Something happened";
            }

        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
</head>
<body>
<?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
            <?php include("UserNav.php"); ?>
                <div class="card">
                    <div class="card-header">
                        Add User
                    </div>
                    <div class="card-body">
                    <?php
                        $ret="SELECT * FROM emberusers WHERE user_id='$userID'";
                        $sqlProfile = mysqli_query($conn, $ret);
                        
                        while($row = mysqli_fetch_assoc($sqlProfile)) {

                    ?>
                    <form method ="POST"> 
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?php echo $row['username'];?>" required name="cName">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" value="<?php echo $row['email'];?>" name="cEmail">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" value="<?php echo $row['contact'];?>" name="cContact">
                        </div>

                        <button type="submit" name="updateProf" class="btn btn-outline-success">Update Profile</button>
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