<?php
// login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are correct (this is a simplified example)
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform database query to check credentials
    // Assuming you have a users table with email and password fields
    // Example SQL query (using PDO):
    // $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    // $query->execute([$email]);
    // $user = $query->fetch(PDO::FETCH_ASSOC);

    // Example check for now (not secure, use proper hashing)
    if ($email === "theodorealdenmulia@gmail.com" && $password === "Klaten63") {
        // Redirect to dashboard or wherever you want the user to go after login
        header("Location: menu.html");
        exit;
    } else {
        echo "Invalid email or password";
    }
}
?>
