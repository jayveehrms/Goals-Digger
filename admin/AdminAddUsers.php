<?php 
    include("..\PhpHandler\DBconnect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['adduser'])) {
            $newUsername = mysqli_real_escape_string($conn, $_POST['userName']);
            $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
            $newPass = mysqli_real_escape_string($conn, $_POST['password']);
            $hashNPass = password_hash($newPass, PASSWORD_DEFAULT);
            $newContact = mysqli_real_escape_string($conn, $_POST['contact']);
            $userType = $_POST['uType'];
    
            $findEmailAdmin = "SELECT * FROM emberadmin WHERE email = '$newEmail'";
            $findEmailUser = "SELECT * FROM emberusers WHERE email = '$newEmail'";
    
            $resultAdmin = mysqli_query($conn, $findEmailAdmin);
            $resultUser = mysqli_query($conn, $findEmailUser);
    
            if (mysqli_num_rows($resultAdmin) > 0 || mysqli_num_rows($resultUser) > 0) {
                //To be modified, for when the email already exists in the database
                $maxBookingsReached = true;

            } else {
                
                if ($userType == 'Admin') {
                    $insertAdmin = "INSERT INTO emberadmin (username, email, password, contact)
                                    VALUES ('$newUsername', '$newEmail', '$hashNPass', '$newContact')";
                    
                    if (mysqli_query($conn, $insertAdmin)) {
                        header("Location: AdminDashBoard.php");
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else if ($userType == 'Regular') {
                    $insertUser = "INSERT INTO emberusers (username, email, password, contact)
                                    VALUES ('$newUsername', '$newEmail', '$hashNPass', '$newContact')";
                    
                    if (mysqli_query($conn, $insertUser)) {
                        header("Location: AdminDashBoard.php");
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        }

        if (isset($_POST['maxBadge'])) {
            header("Location: AdminDashBoard.php");
            exit();
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="..\css\checkverify.css">
    <link rel="stylesheet" href="..\css\wrongverify.css">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

    <!-- Add this script to show the popup -->
    <script>
        <?php if ($emailExists): ?>
        $(document).ready(function() {
            $("#emailExistsPopup").addClass("show-popup");
        });
        <?php endif; ?>
    </script>
</head>
<body>
    <?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            <div class="card">
                <div class="card-header">
                    Add User
                </div>
                <div class="card-body">
                    <form method="POST"> 
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" required name="userName">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="select" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input id="select" type="number" name="contact">
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select id="select" name="uType">
                                <option  value="Admin">Admin</option>
                                <option  value="Regular">Regular User</option>
                            </select>
                        </div>
                        <button type="submit" name="adduser">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="popup" id="maxBookingsPopup">
        <form method="POST">
            <img src="../images/veriPIE Images/close.gif">
            <h2>Sorry!</h2>
            <p>This Email already exists!</p>
            <button type="submit" onclick="closePopup('maxBookingsPopup')" id="btnMaxBookings" name="maxBadge">OK</button>
        </form>
    </div>

    <script>
        function openPopup(popupId) {
            document.getElementById(popupId).classList.add("open-popup");
        }

        function closePopup(popupId) {
            document.getElementById(popupId).classList.remove("open-popup");
        }
        <?php if ($maxBookingsReached): ?>
            document.addEventListener("DOMContentLoaded", function() {
            openPopup("maxBookingsPopup");

        });

        <?php 
            endif; 
        
        ?>
    </script>
    
</body>
</html>