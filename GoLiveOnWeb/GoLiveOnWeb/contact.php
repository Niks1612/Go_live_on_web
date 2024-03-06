<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "contact_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize and validate user input to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully";

    }

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize and validate user input to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully";

        // Send email
        $to =  info@goliveonweb.com; 
        $subject = "New Form Submission";
        $email_body = "Name: $name\nEmail: $email\nMessage: $message";

        mail($to, $subject, $email_body);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
; // Replace with the recipient's email address
        $subject = "New Form Submission";
        $email_body = "Name: $name\nEmail: $email\nMessage: $message";

        // You can add additional headers if needed
        // $headers = "From: \r\n" ; 

        // Send the email
        mail($to, $subject, $email_body);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
