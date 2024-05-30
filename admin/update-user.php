<?php 
    include("..\PhpHandler\DBconnect.php");

    if (isset($_POST['updateUser'])) {
        $getEmail = mysqli_real_escape_string($conn, $_GET['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $query = "UPDATE emberusers SET username='$username', email='$email', password='$password', contact='$contact' WHERE email='$getEmail'";
        $upDate = mysqli_query($conn, $query);
        
        if ($upDate) {
            header("Location: AdminManageUsers.php");
        } else {
            echo "Something WRONG!";
        }
        mysqli_close($upDate);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminCss\adminView.css">
    <title>Add user</title>
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
                            <?php
                                $aid=$_GET['email'];
                                $ret="SELECT * FROM emberusers WHERE email=?";
                                $stmt= $conn->prepare($ret) ;
                                $stmt->bind_param('s',$aid);
                                $stmt->execute() ;
                                $res=$stmt->get_result();
                                while($row=$res->fetch_object()) {

                            ?>
                                <form method ="POST"> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" value="<?php echo $row->username;?>" required class="form-control" name="username">
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <input type="text" class="form-control" value="<?php echo $row->contact;?>"  name="contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="text" class="form-control" value="<?php echo $row->email;?>"  name="email">
                                    </div>
                                    

                                    <button type="submit" name="updateUser" class="btn btn-success">Update User</button>
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