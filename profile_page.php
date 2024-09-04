<?php
session_start();

include 'username_database_password_server.php';

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die("Connection failed.<br />" . print_r(sqlsrv_errors(), true));
}

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: Sign_in_html.php'); // Redirect to login page if not logged in
    exit();
}

// Get the username from session
$username = $_SESSION['username'];

// Query to get user details
$sql = "SELECT UserName, Email, DateOfBirth, Friends, reg_date, SubID, AchivementID FROM [user] WHERE UserName = ?";
$params = array($username);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($user === false) {
    die("User not found.");
}

// Get Subscription details
$subID = $user['SubID'];
$sql_sub = "SELECT SubType, StartingDate, EndDate FROM [Subscription_table] WHERE SubID = ?";
$params_sub = array($subID);
$stmt_sub = sqlsrv_query($conn, $sql_sub, $params_sub);

if ($stmt_sub === false) {
    die(print_r(sqlsrv_errors(), true));
}

$subscription = sqlsrv_fetch_array($stmt_sub, SQLSRV_FETCH_ASSOC);



// Get Achievement details
$achievementID = $user['AchivementID'];
$sql_trophy = "SELECT level, trophies, cups, medals, prizes, Prof_Id FROM [trophy_table] WHERE Prof_Id = ?";
$params_trophy = array($achievementID);
$stmt_trophy = sqlsrv_query($conn, $sql_trophy, $params_trophy);

if ($stmt_trophy === false) {
    die(print_r(sqlsrv_errors(), true));
}

$trophy = sqlsrv_fetch_array($stmt_trophy, SQLSRV_FETCH_ASSOC);

sqlsrv_close($conn);

// Function to format date
function formatDate($date) {
    if ($date instanceof DateTime) {
        return $date->format('Y-m-d');
    }
    return $date;
}
?>
<!-----------------------------------Start of the html code----------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
 <style>
    body, html {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <!--hello-->

<div class="LindaSProfilePage">
  <img class="Union" style="width: 1256px; height: 128px; left: 400px; top: 50px; position: absolute; border-radius: 20px" src="picturespfp/Union.png" />
  <img class="Customer" style="width: 100px; height: 100px; left: 470px; top: 70px; position: absolute" src="picturespfp/Customer.png" />
  <div class="Username" style="left: 595px; top: 100px; position: absolute; color: white; font-size: 48px; font-family: Pavanam; font-weight: 400; line-height: 56px; word-wrap: break-word"><?php echo htmlspecialchars($user['UserName']); ?></div>
  <div class="Frame98" style="height: 112px; padding-top: 8px; padding-left: 16px; padding-right: 342px; left: 1438px; top: 891px; position: absolute; background: #07041D; border-radius: 12px; overflow: hidden; flex-direction: column; justify-content: flex-end; align-items: flex-start; gap: 12px; display: inline-flex">
    <img class="Meeting" style="width: 65px; height: 48px" src="picturespfp/Meeting.png" />
    <div class="Players" style="color: white; font-size: 25px; font-family: Pavanam; font-weight: 400; line-height: 22px; word-wrap: break-word">players<br/></div>

  </div>
  <div class="profile_page_box"> 
  <div class="User-item"> User name:<?php echo htmlspecialchars($user['UserName']); ?></div>
  <div class="User-item"> Email: <?php echo htmlspecialchars($user['Email']); ?></div>
  <div class="User-item"> Date of Birth: <?php echo htmlspecialchars(formatDate($user['DateOfBirth'])); ?></div>
    <div class="User-item"> Friends: <?php echo htmlspecialchars($user['Friends'] ?? 'N/A'); ?></div>
    <div class="User-item"> Registration Date: <?php echo htmlspecialchars(formatDate($user['reg_date'])); ?></div>
    
    
    <?php if ($subscription): ?>
        <div class="User-item"> Subscription Type: <?php echo htmlspecialchars($subscription['SubType']); ?></div>
        <div class="User-item"> Start Date: <?php echo htmlspecialchars(formatDate($subscription['StartingDate'])); ?></div>
        <div class="User-item"> End Date: <?php echo htmlspecialchars(formatDate($subscription['EndDate'])); ?></div>
    <?php else: ?>
        <div class="User-item">No subscription found.</div>
    <?php endif; ?>
 </div>
  
  <div class="Frame113" style="width: 200px; height: 96px; left: 1400px; top: 70px; position: absolute; background: #07041D">
    <div class="Level" style="width: 200px; height: 38px; left: 0px; top: 29px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word"><p>Level: <?php echo htmlspecialchars($trophy['level']); ?></p> </div>
    
  </div>
  
  <div class="Group2" style="width: 309px; height: 433px; left: 1438px; top: 432px; position: absolute">
    <div class="Menu" style="width: 288.95px; height: 433px; padding: 12px; left: 0px; top: 0px; position: absolute; background: #08051E; border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
      <div class="Menu" style="flex: 1 1 0; color: #E7ECF1; font-size: 45px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">trophies </div>
    </div>
    <img class="Prize" style="width: 72.92px; height: 82.39px; left: 20.05px; top: 299.35px; position: absolute" src="picturespfp/Prize.png" />
    <div class="Line2" style="width: 143.11px; height: 0px; left: 88.42px; top: 180.34px; position: absolute; border: 1px #70BDBD solid"></div>
    <img class="MedalFirstPlace" style="width: 72.92px; height: 82.39px; left: 20.05px; top: 216.96px; position: absolute" src="picturespfp/Medal First Place.png" />
    <img class="Trophy" style="width: 63.81px; height: 54.93px; left: 24.61px; top: 71.40px; position: absolute" src="picturespfp/Trophy.png" />
    <img class="WorldCup" style="width: 91.15px; height: 73.23px; left: 10.94px; top: 143.72px; position: absolute" src="picturespfp/World Cup.png" />
    <div class="Line1" style="width: 143.11px; height: 0px; left: 92.97px; top: 98.87px; position: absolute; border: 1px #70BDBD solid"></div>
    <div class="Line3" style="width: 143.11px; height: 0px; left: 92.97px; top: 258.15px; position: absolute; border: 1px #70BDBD solid"></div>
    <div class="Line4" style="width: 143.11px; height: 0px; left: 88.42px; top: 340.54px; position: absolute; border: 1px #70BDBD solid"></div>
    <div style="width: 68.36px; height: 54.01px; left: 240.64px; top: 98.87px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word"><?php echo htmlspecialchars($trophy['cups']); ?></div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 180.34px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word"><?php echo htmlspecialchars($trophy['trophies']); ?></div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 258.15px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word"><?php echo htmlspecialchars($trophy['medals']); ?></div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 339.63px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word"><?php echo htmlspecialchars($trophy['prizes']); ?></div>
  </div>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@400;900&family=Righteous&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@400;900&family=Pavanam&family=Righteous&display=swap" rel="stylesheet">
</div>
<nav>
  <a href="index.php"><div class="GameVault"style="width: 348px; height: 70px; left: 56px; top: 100px; position: absolute; text-align: center; color: white; font-size: 57px; font-family: Righteous; font-weight: 400; line-height: 64px; word-wrap: break-word">Game Vault</div></a> 
  <div class="MenuButtons">
    <div class="Menu_profile_page">
      <a href="Catalog_page.php"><div class="MenuItem">Catalogue</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="friendspage.php"><div class="MenuItem">Friends</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="subscription.php"><div class="MenuItem">Subscriptions</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="profile_page.php"><div class="MenuItem">Profile</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="cart_page.php"><div class="MenuItem">Your Cart</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="GameInfoPage_Overwatch.html"><div class="MenuItem">Overwatch</div></a>
    </div>
    <div class="Menu_profile_page">
      <a href="Signout.php"><div class="MenuItem">Signout</div></a>
    </div>
  </div>
</nav>
</body>
</html>
