<?php 
    require 'assets/config/config.php';
    require 'assets/includes/form_handlers/register_handler.php';
    require 'assets/includes/form_handlers/login_handler.php';
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Welcome to the Forum!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="assets/css/register_style.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/register.js"></script>
    </head>
    <body>

        <?php 
        
        if(isset($_POST['register_button'])) {
            echo '
            <script>

            $(document).ready(function() {
                $("#first").hide();
                $("#second").show();
            });

            </script>
            ';
        }

        ?>

        <div class="login_box">
            <div class="login-header text-center mb-4">
                <h1>Forum!</h1>
                Login or sign up below!
            </div>
            <div id="first">
                <form class="text-center" action="register.php" method="POST">
                    <input class="mb-3" type="email" name="log_email" placeholder="Email Address" value="<?php 
                        if (isset($_SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        }
                    ?>" required>
                    <br>
                    <input class="mb-2" type="password" name="log_password" placeholder="Password">
                    <br>

                    <?php if(in_array("Email or Password was incorrect<br>", $error_array)) echo "<h5 class='error'>Email or Password was incorrect</h5>"; ?>

                    <input class="btn btn-danger mt-2 mb-2" type="submit" name="login_button" value="Login">
                    <br>
                    
                    <a href="#" id="signup" class="signup">Need an account? Register Here</a>

                </form>
            </div>
            <div id="second">
                <form class="text-center" action="register.php" method="POST">

                    <input class="" type="text" name="reg_fname" placeholder="First Name" value="<?php 
                        if (isset($_SESSION['reg_fname'])) {
                            echo $_SESSION['reg_fname'];
                        }
                    ?>" required>
                    <br>
                    <?php if(in_array("Your first name must be between 2 and 25 characters.<br>", $error_array)) echo "Your first name must be between 2 and 25 characters.<br>"; ?>


                    <input class="mt-3" type="text" name="reg_lname" placeholder="Last Name" value="<?php 
                        if (isset($_SESSION['reg_lname'])) {
                            echo $_SESSION['reg_lname'];
                        }
                    ?>" required>
                    <br>
                    <?php if(in_array("Your last name must be between 2 and 25 characters.<br>", $error_array)) echo "Your last name must be between 2 and 25 characters.<br>"; ?>


                    <input class="mt-3 mb-3" type="email" name="reg_email" placeholder="Email" value="<?php 
                        if (isset($_SESSION['reg_email'])) {
                            echo $_SESSION['reg_email'];
                        }
                    ?>" required>
                    <br>


                    <input class="" type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
                        if (isset($_SESSION['reg_email2'])) {
                            echo $_SESSION['reg_email2'];
                        }
                    ?>" required>
                    <br>
                    <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use.<br>";
                        else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format.<br>"; 
                        else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; 
                    ?>


                    <input class="mt-3 mb-3" type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <input class="" type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <?php if(in_array("Your passwords do not match.<br>", $error_array)) echo "Your passwords do not match.<br>";
                        else if(in_array("Your password can only contain english characters or numbers.<br>", $error_array)) echo "Your password can only contain english characters or numbers.<br>";
                        else if(in_array("Your password must be between 5 and 30 characters.<br>", $error_array)) echo "Your password must be between 5 and 30 characters.<br>";
                    ?>


                    <input class="btn btn-danger mt-3 mb-2" type="submit" name="register_button" value="Register">
                    <br>
                    <?php if(in_array("<span>You're all set! Go Ahead And Login!</span><br>", $error_array)) echo "<span><h5 class='error'>You're all set! Go Ahead And Login!</h5></span>"; ?>
                    <a href="#" id="signin" class="signin mt-3">Already have an account? Sign in here!</a>
                </form>
            </div>
        </div>
    </body>
</html>