<?php
require 'connection.php';
session_start();
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (!preg_match($regex_email, $email)) {
    echo "Incorrect email. Redirecting you back to the registration page...";
    ?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
    <?php
}

$password = mysqli_real_escape_string($con, $_POST['password']);
$contact = $_POST['contact'];
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$duplicate_user_query = "select id from users where email='$email'";
$duplicate_user_result = mysqli_query($con, $duplicate_user_query) or die(mysqli_error($con));
$rows_fetched = mysqli_num_rows($duplicate_user_result);

if ($rows_fetched > 0) {
    echo "Email already exists in our database. Please choose another email.";
    ?>
    <meta http-equiv="refresh" content="3;url=signup.php" />
    <?php
} else {
    // Server-side strong password validation as per Code Alpha Internship Task 2
    if (strlen($password) < 6 || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
        echo "Password does not meet the required criteria. Please choose a stronger password.";
        ?>
        <meta http-equiv="refresh" content="3;url=signup.php" />
        <?php
    } else {
        $hashed_password = md5(md5($password));
        $user_registration_query = "insert into users(name,email,password,contact,city,address) values ('$name','$email','$hashed_password','$contact','$city','$address')";
        $user_registration_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";
        $_SESSION['email'] = $email;
        $_SESSION['id'] = mysqli_insert_id($con);
        ?>
        <meta http-equiv="refresh" content="3;url=products.php" />
        <?php
    }
}
?>
