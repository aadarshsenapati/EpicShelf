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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EpicShelf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/buybooks.css">
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
<?php include ('includes/header.php'); ?>

<main>
    <!-- Featured Books Section -->
    <div class="py-5" style="background-color: #f8f1eb;">
        <div class="container text-center">
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="disbooktype.php?genre=College Books" class="featured-book">
                    <img src="assets/college_books.png" alt="College Books">
                    <p>College Books</p>
                </a>
                <a href="disbooktype.php?genre=Exam Preparation" class="featured-book">
                    <img src="assets/exam_preparation.png" alt="Exam Preparation">
                    <p>Exam Preparation</p>
                </a>
                <a href="disbooktype.php?genre=Reading Books" class="featured-book">
                    <img src="assets/reading_books.png" alt="Reading Books">
                    <p>Reading Books</p>
                </a>
                <a href="disbooktype.php?genre=School Books" class="featured-book">
                    <img src="assets/School_books.png" alt="School Books">
                    <p>School Books (upto 12th)</p>
                </a>
                <a href="disbooktype.php?genre=all" class="featured-book">
                    <img src="assets/view_all.png" alt="View All Second Hand Books">
                    <p>View All Books</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Carousel Section -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/buy1.png" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="assets/buy2.png" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="assets/buy3.png" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</main>
<div style="background-color: #f8f1eb;">
    <div class="container text-center">
        <!-- Banner Section -->
        <div class="mb-5 py-5">
            <div class="p-4" style="background-color: #e8f5e9; border-radius: 10px;">
                <h5>Explore from over 1000s of used books on EpicShelf</h5>
                <a href="#" class="btn btn-primary mt-3">View All Books</a>
            </div>
        </div>

        <!-- Featured Books Section -->
        <h2 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 600;">Select From Top Books Categories</h2>
        <div class="py-5" style="background-color: #f8f1eb;">
        </div>
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm custom-card">
                        <img src="assets/College_books1.png" class="card-img-top" alt="College Books">
                        <div class="card-body">
                            <h5 class="card-title">College Books</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm custom-card">
                        <img src="assets/Exam_preparation1.png" class="card-img-top" alt="Exam Preparation">
                        <div class="card-body">
                            <h5 class="card-title">Exam Preparation</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm custom-card">
                        <img src="assets/Novels.png" class="card-img-top" alt="Reading Books">
                        <div class="card-body">
                            <h5 class="card-title">Reading Books</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm custom-card">
                        <img src="assets/School_books1.png" class="card-img-top" alt="School Books">
                        <div class="card-body">
                            <h5 class="card-title">School Books (upto 12th)</h5>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="mt-5 mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 600;">Browse from Curated Book Categories</h3>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#" class="btn btn-outline-primary">Arihant Books</a>
                <a href="#" class="btn btn-outline-primary">Books for JEE</a>
                <a href="#" class="btn btn-outline-primary">CAT Books</a>
                <a href="#" class="btn btn-outline-primary">Dictionary</a>
                <a href="#" class="btn btn-outline-primary">Encyclopedia</a>
                <a href="#" class="btn btn-outline-primary">Gate Books</a>
                <a href="#" class="btn btn-outline-primary">GMAT Books</a>
                <a href="#" class="btn btn-outline-primary">Health</a>
                <a href="#" class="btn btn-outline-primary">History & Archaeology Books</a>
                <a href="#" class="btn btn-outline-primary">Made Easy Books</a>
                <a href="#" class="btn btn-outline-primary">Mythology</a>
                <a href="#" class="btn btn-outline-primary">NCERT Books</a>
                <a href="#" class="btn btn-outline-primary">Politics Books</a>
                <a href="#" class="btn btn-outline-primary">RD Sharma Books</a>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Newly Added Books</h4>
        <a href="disbooktype.php?genre=all" class="btn btn-link text-primary">View All</a>
    </div>
    <div class="row flex-nowrap overflow-auto" style="gap: 15px;">
        <?php
        // Fetch the latest 5 books that are in stock
        $query = "SELECT id, name, price, image, stock_status FROM products WHERE stock_status = 'In Stock' ORDER BY id DESC LIMIT 5";
        $result = $conn->query($query);

        while ($book = $result->fetch_assoc()): ?>
            <div class="col-md-2 col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                        <?php
                        // Check if the product is already in the wishlist
                        $wishlist_query = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
                        $wishlist_stmt = $conn->prepare($wishlist_query);
                        $wishlist_stmt->bind_param("ii", $_SESSION['user_id'], $book['id']);
                        $wishlist_stmt->execute();
                        $wishlist_result = $wishlist_stmt->get_result();
                        $is_in_wishlist = $wishlist_result->num_rows > 0;
                        ?>
                        <button class="wishlist-btn position-absolute top-0 end-0 m-2 <?php echo $is_in_wishlist ? 'active' : ''; ?>" data-product-id="<?php echo $book['id']; ?>">
                            <i class="fas fa-heart"></i>
                            <div class="sprinkles"></div>
                        </button>
                        <img src="<?php echo htmlspecialchars($book['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book['name']); ?>">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title text-truncate" title="<?php echo htmlspecialchars($book['name']); ?>">
                            <?php echo htmlspecialchars($book['name']); ?>
                        </h6>
                        <p class="text-success mb-1">₹<?php echo number_format($book['price'], 2); ?></p>
                        <form method="POST" action="addtocart.php" class="mt-auto">
                            <input type="hidden" name="product_id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn btn-sm w-100" style="background-color: #5c3d2e; color: #fff;">
                                <?php
                                if (isset($_SESSION['user_id'])) { // Check if user_id exists in the session
                                    $cart_query = "SELECT id FROM cart WHERE user_id = ? AND product_id = ?";
                                    $stmt = $conn->prepare($cart_query);
                                    if ($stmt) { // Ensure the prepared statement is valid
                                        $stmt->bind_param("ii", $_SESSION['user_id'], $book['id']);
                                        $stmt->execute();
                                        $cart_result = $stmt->get_result();
                                        echo $cart_result->num_rows > 0 ? 'Remove from Cart' : 'Add to Cart';
                                    } else {
                                        echo 'Add to Cart'; // Fallback if the statement fails
                                    }
                                } else {
                                    echo 'Add to Cart'; // Default text if user is not logged in
                                }
                                ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Buy Second Hand Fiction Books</h4>
        <a href="disbooktype.php?genre=Fiction" class="btn btn-link text-primary">View All</a>
    </div>
    <div class="row flex-nowrap overflow-auto" style="gap: 15px;">
        <?php
        // Fetch up to 5 Fiction books by joining the products and product_genres tables
        $query = "
            SELECT p.id, p.name, p.price, p.image, p.stock_status 
            FROM products p
            INNER JOIN product_genres pg ON p.id = pg.product_id
            WHERE pg.genre_id = 7 AND p.stock_status = 'In Stock'
            ORDER BY p.id DESC
            LIMIT 5
        ";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0):
            while ($book = $result->fetch_assoc()): ?>
                <div class="col-md-2 col-sm-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                            <?php
                            // Check if the product is already in the wishlist
                            $wishlist_query = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
                            $wishlist_stmt = $conn->prepare($wishlist_query);
                            $wishlist_stmt->bind_param("ii", $_SESSION['user_id'], $book['id']);
                            $wishlist_stmt->execute();
                            $wishlist_result = $wishlist_stmt->get_result();
                            $is_in_wishlist = $wishlist_result->num_rows > 0;
                            ?>
                            <button class="wishlist-btn position-absolute top-0 end-0 m-2 <?php echo $is_in_wishlist ? 'active' : ''; ?>" data-product-id="<?php echo $book['id']; ?>">
                                <i class="fas fa-heart"></i>
                                <div class="sprinkles"></div>
                            </button>
                            <img src="<?php echo htmlspecialchars($book['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book['name']); ?>">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate" title="<?php echo htmlspecialchars($book['name']); ?>">
                                <?php echo htmlspecialchars($book['name']); ?>
                            </h6>
                            <p class="text-success mb-1">₹<?php echo number_format($book['price'], 2); ?></p>
                            <form method="POST" action="addtocart.php" class="mt-auto">
                                <input type="hidden" name="product_id" value="<?php echo $book['id']; ?>">
                                <button type="submit" class="btn btn-sm w-100" style="background-color: #5c3d2e; color: #fff;">
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                        $cart_query = "SELECT id FROM cart WHERE user_id = ? AND product_id = ?";
                                        $stmt = $conn->prepare($cart_query);
                                        if ($stmt) {
                                            $stmt->bind_param("ii", $_SESSION['user_id'], $book['id']);
                                            $stmt->execute();
                                            $cart_result = $stmt->get_result();
                                            echo $cart_result->num_rows > 0 ? 'Remove from Cart' : 'Add to Cart';
                                        } else {
                                            echo 'Add to Cart';
                                        }
                                    } else {
                                        echo 'Add to Cart';
                                    }
                                    ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        else: ?>
            <p class="text-center">No Fiction books available at the moment.</p>
        <?php endif; ?>
    </div>
</div>
<div class="container my-5">
    <div class="text-center mb-4">
        <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #5c3d2e;">
            Discover the Best Selection of Books Online
        </h2>
        <p style="font-size: 16px; color: #555; line-height: 1.8; max-width: 800px; margin: 0 auto;">
            EpicShelf is an innovative online platform designed to simplify the buying, selling, and renting of books while empowering small businesses, particularly independent sellers from platforms like Instagram. By bridging the gap between book enthusiasts and sellers, EpicShelf creates a seamless and user-friendly marketplace.
        </p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="assets/Group_books.png" alt="Books Banner" class="img-fluid rounded shadow-sm" style="border-radius: 15px;">
        </div>
        <div class="col-md-8">
            <div class="p-4" style="background-color: #f8f1eb; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h4 style="font-family: 'Montserrat', sans-serif; font-weight: 600; color: #5c3d2e;">
                    Why Choose EpicShelf?
                </h4>
                <ul style="list-style: none; padding: 0; margin-top: 15px; color: #555; font-size: 15px;">
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Structured rental system ensuring smooth transactions.
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Secure payment gateways and a digital wallet.
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Community-driven commerce promoting sustainability.
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Robust admin dashboard for dispute resolution.
                    </li>
                </ul>
                <a href="#" class="btn btn-primary mt-3" style="border-radius: 20px; padding: 10px 20px; font-size: 16px;">
                    Explore Now
                </a>
            </div>
        </div>
    </div>
</div>
<?php include ('includes/footer.php'); ?>
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
                fetch('buybooks.php', {
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
