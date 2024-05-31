<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ember Transport Service</title>
    <link rel="icon" href="Images/Company Logo/EMBER-LOGO-2-TRANSPARENT.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css\aboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <?php include("UI/header.php"); ?>

    <div class="slider-preview">
        <div class="ember-preview-container active">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>Welcome</span> to <br>Ember Transport Services</h1>
                    <p>Your journey matters to us. We are committed to providing<br> you with reliable, efficient, and top-quality transport services. <br> Hop on, and let us take you to your destination!</p><br>
                    <div class="home-btn">
                        <?php 
                            if(!empty($_SESSION['userID'])) {

                        ?>
                            <a href="usr\UserBookVehicle.php" class="learnmore">BOOK NOW!</a>
                        <?php 
                            } else if(empty($_SESSION['userID'])) {
                        
                        ?>
                            <a href="booking.php?car=Toyota%20Alphard" class="learnmore">BOOK NOW!</a>
                        <?php 
                            }
                                
                        ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="ember-preview-container">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>Ride</span> with <br>Ember Transport Services</h1>
                    <p>Your comfort is our priority. We strive to deliver exceptional,<br> convenient, and high-standard transport services. <br> Step aboard, and allow us to guide you to your destination!</p><br>
                    <div class="home-btn">
                        <?php 
                            if(!empty($_SESSION['userID'])) {

                        ?>
                            <a href="usr\UserBookVehicle.php" class="learnmore">BOOK NOW!</a>
                        <?php 
                            } else if(empty($_SESSION['userID'])) {
                        
                        ?>
                            <a href="booking.php?car=Toyota%20Alphard" class="learnmore">BOOK NOW!</a>
                        <?php 
                            }
                                
                        ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="ember-preview-container">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>You're safe </span> with <br>Ember Transport Services</h1>
                    <p>Your safety is our commitment. We are dedicated to offering
                    <br>secure, dependable, and top-notch transport services.
                    <br> Trust us, and enjoy a worry-free journey to your destination!</p><br>
                    <div class="home-btn">
                        <?php 
                            if(!empty($_SESSION['userID'])) {

                        ?>
                            <a href="usr\UserBookVehicle.php" class="learnmore">BOOK NOW!</a>
                        <?php 
                            } else if(empty($_SESSION['userID'])) {
                        
                        ?>
                            <a href="booking.php?car=Toyota%20Alphard" class="learnmore">BOOK NOW!</a>
                        <?php 
                            }
                                
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <button id="prev" onclick="prev()"><</button>
        <button id="next" onclick="next()">></button>
    </div>

    <section class="about" id="about">
    <div class="about-container">
        <div class="service-wrapper">
            <h1><span></span>About Us</h1>
            <div class="service">
                <div class="cards">
                <div class="card">
                        <div class="hover-content">
                            <i class="fa-solid fa-car"></i>
                            <h2>EMBER TRANSPORT SERVICES</h2>
                            <p class="hidden">Ember Transport Services stands as a testament to entrepreneurial vision, emerging in 2016 under the guidance of its founder, Mr. Moises Simyunn. Since its inception, the company has carved a niche for itself within the National Capital Region, providing comprehensive transportation solutions. Serving a broad spectrum of clientele, Ember Transport Services caters to the diverse needs of businesses and individuals alike, ensuring seamless mobility for all purposes.</p>
                        </div>
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-layer-group"></i>
                        <h2>MISSION</h2>
                        <p class="hidden">Our mission is to become synonymous with excellence in transportation operations within the bustling metropolis. We endeavor to achieve this by consistently delivering timely and efficient services alongside clear and informative communication channels. Our commitment extends to ensuring convenience for all, offering accessible transportation solutions tailored to meet the diverse needs of our customers.</p>
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-eye"></i>
                        <h2>VISION</h2>
                        <p class="hidden">Our vision is to create an unparalleled transportation network that stands as a beacon of safety, reliability, efficiency, environmental responsibility, and customer satisfaction. We aspire to establish a transport system that not only meets but exceeds the expectations of our customers, drivers, and operators alike. Through a relentless commitment to excellence, we aim to cultivate an environment where safety is paramount, reliability is assured, and efficiency is optimized.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleParagraph(card) {
            var paragraph = card.querySelector('p');
            paragraph.classList.toggle('hidden');
        }
    </script>
    </section>
    
        <section class="ride" id="ride"> 
            <div class="heading">
                <span>What are your transportation needs?</span>
                <h1>Here are our Services</h1>
            </div>
            <div  class="ride-container">
                <div class="box">
                    <img class="bx bxs-map" src="Images\Icons\men-avatar-icon-removebg.png" >
                    <h2>Staff Transportation</h2> 
                    <p>Our dedicated staff shuttle service ensures timely and efficient transportation for employees, providing a convenient and reliable commuting solution tailored to your organization's needs.</p>
                </div>
                <div class="box">
                    <img class="bx bxs-calendar-check" src="Images\Icons\airplane-icon-removebg.png">
                    <h2>Airport Transfer</h2> 
                    <p>Experience seamless airport transfers with our professional shuttle service, offering comfortable rides to and from the airport, with punctuality and customer satisfaction as our top priorities.</p>
                </div>
                <div class="box">
                    <img class="bx bxs-calendar-star" src="Images\Icons\people-icon-removebg.png">
                    <h2>Group Function Transportation</h2> 
                    <p>Whether it's a corporate event, team-building retreat, or special occasion, our group function transportation service delivers safe and comfortable journeys for your entire group, ensuring an enjoyable experience.</p>
                </div>
            </div>
        </section>
    
    <section class="services" id="services">
        <div class="heading">
            <span>Best Services</span>
            <h1>Explore our Fleet</h1>
        </div>
        <div class="services-container">
        <div class="box">
            <div class="box-img">
                <img src="Images/Cars/sample-car_Toyota_Alphard.png" alt="Toyota Alphard">
                </div>
                <h3>Toyota Alphard</h3>
                <p>Experience unparalleled luxury and sophistication in the Toyota Alphard, featuring opulent interiors, advanced technology, and a smooth, powerful ride that elevates every journey to new heights. The Alphard sets a new standard for premium travel.</p>
                <p>Capacity - 7 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Alphard" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>    
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota_GL_Grandia.png" alt="Toyota GL Grandia">
                </div>
                <h3>Toyota GL Grandia</h3>
                <p>For those seeking practicality and comfort, the Toyota GL Grandia delivers with its spacious cabin, versatile seating configurations, and dependable performance, making it the ultimate choice for family outings and group travels.</p>
                <p>Capacity - 10 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20GL Grandia" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?> 
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Super_Grandia_Elite.jpg" alt="Toyota Super Grandia Elite">
                </div>
                <h3>Toyota Super Grandia Elite</h3>
                <p>Elevate your travel experience with the Toyota Super Grandia Elite, boasting luxurious design and cutting-edge safety technology, ensuring a secure and seamless journey for your passengers. The premium features provide comfort for every trip.</p>
                <p>Capacity - 14 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Super Grandia Elite" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Hiace.png" alt="Toyota Hiace">
                </div>
                <h3>Toyota Hi-ace</h3>
                <p>Versatility meets durability in the Toyota Hiace, renowned for its robust construction, flexible seating options, and reliable performance, ensuring seamless transportation for both passengers and cargo.</p>
                <p>Capacity - 17 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Hiace" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Fortuner.jpg" alt="Toyota Fortuner">
                </div>
                <h3>Toyota Fortuner</h3>
                <p>Conquer any terrain with confidence in the Toyota Fortuner, a rugged SUV equipped with advanced off-road capabilities, powerful engine options, and a comfortable interior designed to handle any adventure with ease.</p>
                <p>Capacity - 6 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Fortuner" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota_Innova.png" alt="Toyota Innova">
                </div>
                <h3>Toyota Innova</h3>
                <p>The Toyota Innova redefines family travel with its spacious and adaptable cabin, modern features, and renowned reliability, providing comfort and convenience for every journey. The efficient performance make it an ideal choice.</p>
                <p>Capacity - 7 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Innova" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Altis.png" style="width: 350px; height: 200px;" alt="Toyota Altis">
                </div>
                <h3>Toyota Altis</h3>
                <p>Sleek and stylish, the Toyota Altis offers a refined driving experience with its elegant design, efficient performance, and advanced technology, making it the perfect sedan for those who prioritize both form and function.</p>
                <p>Capacity - 4 passengers</p>
                    <?php 
                        if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                        
                    ?>
                        <a href="booking.php?car=Toyota%20Altis" class="btn">Book Now</a>
                    <?php 
                        }
                                
                    ?>
                
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Vios.png" style="width: 400px; height: 180px;" alt="Toyota Vios">
                </div>
                <h3>Toyota Vios</h3>
                <p>Navigate city streets with ease in the Toyota Vios, featuring agile handling, fuel-efficient performance, and a range of smart features designed to enhance your urban driving experience.</p>
                <p>Capacity - 4 passengers</p>
                    <?php 
                            if(!empty($_SESSION['userID'])) {

                    ?>
                        <a href="usr\UserBookVehicle.php" class="btn">Book Now</a>
                    <?php 
                        } else if(empty($_SESSION['userID'])) {
                            
                    ?>
                            <a href="booking.php?car=Toyota%20Vios" class="btn">Book Now</a>
                    <?php 
                        }
                                    
                    ?>
                
            </div>
        </div>
    </section>
    
    <section class="certification" id="certification">
        <div class="heading">
            <h1>Registration and Certifications</h1>
            <p>Ember Transport strives to offer high-quality transportation services by fulfilling all necessary business requirements and obtaining relevant certifications. Please find below our list of credentials.</p>
        </div>
        <div class="certification-container">
            <div class="box">
                <div class="box-img">
                    <img src="Images/Certification Logo/BIR_logo.png" alt="BIR Logo">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Certification Logo/DTI_Logo.png" alt="DTI Logo">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Certification Logo/PhilGEPS_logo.png" alt="PhilGEPS Logo">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Certification Logo/Taguig_logo.png" alt="Taguig Logo">
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section" id="contact">
        <div class="contact-content">
            <h2>Contact Us</h2>
            <p>We are here to assist you with any questions or concerns. Feel free to reach out to us!</p>
            <div class="contact-details">
                <p><strong>Phone:</strong> (+63) 927-330-1814 </p>
                <p><strong>Email:</strong> Ember.transportservices@gmail.com</p>
                <p><strong>Address:</strong> Habitat Village , Barangay Pinagsama, Taguig City</p>
            </div>
            <ul class="socials">
                <li><a href="https://www.facebook.com/profile.php?id=100093242724191"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
    </section>

    <?php include("UI/footer.php"); ?>

    <script src="JsFilez\SliderLogic.js"></script>

</body>
</html>