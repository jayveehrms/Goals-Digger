<?php 
    include("PhpHandler/userRegister.php");
    session_start();
    include("PhpHandler/userLogin.php");

    $loginError = isset($_SESSION['error']) ? $_SESSION['error'] : '';
    unset($_SESSION['error']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ember Transport Service</title>
    <link rel="icon" href="Images/Company Logo/EMBER-LOGO-2-TRANSPARENT.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo">
            <img src="images/Company Logo/EMBER-LOGO-1-TRANSPARENT-OUTLINED.png" alt="Ember Logo">
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>
            <ul class="navbar">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Fleet</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        <div class="header-btn">
            <button id="show-login">LOGIN</button>
        </div>
    </header>

    <div class="slider-preview">
        <div class="ember-preview-container active">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>Welcome</span> to <br>Ember Transport Services</h1>
                    <p>Your journey matters to us. We are committed to providing<br> you with reliable, efficient, and top-quality transport services. <br> Hop on, and let us take you to your destination!</p><br>
                    <div class="home-btn">
                        <a href="booking.php" class="learnmore">BOOK NOW!</a>
                    </div>
                </div>
            </section>
        </div>

        <div class="ember-preview-container">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>Welcome2</span> to <br>Ember Transport Services</h1>
                    <p>Your journey matters to us. We are committed to providing<br> you with reliable, efficient, and top-quality transport services. <br> Hop on, and let us take you to your destination!</p><br>
                    <div class="home-btn">
                        <a href="booking.php" class="learnmore">BOOK NOW!</a>
                    </div>
                </div>
            </section>
        </div>

        <div class="ember-preview-container">
            <section class="home" id="home">
                <div class="text">
                    <h1><span>Welcome3</span> to <br>Ember Transport Services</h1>
                    <p>Your journey matters to us. We are committed to providing<br> you with reliable, efficient, and top-quality transport services. <br> Hop on, and let us take you to your destination!</p><br>
                    <div class="home-btn">
                        <a href="booking.php" class="learnmore">BOOK NOW!</a>
                    </div>
                </div>
            </section>
        </div>
    <section>
        <button id="prev" onclick="prev()"><</button>
        <button id="next" onclick="next()">></button>
    </section>
        
        
    </div>

        <section class="ride" id="ride"> 
            <div class="heading">
                <span>What are your transportation needs?</span>
                <h1>Here are our Services</h1>
            </div>
            <div  class="ride-container">
                <div class="box">
                    <img class="bx bxs-map" src=/>
                    <h2>Staff Transportation</h2> 
                    <p>Our dedicated staff shuttle service ensures timely and efficient transportation for employees, providing a convenient and reliable commuting solution tailored to your organization's needs.</p>
                </div>
                <div class="box">
                    <img class="bx bxs-calendar-check" src=/>
                    <h2>Airport Transfer</h2> 
                    <p>Experience seamless airport transfers with our professional shuttle service, offering comfortable rides to and from the airport, with punctuality and customer satisfaction as our top priorities.</p>
                </div>
                <div class="box">
                    <img class="bx bxs-calendar-star" src=/>
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
                <p>Experience unparalleled luxury and sophistication in the Toyota Alphard, featuring opulent interiors, advanced technology, and a smooth, powerful ride that elevates every journey to new heights.</p>
                <p>Capacity - 7 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota_GL_Grandia.png" alt="Toyota GL Grandia">
                </div>
                <h3>Toyota GL Grandia</h3>
                <p>For those seeking practicality and comfort, the Toyota GL Grandia delivers with its spacious cabin, versatile seating configurations, and dependable performance, making it the ultimate choice for family outings and group travels.</p>
                <p>Capacity - 10 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Super_Grandia_Elite.jpg" alt="Toyota Super Grandia Elite">
                </div>
                <h3>Toyota Super Grandia Elite</h3>
                <p>Elevate your travel experience with the Toyota Super Grandia Elite, boasting luxurious design, and cutting-edge safety technology, ensuring a secure and seamless journey for you and your passengers.</p>
                <p>Capacity - 14 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Hiace.png" alt="Toyota Hiace">
                </div>
                <h3>Toyota Hi-ace</h3>
                <p>Versatility meets durability in the Toyota Hiace, renowned for its robust construction, flexible seating options, and reliable performance, ensuring seamless transportation for both passengers and cargo.</p>
                <p>Capacity - 17 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Fortuner.jpg" alt="Toyota Fortuner">
                </div>
                <h3>Toyota Fortuner</h3>
                <p>Conquer any terrain with confidence in the Toyota Fortuner, a rugged SUV equipped with advanced off-road capabilities, powerful engine options, and a comfortable interior designed to handle any adventure with ease.</p>
                <p>Capacity - 6 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota_Innova.png" alt="Toyota Innova">
                </div>
                <h3>Toyota Innova</h3>
                <p>The Toyota Innova redefines family travel with its spacious and adaptable cabin, modern features, and renowned reliability, providing comfort and convenience for every journey.</p>
                <p>Capacity - 7 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Altis.png" style="width: 350px; height: 200px;" alt="Toyota Altis">
                </div>
                <h3>Toyota Altis</h3>
                <p>Sleek and stylish, the Toyota Altis offers a refined driving experience with its elegant design, efficient performance, and advanced technology, making it the perfect sedan for those who prioritize both form and function.</p>
                <p>Capacity - 4 passengers</p>
                <a href="#" class="btn">Book Now</a>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="Images/Cars/sample-car_Toyota-Vios.png" style="width: 400px; height: 180px;" alt="Toyota Vios">
                </div>
                <h3>Toyota Vios</h3>
                <p>Navigate city streets with ease in the Toyota Vios, featuring agile handling, fuel-efficient performance, and a range of smart features designed to enhance your urban driving experience.</p>
                <p>Capacity - 4 passengers</p>
                <a href="#" class="btn">Book Now</a>
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
    
<!-- Footer Part -->
    <footer className="footer">
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

    <script src="JsFilez\SliderLogic.js"></script>

<!-- Log-in part -->
<div class="wrapper login">
    <div class="login-popup">
        <div class="col-left">
            <div class="login-text">
                <h2>Welcome!</h2>
                    <p><?php if($loginError) {?>
                        <p>Wrong Email/Password!</p> 
                        <?php } else { ?>
                        <p>Create your account. For Free!</p>
                        <?php 
                            }
                        ?>
        <a href="#" class="btn" id="signup-btn">Sign Up</a>
    </div>
        </div>

        <div class="col-right">
            <div class="login-form">
                <button id="close-btn">&times;</button>
                <h2>Login</h2>
                <form method="POST">
                    <p>
                        <label>Email address<span>*</span></label>
                        <input type="text" placeholder="Username or Email" required name="lEmail">
                    </p>
                    <p>
                        <label>Password<span>*</span></label>
                        <input type="password" placeholder="Password" required name="lPassword">
                    </p>
                    <p>
                        <input type="submit" value="Sign In" name="signIn" id="uLogin">
                    </p>
                    <p id="wrongEmailPass"></p>
                    <p>
                        <a href="">Forgot password?</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sign-up part -->
<div class="wrapper signup">
    <div class="signup-popup">
        <div class="col-left">
            <div class="signup-form">
            <button id="signup-close-btn">&times;</button>
                <h2>Signup</h2>
                <form method="POST">
                    <div class="form-box">

                        <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Username" name="username" required>
                        </div>

                        <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="email" placeholder="Email Address" name="email" required>
                        </div>

                        <div class="input-container">
                        <i class="fa fa-phone icon"></i>
                        <input class="input-field" type="number" placeholder="Contact Number" name="contact" required>
                        </div>

                        <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field password" type="password" placeholder="Password" name="password" required>
                        <i class="fa fa-eye icon toggle"></i>
                        </div>

                        <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" placeholder="Confirm Password" name="cpass" required>
                        <i class="fa fa-eye icon toggle"></i>
                        </div>

                        <input type="submit" name="register" id="submit" value="Signup" class="btn">

                    </div>
                </form>
            </div>
        </div>

        <div class="col-right">
            <div class="signup-text">
                <h2>Welcome!</h2>
                <p id="xPass">Already have account?</p>
                <a href="#" id="login-btn" class="btn">Login</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="JsFilez\Login.js"></script>

<!-- For View Password -->
<script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })



    document.querySelector(".signup-form form").addEventListener("submit", function(event) {
        const password = document.querySelector("input[name='password']").value;
        const confirmPassword = document.querySelector("input[name='cpass']").value;
    
        if (password !== confirmPassword) {
            event.preventDefault(); 
            document.getElementById('xPass').textContent = "Passwords don't match!";
        }
    });

    
    document.addEventListener('DOMContentLoaded', function() {
        var loginError = "<?php echo $loginError; ?>";
        if (loginError) {
            var wrapper = document.querySelector(".wrapper.login");
            var popup = document.querySelector(".login-popup");
            wrapper.style.zIndex = '2';
            wrapper.style.display = 'flex';
            popup.classList.add("active");

            
            document.querySelectorAll('section').forEach(el => el.classList.add('dimmed'));

        }
    });
  </script>

</body>
</html>