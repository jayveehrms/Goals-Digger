<?php 
    include("DBconnect.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['register'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $cPassword = mysqli_real_escape_string($conn, $_POST['cpass']);
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $timestamp = date('Y-m-d H:i:s');
    
            $passwordRequirements = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
    
            if(!preg_match($passwordRequirements, $password)) {
                echo "Password does not meet requirements!";
                exit();
            } elseif($password !== $cPassword) {
                echo "Passwords don't match!";
                exit();
            } else {
                $sqlPending = "INSERT INTO userverification (username, email, contact, password, verification_code, email_verified_at, time_duration)
                              VALUES ('$username','$email','$contact', '$hashedPass', '$verification_code', NULL, '$timestamp')";
    
                try {
                    if(mysqli_query($conn, $sqlPending)) {
                        $to = $email;
                        $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                        $subject = "EMAIL VERIFICATION!";
                        $message = "Eyo wassup thanky for registrating this registration!<br>
                                   THIS IS YOUR VERIFICATION CODE <h3>{$verification_code}</h3>";
                
                        mail($to, $subject, $message, $headers);
                        header("Location: userRegisterOtp.php?email=" . $email);
                        exit(); 
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } catch(mysqli_sql_exception $e) {
                    echo "Error: Something happened";
                }
            }
        }
    }
    
    $delete_unverified = "DELETE FROM userverification WHERE time_duration < DATE_SUB(NOW(), INTERVAL 1 DAY)";
    mysqli_query($conn, $delete_unverified);
    

?>