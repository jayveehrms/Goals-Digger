<?php 
    include("PhpHandler\handler.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ember Transport Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="icon" href="Images\Company Logo\EMBER-LOGO-2-TRANSPARENT.png" type="image/png">
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="Images\Company Logo\EMBER-LOGO-1-TRANSPARENT-OUTLINED.png">
        </a>
    </header>
    <section>
        <form method="POST">
            <div class="booking_system-container">
                
                <h3>Trip Details</h3> <br>
                <p>Preferred vehicle*</p>
                <select name="bf-vehicle" required>
                <option value>Select vehicle</option>
                <option value="Toyota Alphard ">MPV | Toyota Alphard | 7 to 8 seater</option>
                <option value="Toyota Super Grandia Elite ">Van | Toyota Super Grandia Elite | 9 to 11 seater</option>
                <option value="Toyota GL Grandia ">Van | Toyota GL Grandia | 10 to 15 seater </option>
                <option value="Toyota Hiace ">Van | Toyota Hiace | 12 to 18 seater</option>
                <option value="Toyota Fortuner ">SUV | Toyota Fortuner | 7 seater</option>
                <option value="Toyota Innova ">SUV | Toyota Innova | 7 to 8 seater</option>
                <option value="Toyota Altis ">Sedan | Toyota Altis | 5 seater</option>
                <option value="Toyota Vios ">Sedan | Toyota Vios | 5 seater</option>
                </select>

                <p>Pickup Location*</p>
                <input required type="text" placeholder="Enter your preffered pickup location" name="pLocation">
                    
                <p>Destination*</p>
                <input required type="text" placeholder="Enter your preffered destination" name="destination">

                <p>Travel Date & Time*</p>
                <input required type="datetime-local" placeholder="eg: Jan 25, 2023 or 01/25/2023" name="tDateAndTime">

                <h3>Client Details</h3> <br>

                <p>First Name*</p>
                <input required type="text" placeholder="Enter your first name" name="fName">

                <p>Last Name*</p>
                <input required type="text" placeholder="Enter your last name" name="lName">

                <p>Email-address*</p>
                <input required type="email" placeholder="eg: juan.delacruz@gmail.com" name="email">

                <p>Mobile Number*</p>
                <input required type="number" placeholder="eg: +63919 311 1234" name="mobileNum">
                <br><br>
                <input type="submit" name="submit">
            
            </div>
        </form>
    </section>
</body>
</html>
<?php 

?>