<?php 
    include("PhpHandler\handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ember Transport Service</title>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\booking.css">
    <link rel="icon" href="Images\Company Logo\EMBER-LOGO-2-TRANSPARENT.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include("UI/header.php"); ?>    

    <!-- Booking page HTML structure -->
<section class="booking" id="booking">
    <form method="POST">
        <div class="booking_system-container">
            <h3>Booking Information</h3> <br>
            <div class="booking-form_container">
                <div class="booking-form">
                    <input required type="text" placeholder="First Name" name="fName">
                </div>
                <div class="booking-form">
                    <input required type="text" placeholder="Last Name" name="lName">
                </div>
            </div>
            <div class="booking-form_container">
                <div class="booking-form">
                    <input required type="email" placeholder="Email" name="email">
                </div>
                <div class="booking-form">
                    <input required type="number" placeholder="Phone Number" name="mobileNum">
                </div>
            </div>
            <div class="booking-form">
                <select id="vehicleSelect" name="bf-vehicle" required>
                <option value="Select vehicle">Select vehicle</option>
                    <option value="Toyota Alphard" data-img="Images\Cars\sample-car_Toyota_Alphard.png" data-type="MPV" data-transmission="Automatic" data-capacity="7 to 8">MPV | Toyota Alphard | 7 to 8 seater</option>
                    <option value="Toyota Super Grandia Elite" data-img="Images\Cars\sample-car_Toyota-Super_Grandia_Elite.jpg" data-type="Van" data-transmission="Automatic" data-capacity="9 to 11">Van | Toyota Super Grandia Elite | 9 to 11 seater</option>
                    <option value="Toyota GL Grandia" data-img="Images\Cars\sample-car_Toyota_GL_Grandia.png" data-type="Van" data-transmission="Manual" data-capacity="10 to 15">Van | Toyota GL Grandia | 10 to 15 seater</option>
                    <option value="Toyota Hiace" data-img="Images\Cars\sample-car_Toyota-Hiace.png" data-type="Van" data-transmission="Manual" data-capacity="12 to 18">Van | Toyota Hiace | 12 to 18 seater</option>
                    <option value="Toyota Fortuner" data-img="Images\Cars\sample-car_Toyota-Fortuner.jpg" data-type="SUV" data-transmission="Automatic" data-capacity="7">SUV | Toyota Fortuner | 7 seater</option>
                    <option value="Toyota Innova" data-img="Images\Cars\sample-car_Toyota_Innova.png" data-type="SUV" data-transmission="Automatic" data-capacity="7 to 8">SUV | Toyota Innova | 7 to 8 seater</option>
                    <option value="Toyota Altis" data-img="Images\Cars\sample-car_Toyota-Altis.png" data-type="Sedan" data-transmission="Automatic" data-capacity="5">Sedan | Toyota Altis | 5 seater</option>
                    <option value="Toyota Vios" data-img="Images\Cars\sample-car_Toyota-Vios.png" data-type="Sedan" data-transmission="Automatic" data-capacity="5">Sedan | Toyota Vios | 5 seater</option>
                </select>
            </div>
            <div class="booking-form_container">
                <div class="booking-form">
                    <input required type="text" placeholder="Pickup Location" name="pLocation">
                </div>
                <div class="booking-form">
                    <input required type="text" placeholder="Destination" name="destination">
                </div>
            </div>
            <div class="booking-form_container">
                <div class="booking-form">
                    <input required type="date" name="date">
                </div>
                <div class="booking-form">
                    <input type="time" name="time">
                </div>
            </div>
            <input type="submit" class="book-btn" value="Reserve Now" name="submit">
        </div>
    </form>
    <div class="booking_services-container">
        <div class="booking_car_info-container">
            <div class="box">
                <div class="box-img">
                    <img id="carImage" style="width: 400px; height: 180px;">
                </div>
                <div class="car_name">
                    <h2 id="carName"></h2>
                </div>
                <div class="car_info-container-properties">
                    <div class="car_properties">
                        <p id="carType">SUV</p>
                    </div>
                    <div class="car_properties">
                        <p id="carTransmission">Manual</p>
                    </div>
                    <div class="car_properties">
                        <p id="carCapacity">Capacity: 8</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const urlParams = new URLSearchParams(window.location.search);
        const selectedCar = urlParams.get('car');

        if (selectedCar) {
            const vehicleSelect = document.getElementById('vehicleSelect');
            vehicleSelect.value = selectedCar;

            // Trigger change event to update car info
            const event = new Event('change');
            vehicleSelect.dispatchEvent(event);
        }

        document.getElementById('vehicleSelect').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            
            if (selectedOption.value === "Select vehicle") {
                document.getElementById('carImage').src = "";
                document.getElementById('carName').textContent = "";
                document.getElementById('carType').textContent = "";
                document.getElementById('carTransmission').textContent = "";
                document.getElementById('carCapacity').textContent = "";
            } else {
                const carImage = selectedOption.getAttribute('data-img');
                const carType = selectedOption.getAttribute('data-type');
                const carTransmission = selectedOption.getAttribute('data-transmission');
                const carCapacity = selectedOption.getAttribute('data-capacity');
                
                if (carImage) {
                    document.getElementById('carImage').src = carImage;
                }
                if (carType) {
                    document.getElementById('carType').textContent = carType;
                }
                if (carTransmission) {
                    document.getElementById('carTransmission').textContent = carTransmission;
                }
                if (carCapacity) {
                    document.getElementById('carCapacity').textContent = "Capacity: " + carCapacity;
                }
                document.getElementById('carName').textContent = selectedOption.value;
            }
        });
    });
</script>

</body>
</html>

