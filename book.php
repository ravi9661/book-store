<!DOCTYPE html>
<html>
<head>
    <title>Online Bookstore</title>
</head>
<body>
    <center>
    <h1>Welcome to our Online Bookstore</h1>
    <h2>Available Books</h2>
    <?php
    // Sample book data
    $books = array(
        array("title" => "Book 1", "author" => "Author 1", "price" => 10),
        array("title" => "Book 2", "author" => "Author 2", "price" => 15),
        array("title" => "Book 3", "author" => "Author 3", "price" => 20)
    );

    // Display available books
    foreach ($books as $book) {
        echo "<p>{$book['title']} by {$book['author']} - \${$book['price']}</p>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='title' value='{$book['title']}'>";
        echo "<input type='hidden' name='price' value='{$book['price']}'>";
        echo "<input type='submit' name='add_to_cart' value='Add to Cart'>";
        echo "</form>";
    }

    // Handle adding to cart
    session_start();
    if (isset($_POST['add_to_cart'])) {
        $item = array(
            "title" => $_POST['title'],
            "price" => $_POST['price']
        );
        $_SESSION['cart'][] = $item;
        echo "<p>Added {$item['title']} to cart.</p>";
    }

    // Display cart
    echo "<h2>Shopping Cart</h2>";
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo "<p>{$item['title']} - \${$item['price']}</p>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</body>
</html>
