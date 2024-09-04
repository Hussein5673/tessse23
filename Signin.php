<?php
session_start(); // Start the session at the beginning


// Include the database name username password
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create the SQL query to fetch the hashed password
    $sql = "SELECT Password FROM [user] WHERE UserName = ?";
    
    // Prepare the statement
    $stmt = sqlsrv_prepare($conn, $sql, array($username));
    
    if (!$stmt) {
        die("Error preparing statement: " . print_r(sqlsrv_errors(), true));
    }

    // Execute the statement
    $result = sqlsrv_execute($stmt);
    
    if ($result === false) {
        die("Error executing statement: " . print_r(sqlsrv_errors(), true));
    }

    // Fetch the result
    if (sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Get the hashed password from the database
        $hashedPassword = $row['Password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
            exit();
        } else {
            echo "Wrong Username or Password";
        }
    } else {
        echo "Wrong Username or Password";
    }
}

// Close the connection
sqlsrv_close($conn);
?>
