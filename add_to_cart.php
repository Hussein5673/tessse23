<?php
session_start();

// Check if the game name is sent via POST
if (isset($_POST['game_name'])) {
    $game_name = $_POST['game_name'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Replace the game in the cart
    $_SESSION['cart'] = [$game_name];

    // Redirect to the cart page
    header("Location: cart_page.php");
    exit();
} else {
    // If no game name is provided, redirect back to the catalog or show an error
    header("Location: catalog_page.php");
    exit();
}
?>
