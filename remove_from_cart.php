<?php
session_start();

if (isset($_GET['game_name'])) {
    $game_name = $_GET['game_name'];

    // Ensure 'cart' session variable is set
    if (isset($_SESSION['cart'])) {
        // Find the index of the game in the cart
        if (($key = array_search($game_name, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]); // Remove the game from the cart
        }

        // Re-index the array to avoid gaps in the session cart
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirect back to the cart page after removal
header("Location: cart_page.php");
exit();
?>
