<?php
include("DBconnect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signIn'])) {
        $userEmail = mysqli_real_escape_string($conn, $_POST['lEmail']);
        $userPass = mysqli_real_escape_string($conn, $_POST['lPassword']);

        // For users
        $getCreds = "SELECT * FROM emberusers WHERE email = '$userEmail'";
        $getResult = mysqli_query($conn, $getCreds);
        $user = mysqli_fetch_assoc($getResult);

        // For admins
        $getAdmin = "SELECT * FROM emberadmin WHERE email = '$userEmail'";
        $adminResult = mysqli_query($conn, $getAdmin);
        $admin = mysqli_fetch_assoc($adminResult);

        if ($admin && password_verify($userPass, $admin['password'])) {
            $_SESSION['adminEmail'] = $admin['email'];
            header("Location: admin/AdminDashBoard.php");
            exit();

        } elseif ($user && password_verify($userPass, $user['password'])) {
            $_SESSION['userID'] = $user['user_id'];
            header("Location: homepage.php");
            exit();

        } else {
            $_SESSION['error'] = "Wrong Email/Password!";
            header("Location: homepage.php");
            exit();

        }

    } elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: homepage.php");
        exit();
        
    }
}
?>