<?php
// Include the database name username password
include 'username_database_password_server.php';

session_start(); // Start the session at the beginning

// Only logged in users could access the page
if (!isset($_SESSION['logged_in'])) {
  header("Location: Sign_in_html.php");
}

$userName = $_SESSION['username'];

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if the connection to the database has been successfully established
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare an SQL statement that will retrieve current user's friends from the 'friends' table
$sql = "SELECT friend_Id FROM [friends] WHERE Id = ?";
$stmt = sqlsrv_prepare($conn, $sql, array($userName));
$result = sqlsrv_execute($stmt);
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$friendsList = [];

if(sqlsrv_has_rows($stmt)) {
    $i = 0;
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $friendsList[$i] = $row['friend_Id'];
        $i++;
   }
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap&family=Abel&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="friendspage.css">
  <Title>Friends - GameVault</Title>
</head>

<body>
<div class="FriendsPageMichel">
<div class="navbar"> 
  <a href="index.php">
    <div class="GameVault">Game Vault</div>
  </a>
  
  <div class="UserName">
    <?php echo htmlspecialchars($userName); ?>
    <div class="OnlineStatus"><span class="dot"></span> Online</div>
  </div>


  <form method="POST" action="friendspage.php">
  <div class="Searchbox_Friendspage">
  
    <div class="Icon_Friends">
        <img src="Icons/Icon.png" alt="Icon Image">
    </div>
    <input type="text" name="searchTerm" class="SearchInput_Friends" placeholder="Search">
    </div>
  </form>
  <br>
</div>
<div class="middleScreen">
  <!-- Friends List -->
  <div class="Frame379">
    <div class="YourFriends">
      Your friends
    </div>
    <ul>
      <?php if (empty($friendsList)) : ?>
       <li>
        No Friends :/
       </li>
      <?php endif; ?>
      <?php foreach ($friendsList as $friend): ?>
          <li>
              <form method="POST" action="friendspage.php">
                  <input type="hidden" name="friendName" value="<?php echo htmlspecialchars($friend); ?>">
                  <button type="submit"><?php echo htmlspecialchars($friend); ?></button>
              </form>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Search Results -->
  <div class="SearchResults">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Re-establish the connection
      $conn = sqlsrv_connect($serverName, $connectionOptions);
       
      if ($conn === false) {
          die(print_r(sqlsrv_errors(), true));
      }

      // When the user attempts to find a specfic user to friend the search query is sent to the database
      if (isset($_POST['searchTerm'])) {
        $searchTerm = $_POST['searchTerm'];
        $sql = "SELECT * FROM [user] WHERE UserName = ?";
        $stmt = sqlsrv_query($conn, $sql, array($searchTerm));

        if ($stmt === false) {
          die(print_r(sqlsrv_errors(), true));
        }
        
        // Print the results, where the current user can click on them to access their profile and friend them if they want to
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          echo "<div style='color: black; font-family: Abel; font-size: 1.5vw;'>Search Results:</div>";
          echo "<form method='POST' action=''>
                  <input type='hidden' name='friendName' value='" . htmlspecialchars($row['UserName']) . "'>
                  <button type='submit' style='background:none; border:none; color:black; font-size:2vw; font-family:Abel; cursor:pointer; margin-bottom:10px;'>" . htmlspecialchars($row['UserName']) . "</button>
                </form>";
        } else {
          echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No friends found with the name '$searchTerm'.</div>";
        }
      }
    }
      // Friends Information
      if (isset($_POST['friendName'])) {
          $friendName = $_POST['friendName'];
          $sql = "SELECT * FROM [user] WHERE UserName = ?";
          $stmt = sqlsrv_query($conn, $sql, array($friendName));

          if ($stmt === false) {
              die(print_r(sqlsrv_errors(), true));
          }

          if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
              echo "<div>";
              echo "Name: " . htmlspecialchars($row["Name"]) . "<br>";
              echo "Email: " . htmlspecialchars($row["Email"]) . "<br>";
              echo "Username: " . htmlspecialchars($row["UserName"]) . "<br>";
              if (!in_array($row["UserName"], $friendsList))
                echo "<form method='POST'><button name='addFriend' value={$row['UserName']}>Add Friend</button></form>";
              else 
                echo "<form method='POST'><button name='removeFriend' value={$row['UserName']}>Remove Friend</button></form>";
              echo "</div>";
          } else {
              echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No information found for '$friendName'.</div>";
          }
      
      sqlsrv_close($conn);
    }


    if (isset($_POST['addFriend'])) {
      $friendToAdd = $_POST['addFriend'];
      $sql = "INSERT INTO [friends] (Id, friend_Id, pending) VALUES (?, ?, ?)";
      $params = array($_SESSION['username'], $friendToAdd, 0);
      $stmt = sqlsrv_query($conn, $sql, $params);

      if($stmt == false) {
        die(print_r(sqlsrv_errors(), true));
      } else {
        echo "<script type='text/javascript'>
                    alert('Friend Added');
                    window.location.href = 'friendspage.php';
                  </script>";
      }
    }
    
    if (isset($_POST['removeFriend'])) {
      $friendToRemove = $_POST['removeFriend'];
      $sql = 'DELETE FROM [friends] WHERE Id=? AND friend_Id=?';
      $params = array($_SESSION['username'], $friendToRemove);
      $stmt = sqlsrv_query($conn, $sql, $params);

      if ($stmt == false) {
        die(print_r(sqlsrv_errors(), true));
      } else {
        echo "<script type='text/javascript'>
                    alert('{$friendToRemove} Removed');
                    window.location.href = 'friendspage.php';
                  </script>";
      }
    }
    ?>
  </div>
</div>
</div> 
  
</div>
</body>
</html>
