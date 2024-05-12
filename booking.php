<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ember Transport Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="icon" href="Images\Company Logo\EMBER-LOGO-2-TRANSPARENT.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="index.html" class="logo">
            <img src="Images\Company Logo\EMBER-LOGO-1-TRANSPARENT-OUTLINED.png">
        </a>
    </header>
    <section class="booking">
        <div class="booking_system-container">
            <h3>Booking Information</h3> <br>
            <form>
                <div class="booking-form_container">
                    <div class="booking-form">
                        <input required type="text" placeholder="First Name">
                    </div>
                    <div class="booking-form">
                        <input required type="text" placeholder="Last Name">
                    </div>  
                </div>

                <div class="booking-form_container">
                    <div class="booking-form">
                        <input required type="email" placeholder="Email">
                    </div>
                    <div class="booking-form">
                        <input required type="number" placeholder="Phone Number">
                    </div>  
                </div>

                <div class="booking-form">
                    <select  name="bf-vehicle" required>
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
                </div>
                
                <div class="booking-form_container">
                    <div class="booking-form">
                        <input required type="text" placeholder="Pickup Location">
                    </div>
                    <div class="booking-form">
                        <input required type="text" placeholder="Destination">
                    </div>
                </div>
                
                <div class="booking-form_container">
                    <div class="booking-form">
                        <input required type="date" >
                    </div>
                    <div class="booking-form">
                        <input type="time">
                    </div>  
                </div>
                
                    <input type="submit" class="book-btn" value="Reserve Now">
                
                
            </form>
        </div>
        
        <div class="booking_services-container">
            <div class="booking_car_info-container">
                <div class="box">
                    <div class="box-img">
                        <img style="width: 400px; height: 180px;" src="Images/Cars/sample-car_Toyota-Super_Grandia_Elite.jpg">
                    </div>
                    
                    <div class="car_name">
                        <h2>Toyota Hiace</h2>
                    </div>
                    

                    <div class="car_info-container-properties">
                        <div class="car_properties">
                            <p>SUV</p>
                        </div>
                        <div class="car_properties">
                            <p>Manual</p>
                        </div>
                        <div class="car_properties">
                            <p>Capacity: 8</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer>
        <div class="footer-container">
            <h3>Ember Transport Services</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et perspiciatis numquam minus dignissimos quisquam nihil!</p>

            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
                <div class="footer-bottom">
                    <p>copyright &copy; 2024 Ember Transport Services Philippines. <br> designed by <span>Goals Digger</span></p>
                </div>
            </div>
            
        </div>
    </footer>

</body>
</html>