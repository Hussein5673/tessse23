<?php
//started the session
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $username = $_SESSION['username'];
    // You can now use $username in your script
}else{
  header("Location: Sign_in_html.php");
}

// Include the database connection details
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if a subscription tier has been selected
if (isset($_GET['tier'])) {
    // Get the selected tier
    $subType = htmlspecialchars($_GET['tier']);

    // Set the SubPrice based on the selected tier
    switch ($subType) {
        case 'Gold':
            $subPrice = 50.00;
            break;
        case 'Silver':
            $subPrice = 30.00;
            break;
        case 'Bronze':
            $subPrice = 20.00;
            break;
        default:
            die("Invalid subscription type.");
    }

    // Generate a unique SubID (or let the database handle it if it's auto-incremented)
    $subID = rand(1000, 9999); // Generate a random integer SubID

    // Set StartingDate to the current date and EndDate to one year later
    $startingDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('+1 year'));

    // Insert the subscription details into the Subscription_table
    $sql = "INSERT INTO Subscription_table (SubID, SubType, SubPrice, StartingDate, EndDate) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $params = array($subID, $subType, $subPrice, $startingDate, $endDate);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the subscription was added successfully
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        // Update the user table with the subscription ID
        $updateSql = "UPDATE [user] SET SubID = ? WHERE UserName = ?";
        $updateParams = array($subID, $username);
        $updateStmt = sqlsrv_query($conn, $updateSql, $updateParams);

        if ($updateStmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            // Show an alert and redirect using JavaScript
            echo "<script type='text/javascript'>
                    alert('You subscribed successfully!');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        }
    }
}

// Close the connection
sqlsrv_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subscription Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="NoorSSubscriptionPage">
<div class="HeaderStore" style="width: 1716px; height: 91px; left: 129px; top: 107px; position: absolute; background: white; border-radius: 20px; display: flex; align-items: center; padding-left: 30px; z-index: 10;">

<!-- Game Vault Link -->
<a href="index.php" style="text-decoration: none; color: black; font-size: 57px; font-family: Righteous; font-weight: 400; line-height: 64px; margin-right: 50px; position: relative; z-index: 20;">
  Game Vault
</a>

<!-- Friends Link -->
<a href="friendspage.php" style="text-decoration: none; color: #91969b; font-size: 16px; font-family: Actor; font-weight: 400; line-height: 16px; margin-right: 30px; position: relative; z-index: 20;">
  Friends
</a>

<!-- View Cart Link -->
<a href="cart_page.php" style="text-decoration: none; color: #91969b; font-size: 16px; font-family: Actor; font-weight: 400; line-height: 16px; margin-right: 30px; position: relative; z-index: 20;">
  View Cart
</a>

<!-- My Profile Link -->
<a href="profile_page.php" style="text-decoration: none; color: #91969b; font-size: 16px; font-family: Actor; font-weight: 400; line-height: 16px; position: relative; z-index: 20;">
  My Profile
</a>

</div>

  <h1 style="color: white;left:400px ;top:250px ;position: absolute;">Choose the tier of Subscription</h1>
  <div class="Subscriptions" style="width: 1091px; height: 382px; position: relative">
    <div class="Subscriptions" style="width: 1091px; height: 382px; left: 474px; top: 333px; position: absolute">
        <a href="subscription.php?tier=Gold"><div class="Card" style="width: 328px; height: 382px; padding-top: 12px; padding-bottom: 20px; padding-left: 12px; padding-right: 12px; left: 0px; top: 0px; position: absolute; background: #52A1CA; border-radius: 20px; flex-direction: column; justify-content: center; align-items: center; gap: 16px; display: inline-flex">
        <img class="GoldBarImg" style="width: 230px; height: 255px; border-radius: 16px" src="img/gold bar img.png" />
        <div class="GoldSubscription" style="align-self: stretch; height: 25px; color: #E7ECF1; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 28px; word-wrap: break-word">Gold Subscription </div>
      </div></a>
      <a href="subscription.php?tier=Silver"><div class="Card" style="width: 328px; height: 382px; padding-top: 12px; padding-bottom: 20px; padding-left: 12px; padding-right: 12px; left: 388px; top: 0px; position: absolute; background: #52A1CA; border-radius: 20px; flex-direction: column; justify-content: center; align-items: center; gap: 16px; display: inline-flex">
        <img class="GoldBarImg" style="width: 230px; height: 255px; border-radius: 16px" src="img/silver.png" />
        <div class="SilverSubscription" style="align-self: stretch; height: 25px; color: #E7ECF1; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 28px; word-wrap: break-word">Silver Subscription</div>
      </div></a>
      <a href="subscription.php?tier=Bronze"><div class="Card" style="width: 328px; height: 382px; padding-top: 12px; padding-bottom: 20px; padding-left: 12px; padding-right: 12px; left: 763px; top: 0px; position: absolute; background: #52A1CA; border-radius: 20px; flex-direction: column; justify-content: center; align-items: center; gap: 16px; display: inline-flex">
        <img class="GoldBarImg" style="width: 230px; height: 255px; border-radius: 16px" src="img/bronze.png" />
        <div class="BronzeSubscription" style="align-self: stretch; height: 25px; color: #E7ECF1; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 28px; word-wrap: break-word">Bronze Subscription </div>
      </div></a>
  </div>
</div>
</div>
</body>
</html>