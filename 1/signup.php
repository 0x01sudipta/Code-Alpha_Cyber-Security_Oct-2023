<?php
require 'connection.php';
session_start();
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Clone Hub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h1><b>SIGN UP</b></h1>
                    <form method="post" action="user_registration_script.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="true"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        </div>

                        <!--Force user to use strong password is implemented here -->
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password (min. 6 characters)"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$" required="true">
                            <span id="password_suggestion" class="error"></span>

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                placeholder="Confirm Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$" required="true">
                            <span id="password_error" class="error"></span>
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address"
                                required="true">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Copyright &copy Clone Hub. All Rights Reserved. | Contact Us: +91 89818 53568</p>
                    <p>Developed by <a href="https://0x01sudipta.github.io/portfolio" target="_blank">Sudipta Biswas</a>
                    </p>
                </center>
            </div>
        </footer>

    </div>
    <!-- to check password confirmation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const password = document.getElementById("password");
            const password_suggestion = document.getElementById("password_suggestion");

            password.addEventListener("input", function () {
                const value = password.value;
                password_suggestion.textContent = "";

                // Password suggestion message based on conditions
                if (value.length >= 6 && /[a-z]/.test(value) && /[A-Z]/.test(value) && /\d/.test(value) && /[!@#\$%^&*()_+|~\-={}\[\]:;"'<>,.?\\/]/.test(value)) {
                    password_suggestion.textContent = "Password meets all requirements!";
                    password_suggestion.style.color = "green"; // Set text color to green
                    return;
                } else {
                    password_suggestion.textContent = "Password requirments: Minimum 6 charecters, lowercase, uppercase, special chareter, number";
                    password_suggestion.style.color = "red"; // Set text color to red
                    return;
                }

            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const password = document.getElementById("password");
            const confirm_password = document.getElementById("confirm_password");
            const password_error = document.getElementById("password_error");
            const form = document.querySelector("form"); // Get the form element
            
            confirm_password.addEventListener("input", function () {
                const value = confirm_password.value;
                password_error.textContent = "";

                if (password.value !== value) {
                    password_error.textContent = "Passwords didn't match";
                    password_error.style.color = "red";
                    form.onsubmit = function () {
                        alert("Passwords didn't match!"); // Display an alert
                        return false; // Prevent form submission
                    };
                }
                else {
                    password_error.textContent = "Passwords match!!";
                    password_error.style.color = "green";
                    form.onsubmit = null;
                }

            });
        });
    </script>

</body>

</html>