<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $location = htmlspecialchars(trim($_POST['location']));
    $hear = htmlspecialchars(trim($_POST['hear']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($location) && !empty($hear) && !empty($message)) {

        $to = "ashadab124@gmail.com";

        $subject = "New Contact Form Submission";

        $email_body = "
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Location:</strong> {$location}</p>
            <p><strong>How did you hear about us:</strong> {$hear}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";

        $headers = "From: {$name} <{$email}>\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($to, $subject, $email_body, $headers)) {
            header("Location: success.html");
            exit();
        } else {
            echo "<p>Sorry, something went wrong. Please try again later.</p>";
        }
    } else {
        echo "<p>Please fill in all required fields.</p>";
    }
}
?>
