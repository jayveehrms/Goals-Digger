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
    <title>Change Password</title>
</head>
<body>
    <?php include("UserSideNav.php"); ?>
        <div id="wrapper">
            <div id="content-wrapper">
                <div class="card">
                        <div class="card-header">
                         Change Password
                        </div>
                        <div class="card-body">
                        
                        <form method ="POST"> 
                            
                            <div class="form-group" >
                                <label>Old Password</label>
                                <input type="password" required name="oPass">
                            </div>

                            <div class="form-group" >
                                <label>New Password</label>
                                <input type="password" name="nPass">
                            </div>

                            <div class="form-group" >
                                <label>Confirm Password</label>
                                <input type="password" name="cPass">
                            </div>
                            
                            <p id="textPass"></p>
                            <button type="submit" name="updatePass">Change Pasword</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>

<?php 

if($_SERVER['REQUEST_METHOD'] = 'POST') {
    if(isset($_POST['updatePass'])) {
        $oldPass = mysqli_real_escape_string($conn, $_POST['oPass']);
        $newPass = mysqli_real_escape_string($conn, $_POST['nPass']);
        $confirmPass = mysqli_real_escape_string($conn, $_POST['cPass']);

        $matchPass = "SELECT * FROM emberusers WHERE user_id = '$userID'";
        $matchPresult = mysqli_query($conn, $matchPass);
        $passRow = mysqli_fetch_assoc($matchPresult);

        

        if(password_verify($oldPass, $passRow['password'])) {
          
            if($newPass == $confirmPass) {
                $newHashP = password_hash($confirmPass, PASSWORD_DEFAULT);
                $updPass = "UPDATE emberusers SET password = '$newHashP' WHERE user_id = '$userID'";

                if(mysqli_query($conn, $updPass)) {
                   header("Location: UserViewProfile.php");

                } else {
                    echo "ERROR: " . mysqli_error($conn);


                }

            }else {
                echo "
                    <script>
                        document.getElementById('textPass').textContent  = 'Passwords don't match!';

                    </script>
            
                ";

            }

        } else {
            echo "
                <script>
                    document.getElementById('textPass').textContent  = 'Wrong Old Password!';

                </script>
            
            ";

        }
       


    }

}


?>