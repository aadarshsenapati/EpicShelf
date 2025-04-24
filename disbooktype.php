<?php

include('includes/connection.php');

// Handle Add to Cart and Remove from Cart functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];

        // Check if the product is already in the cart
        $query = "SELECT id FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If the product is already in the cart, remove it
            $query = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
        } else {
            // If the product is not in the cart, insert it
            $quantity = 1; // Default quantity is 1
            $query = "INSERT INTO cart (user_id, product_id, quantity, added_date) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);
            $stmt->execute();
        }
    }
}

// Handle Add/Remove Wishlist functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist_action'], $_POST['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $product_id = intval($_POST['product_id']);
        $action = $_POST['wishlist_action'];

        if ($action === 'add') {
            // Add the product to the wishlist
            $query = "INSERT INTO wishlist (user_id, product_id, added_date) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
        } elseif ($action === 'remove') {
            // Remove the product from the wishlist
            $query = "DELETE FROM wishlist WHERE user_id = ? AND product_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
        }

        // Return a JSON response
        echo json_encode(['success' => true]);
        exit();
    } else {
        // Return an error if the user is not logged in
        echo json_encode(['success' => false, 'message' => 'User not logged in']);
        exit();
    }
}

// Get the genre name from the query parameter
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;

// Fetch books based on the genre
$books = [];
if ($genre === 'all') {
    // Fetch all books from the latest to the oldest
    $query = "SELECT p.id, p.name, p.price, p.image, p.stock_status 
              FROM products p
              ORDER BY p.id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
} elseif ($genre) {
    // Fetch books for a specific genre
    $query = "SELECT p.id, p.name, p.price, p.image, p.stock_status 
              FROM products p
              JOIN product_genres pg ON p.id = pg.product_id
              JOIN genres g ON pg.genre_id = g.id
              WHERE g.name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($genre); ?> - EpicShelf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/disbooktype.css">
</head>
<style>
    .wishlist-btn {
        background: none;
        border: none;
        cursor: pointer;
        color: #ccc;
        font-size: 20px;
    }

    .wishlist-btn.active {
        color: red;
    }

    .wishlist-btn .sprinkles {
        display: none;
    }

.wishlist-btn:hover {
    transform: scale(1.2); 
}


.sprinkles {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    pointer-events: none;
    transform: translate(-50%, -50%) scale(0);
    opacity: 0;
    animation: none;
}

/* Individual sprinkle elements */
.sprinkles span {
    position: absolute;
    width: 5px;
    height: 5px;
    background-color: red;
    border-radius: 50%;
    animation: sprinkle-animation 0.6s ease-out forwards;
}

/* Sprinkle animation */
@keyframes sprinkle-animation {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(2) translateY(-20px);
        opacity: 0;
    }
}
</style>
<body>
<?php include('includes/header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #5c3d2e;">
        Books in "<?php echo htmlspecialchars($genre === 'all' ? 'All Categories' : $genre); ?>"
    </h2>
    <div class="row g-4">
        <?php if (!empty($books)): ?>
            <?php foreach (array_chunk($books, 5) as $book_row): ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                    <?php foreach ($book_row as $book): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                            <button class="wishlist-btn position-absolute top-0 end-0 m-2" data-product-id="<?php echo $book['id']; ?>">
                                <i class="fas fa-heart"></i>
                                <div class="sprinkles"></div>
                            </button>
                                <img src="<?php echo htmlspecialchars($book['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book['name']); ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-truncate"><?php echo htmlspecialchars($book['name']); ?></h5>
                                    <p class="text-success mb-1">₹<?php echo number_format($book['price'], 2); ?></p>
                                    <p class="badge bg-<?php echo $book['stock_status'] === 'In Stock' ? 'success' : 'danger'; ?>">
                                        <?php echo $book['stock_status']; ?>
                                    </p>
                                    <?php if ($book['stock_status'] === 'In Stock'): ?>
                                        <form method="POST" action="" class="mt-auto">
                                            <input type="hidden" name="product_id" value="<?php echo $book['id']; ?>">
                                            <button type="submit" class="btn btn-sm w-100" style="background-color: #5c3d2e; color: #fff;">
                                                <?php
                                                // Check if the product is already in the cart
                                                $query = "SELECT id FROM cart WHERE user_id = ? AND product_id = ?";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("ii", $_SESSION['user_id'], $book['id']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                echo $result->num_rows > 0 ? 'Remove from Cart' : 'Add to Cart';
                                                ?>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm w-100 mt-auto" disabled>Out of Stock</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No books found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wishlistButtons = document.querySelectorAll('.wishlist-btn');

        wishlistButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const isActive = this.classList.contains('active');
                const action = isActive ? 'remove' : 'add';

                // Toggle the active state
                this.classList.toggle('active');

                // Send AJAX request to add/remove from wishlist
                fetch('disbooktype.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `wishlist_action=${action}&product_id=${productId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert(data.message || 'An error occurred');
                        // Revert the toggle if the request failed
                        this.classList.toggle('active');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert the toggle if the request failed
                    this.classList.toggle('active');
                });
            });
        });
    });
</script>
</body>
</html>
