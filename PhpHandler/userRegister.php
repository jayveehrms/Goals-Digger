<?php 
    include("DBconnect.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['register'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $cPassword = mysqli_real_escape_string($conn, $_POST['cpass']);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $timestamp = date('Y-m-d H:i:s');

            
                $sqlPending = "INSERT INTO userverification (username, email, contact, password, verification_code, email_verified_at, time_duration)
                          VALUES ('$username','$email','$contact', '$password', '$verification_code', NULL, '$timestamp')";
                try{

                    if(mysqli_query($conn, $sqlPending)) {
                        $to = $email;
                        $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                        $subject = "EMAIL VERIFICATION!";
                        $message = "Eyo wassup thanky for registrating this registration!<br>
                                   THIS IS YOUR VERIFICATION CODE <h3>{$verification_code}</h3>";
                
                        mail($to, $subject, $message, $headers);
 
                        header("Location: userVerifyPage.php?email=" . $email);
                        exit(); 
 
                    } else {
                        echo "Error: " . mysqli_error($conn);
 
 
                    }
 
 
 
                } catch(mysqli_sql_exception $e) {
                    
                    echo "Error: Something happened";
                }

            


        }

        if(isset($_POST['vSubmit'])) {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $verification_code = mysqli_real_escape_string($conn, $_POST["verification_code"]);

            $sqlUpdate = "UPDATE userverification SET email_verified_at = NOW() WHERE email = '$email' AND verification_code = '$verification_code'";
            $result  = mysqli_query($conn, $sqlUpdate);
    
           if (mysqli_affected_rows($conn) == 0) {
                echo "Verification failed";
                exit();

           } else {
                $getVerifiedUser = "SELECT * FROM userverification WHERE email = '$email'";
                $vResult = mysqli_query($conn, $getVerifiedUser);
                $getVal = mysqli_fetch_assoc($vResult);

                $vUsername = $getVal['username'];
                $vContact = $getVal['contact'];
                $badge = 0;
                $vPassword = $getVal['password'];
                $vHash = password_hash($vPassword, PASSWORD_DEFAULT);
                
 
                $insertVerified = "INSERT INTO emberusers (username, email, password, contact, loyalty_badge)
                                  VALUES ('$vUsername', '$email', '$vHash', '$vContact', '$badge')";
                
                
                mysqli_query($conn, $insertVerified);
                header("Location: testUAREVERIFIED.html");
                exit();

               
                echo "ERROR: Something Happened";

           }


        }


    }

    $delete_unverified = "DELETE FROM userverification WHERE time_duration < DATE_SUB(NOW(), INTERVAL 1 DAY)";
    mysqli_query($conn, $delete_unverified);
    

?>