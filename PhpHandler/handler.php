<?php 
    include("DBconnect.php");


    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['submit'])) {

            $userName = mysqli_real_escape_string($conn, $_POST['fName']); //Reminder i think you forgot the lname
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobileNum = mysqli_real_escape_string($conn, $_POST['mobileNum']);
            $pVehicle = mysqli_real_escape_string($conn, $_POST['bf-vehicle']);
            $pLocation = mysqli_real_escape_string($conn, $_POST['pLocation']);
            $destination = mysqli_real_escape_string($conn, $_POST['destination']);
            $travel_date = mysqli_real_escape_string($conn, $_POST['date']);
            $travel_time = mysqli_real_escape_string($conn, $_POST['time']);
            $travel_date_time = $travel_date . ' ' . $travel_time;
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $timestamp = date('Y-m-d H:i:s');

            $sqlPending = "INSERT INTO bookingverification (username, email, mobile_number, preferred_vehicle, pickup_location, destination, travel_date_time, verification_code, email_verified_at, time_duration)
                          VALUES ('$userName','$email','$mobileNum','$pVehicle','$pLocation','$destination','$travel_date_time','$verification_code', NULL,'$timestamp')";

             try{

                   if(mysqli_query($conn, $sqlPending)) {
                       $to = $email;
                       $headers = "Content-Type: text/html; charset=UTF-8\r\n";
                       $subject = "Registration Confirmation!";
                       $message = "Eyo wassup thanky for registrating this registration!<br>
                                  THIS IS YOUR VERIFICATION CODE <h3>{$verification_code}</h3>";
               
                       mail($to, $subject, $message, $headers);

                       header("Location: otpVerify.php?email=" . $email);
                       exit(); 

                   } else {
                       echo "Error: " . mysqli_error($conn);


                   }


               } catch(mysqli_sql_exception $e) {
                   
                   echo "Error: Something happened";
               }


        }



    }

    $delete_unverified = "DELETE FROM bookingverification WHERE time_duration < DATE_SUB(NOW(), INTERVAL 1 DAY)";
    mysqli_query($conn, $delete_unverified);

    $deleteBooking = "DELETE FROM bookinglist WHERE time_duration < DATE_SUB(NOW(), INTERVAL 7 DAY) AND (status = 'Disapproved' OR status = 'Cancelled')";
    mysqli_query($conn, $deleteBooking);

    $deleteApproved = "DELETE FROM bookinglist WHERE time_duration < DATE_SUB(NOW(), INTERVAL 30 DAY) AND status = 'Approved'";
    mysqli_query($conn, $deleteApproved);


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