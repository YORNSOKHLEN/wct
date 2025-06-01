<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    
    if ($password === $confirm_password && !empty($name) && !empty($email)) {
        echo "<h2>Account Created </h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
    } else {
        echo "<h2 class='text-red-500 font-bold text-center' >Error: Please make sure all fields are filled out correctly and passwords match.</h2>";
    }
} else {
    echo "<h2>Invalid Register</h2>";
}
?>
