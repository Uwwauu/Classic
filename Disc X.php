<?php
// Connect to Grade X discussions database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "grade_x_discussions";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = $_POST["author"];
    $message = $_POST["message"];

    // Insert message into database
    $sql = "INSERT INTO discussions (author, message) VALUES ('$author', '$message')";
    $conn->query($sql);
}

// Retrieve discussion messages from database
$sql = "SELECT * FROM discussions ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade X Discussions</title>
</head>
<body>
    <h1>Grade X Discussions</h1>

    <!-- Discussion Form -->
    <form action="discussion.php" method="POST">
        <label for="author">Your Name:</label><br>
        <input type="text" id="author" name="author" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <button type="submit">Post Message</button>
    </form>

    <!-- Discussion Messages -->
    <h2>Messages</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>{$row['author']}</strong>: {$row['message']} ({$row['created_at']})</li>";
            }
        } else {
            echo "<li>No messages yet.</li>";
        }
        ?>
    </ul>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
