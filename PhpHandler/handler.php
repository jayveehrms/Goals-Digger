<?php 
    include("DBconnect.php");


    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['submit'])) {

            $userName = mysqli_real_escape_string($conn, $_POST['fName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobileNum = mysqli_real_escape_string($conn, $_POST['mobileNum']);
            $pVehicle = mysqli_real_escape_string($conn, $_POST['bf-vehicle']);;
            $pLocation = mysqli_real_escape_string($conn, $_POST['pLocation']);;
            $destination = mysqli_real_escape_string($conn, $_POST['destination']);;
            $travel_date_time = mysqli_real_escape_string($conn, $_POST['tDateAndTime']);;
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $timestamp = date('Y-m-d H:i:s');

            $sqlPending = "INSERT INTO pendingactivation (username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time, verification_code, email_verified_at, time_duration)
                          VALUES ('$userName','$email','$mobileNum','$pVehicle','$pLocation','$destination','$travel_date_time','$verification_code', NULL,'$timestamp')";

             try{

                   if(mysqli_query($conn, $sqlPending)) {
                       $to = $email;
                       $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                       $subject = "Registration Confirmation!";
                       $message = "Eyo wassup thanky for registrating this registration!<br>
                                  THIS IS YOUR VERIFICATION CODE <h3>{$verification_code}</h3>";
               
                       mail($to, $subject, $message, $headers);

                       header("Location: verifyPage.php?email=" . $email);
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

            $sqlUpdate = "UPDATE pendingactivation SET email_verified_at = NOW() WHERE email = '$email' AND verification_code = '$verification_code'";
            $result  = mysqli_query($conn, $sqlUpdate);
    
           if (mysqli_affected_rows($conn) == 0) {
                echo "Verification failed";
                exit();

           } else {
                $getVerifiedUser = "SELECT * FROM pendingactivation WHERE email = '$email'";
                $vResult = mysqli_query($conn, $getVerifiedUser);
                $getVal = mysqli_fetch_assoc($vResult);

                $vUsername = $getVal['username'];
                $vMobile_number = $getVal['mobile_number'];
                $vPVehicle = $getVal['preferred_vehicle'];
                $vPLocation = $getVal['pickup_location'];
                $vDestination = $getVal['destination'];
                $vTravel_date_time = $getVal['travel_date_time'];

                $insertVerified = "INSERT INTO users (username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time)
                                  VALUES ('$vUsername', '$email', '$vMobile_number', '$vPVehicle', '$vPLocation', '$vDestination', '$vTravel_date_time')";
                
                
                mysqli_query($conn, $insertVerified);
                header("Location: testUAREVERIFIED.html");
                exit();

               
                echo "ERROR: Something Happened";

           }


        }


    }

    $delete_unverified = "DELETE FROM pendingactivation WHERE time_duration < DATE_SUB(NOW(), INTERVAL 1 DAY)";
    mysqli_query($conn, $delete_unverified);


    //Note to self* Continue on saturday.
    /* 
        Add these features.
        Login feature /But optional for the user
            /Purpose is for the user to be able to book without having to register again
            /Features - They are able to book a ride right away
            /Add an admin login detection.
        
        Make administrator management system for the Booking lists
            /Booking management system features:
                /To be discussed.

    
    */


?>