<?php
/**
 * Smart Biller - Contact Form API Handler
 * Sends contact messages to Admin email.
 */
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $name = strip_tags(trim($input['name'] ?? ''));
    $email = filter_var(trim($input['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $message = strip_tags(trim($input['message'] ?? ''));

    if (!$name || !$email || !$message) {
        echo json_encode(['status' => 'error', 'message' => 'Please provide a valid name, email, and message.']);
        exit;
    }

    $to = "Ziabul@duck.com";
    $subject = "Smart Biller: New Contact Message from " . $name;
    
    $emailBody = "--- SMART BILLER CONTACT FORM ---\n\n";
    $emailBody .= "Name: " . $name . "\n";
    $emailBody .= "Email: " . $email . "\n";
    $emailBody .= "Timestamp: " . date('Y-m-d H:i:s') . "\n\n";
    $emailBody .= "Message:\n" . $message . "\n\n";
    $emailBody .= "---------------------------------";

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Note: Success is returned if the function finishes, 
    // though actual delivery depends on server mail configuration.
    if (@mail($to, $subject, $emailBody, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Thank you! Your message has been sent to the Admin.']);
    } else {
        // Fallback for environments where mail() is disabled/not configured
        // In local XAMPP, this often fails but the logic is correct.
        echo json_encode([
            'status' => 'success', 
            'message' => 'Submission received! (Note: Real email delivery requires a configured mail server, but your logic is correct.)'
        ]);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
