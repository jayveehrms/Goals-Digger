<?php 
    include("PhpHandler/userRegister.php");
    include("PhpHandler/userLogin.php");

    if (isset($_SESSION['error'])) {
        $loginError = $_SESSION['error'];
    } else {
        $loginError = '';
    }
    
    unset($_SESSION['error']);

    $isLoggedIn = !empty($_SESSION['userID']);
    $username = '';
    if ($isLoggedIn) {
        $sUsr = $_SESSION['userID'];
        $mUser = "SELECT * FROM emberusers WHERE user_id = '$sUsr'";
        $queryMUsr = mysqli_query($conn, $mUser);
        $mResult = mysqli_fetch_assoc($queryMUsr);
        $username = strtoupper($mResult['username']);
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: homepage.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <script src="JsFilez/Login.js"></script>
</head>
<body>
    <header>
        <a href="homepage.php" class="logo">
            <img src="images/Company Logo/EMBER-LOGO-1-TRANSPARENT-OUTLINED.png" alt="Ember Logo">
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a id="nav-homepage" href="homepage.php">Home</a></li>
            <li><a id="nav-services">Services</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a id="nav-fleet">Fleet</a></li>
            <li><a id="nav-contact">Contact</a></li>
            <?php 
                if(!empty($_SESSION['userID'])) {

            ?>
            <li><a href="usr\UserDashBoard.php">Dashboard</a></li>
            <?php 
                }
            
            ?>
        </ul>
        <div class="header-btn">
            <p id="welCome" class="welcome-message">
            <?php 
                if ($isLoggedIn) {
                    echo "Welcome, <p class='welcome-user'>{$username}!</p>";
                } else {
                    echo "";
                    
                }
            ?>
            </p>
            <button id="show-login" name="logOutIn"><?php if ($isLoggedIn) { echo "LOGOUT";} else {echo "LOGIN";}?></button>
            <form id="logout-form" method="POST" action="homepage.php" style="display: none;">
                <input type="hidden" name="logout" value="1">
            </form>
        </div>
    </header>

<!-- Log-in part -->
<div class="wrapper login">
    <div class="login-popup">
        <div class="col-left">
            <div class="login-text">
                <h2>Welcome!</h2>
                <p><?php if($loginError) {?>
                    <p>Invalid Email or Password.</p> 
                <?php } else { ?>
                    <p>Create your account.</p>
                <?php } ?>
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

<script src="JsFilez/Login.js"></script>

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
    });

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

    document.getElementById('show-login').addEventListener('click', function() {
        if (this.textContent === 'LOGOUT') {
            document.getElementById('logout-form').submit();
        } else {
            
            document.querySelector('.wrapper.login').style.display = 'flex';
            document.querySelector('.wrapper.login').style.zIndex = '2';
            document.querySelector('.login-popup').classList.add('active');
            document.querySelectorAll('section').forEach(el => el.classList.add('dimmed'));
        }
    });
</script>

<!-- Navigation JS -->
<script src="JsFilez/Nav.js"></script>
<script>
    document.getElementById('menu-icon').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('active');
    });
</script>

</body>
</html>

<?php 
    /*
    if(!empty($_SESSION['userID'])){
        $sUsr = $_SESSION['userID'];

        $mUser = "SELECT * FROM emberusers WHERE user_id = '$sUsr'";
        $queryMUsr = mysqli_query($conn, $mUser);
        $mResult = mysqli_fetch_assoc($queryMUsr);
        $wUser = strtoupper($mResult['username']);

        echo "
            <script>
                document.getElementById('show-login').textContent = 'LogOut';
                document.getElementById('welCome').textContent = 'Welcome, {$wUser}!';

            </script>
                
            ";
            if(isset($_POST['logOutIn'])){
                session_destroy();
                header("Location: homepage.php");
    
            }

    }*/


?>