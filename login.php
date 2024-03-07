<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user exists and password is correct
    $file = fopen("utilisateurs.csv", "r");  // Use "r" for read mode

    if ($file !== false) {
        while (($user = fgetcsv($file)) !== false) {
            if ($user[3] === $email && password_verify($password, $user[4])) {
                // Login successful, create a session for the user
                $_SESSION["email"] = $email;

                // Initialize an empty favorites array for the user if not already set
                if (!isset($_SESSION["favorites"])) {
                    $_SESSION["favorites"] = [];
                }

                fclose($file); // Close the file after reading

                echo "Login successful!";

                // Redirect to attractions.php
                header("Location: attractions.php");
                exit();
            }
        }

        fclose($file);  // Close the file after reading

        // If login fails
        echo "Invalid email or password.";
    } else {
        echo "Error reading user data.";
    }
}

?>
