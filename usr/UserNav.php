<?php 
  include("..\PhpHandler\DBconnect.php");
  $userID = $_SESSION['userID'];

  $mUser = "SELECT * FROM emberusers WHERE user_id = '$userID'";
  $mQueryUsr = mysqli_query($conn, $mUser);
  $mResult = mysqli_fetch_assoc($mQueryUsr);
  $mUserName = strtoupper($mResult['username']);

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['logoutBtn'])) {
      header("Location: ../homepage.php");
      session_destroy();
  
    }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userCss/userNav.css">
    <title></title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <p class="navbar-brand mr-1"><?php echo "Welcome <b>" . $mUserName . "</b>!";?></p>

    <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <form method="POST">
          <button class="nav-link dropdown-toggle" name="logoutBtn">
            LogOut <i class="fa fa-sign-out" style="color:red"></i>
          </button>
        
        </form>
      </li>
    </ul>

  </nav>
</body>
</html>