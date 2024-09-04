<?php
session_start();

// Include the database name, username, password, and server details
include 'username_database_password_server.php';

// Establish the connection using sqlsrv
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Retrieve the cart items from the session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$total_cost = 0;

// Prepare an array to store game details
$games = [];

if (!empty($cart_items)) {
    // Ensure no duplicates in cart items
    $cart_items = array_unique($cart_items);

    // Create placeholders for the SQL query
    $placeholders = implode(',', array_fill(0, count($cart_items), '?'));

    // Prepare the SQL statement
    $sql = "SELECT ID, Game_Title, price, image_path FROM game_title WHERE Game_Title IN ($placeholders)";
    $stmt = sqlsrv_query($conn, $sql, $cart_items);

    // Check if the query was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch all the results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $games[] = $row;
        $total_cost += $row['price'];
    }
}

// Close the connection
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="cart_page.css" rel="stylesheet">
    <title>Cart Page</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="cart images/store-icon 1.png" alt="Store Logo">
        </div>
        <div class="profile">
            <img src="picturespfp/Customer.png" alt="Profile Picture">
        </div>
    </header>

    <main class="main-content">
        <h1 class="cart-title">Cart</h1>
        
        <section class="products">
            <?php if (!empty($cart_items) && !empty($games)): ?>
                <?php foreach ($games as $game): ?>
                    <div class="product">
                        <img src="<?php echo htmlspecialchars($game['image_path']); ?>" alt="<?php echo htmlspecialchars($game['Game_Title']); ?>">
                        <h2><?php echo htmlspecialchars($game['Game_Title']); ?></h2>
                        <div class="price"><?php echo htmlspecialchars($game['price']); ?> credits</div>
                        <form action="remove_from_cart.php" method="GET">
                            <input type="hidden" name="game_name" value="<?php echo htmlspecialchars($game['Game_Title']); ?>">
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </section>
        
        <section class="checkout">
            <?php if (!empty($cart_items)) : ?>
                <div class="total">Total: <?php echo $total_cost; ?> credits</div>
                <form action="index.php" method="POST">
                    <input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">
                    <button type="submit" class="checkout-btn">CHECKOUT</button>
                </form>
            <?php else: ?>
                <p>No items to checkout.</p>
            <?php endif; ?>
        </section>
    </main>

    <nav class="navigation">
        <div class="nav-item"><a href="index.php">Home</a></div>
        <div class="nav-item"><a href="Catalog_page.php">Catalogue</a></div>
        <div class="nav-item"><a href="Sign_in_html.php">Signin</a></div>
        <div class="nav-item"><a href="SignUp.php">Signup</a></div>
        <div class="nav-item"><a href="friendspage.php">Friends</a></div>
        <div class="nav-item"><a href="subscription.php">Subscriptions</a></div>
    </nav>
</body>
</html>
