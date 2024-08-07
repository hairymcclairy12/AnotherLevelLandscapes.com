<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a unique identifier for the message
    $timestamp = date("Y-m-d H:i:s");
    $uniqueID = uniqid();

    // Prepare the data to be written to the file
    $data = "ID: $uniqueID\n";
    $data .= "Timestamp: $timestamp\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Message:\n$message\n";
    $data .= "-----------------------------------\n";

    // Specify the file where the data will be saved
    $file = 'contacts.txt';

    // Write the data to the file
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Thank you! Your message has been sent and saved.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
