<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body>
<?php
include('includes/header.php');
include('includes/connection.php');


// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Invalid CSRF token");
    }

    // Collect and validate form data
    $adTitle = trim($_POST['adTitle']);
    $bookEntryType = $_POST['bookEntry'] ?? 'manual';
    $bookType = $bookEntryType === 'manual' ? trim($_POST['bookType']) : trim($_POST['bookTypeAfter']);
    $bookTitle = $bookEntryType === 'manual' ? trim($_POST['bookTitle']) : trim($_POST['bookTitleAfter']);
    $isbn = trim($_POST['isbn'] ?? null);
    $quantity = $_POST['Quantity'] === 'More' ? intval($_POST['customQuantity']) : intval($_POST['Quantity']);
    $price = floatval($_POST['price']);
    $paymentMode = isset($_POST['upi']) ? 'UPI' : 'Bank';
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mobile = preg_match('/^[0-9]{10}$/', $_POST['mobile']) ? $_POST['mobile'] : null;
    $pincode = preg_match('/^[0-9]{6}$/', $_POST['pincode']) ? $_POST['pincode'] : null;
    $keepPrivate = isset($_POST['keepPrivate']) ? 1 : 0;

    if (!$email || !$mobile || !$pincode) {
        die("Invalid input data");
    }

    // Handle image upload
    $image = $_FILES['image']['name'] ?? '';
    $tmp = $_FILES['image']['tmp_name'] ?? '';
    $uploadPath = "uploads/" . basename($image);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!empty($tmp)) {
        $fileType = mime_content_type($tmp);
        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type. Only JPG, PNG, and GIF are allowed.");
        }
        if (!move_uploaded_file($tmp, $uploadPath)) {
            die("Failed to upload image.");
        }
    }

    // Insert product into products table
    $stockStatus = $quantity > 0 ? 'In Stock' : 'Out of Stock';
    $sqlProduct = "INSERT INTO products (name, price, image, stock_status, quantity) 
                   VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlProduct);
    $stmt->bind_param("sdssi", $bookTitle, $price, $image, $stockStatus, $quantity);
    if (!$stmt->execute()) {
        die("Failed to insert product: " . $stmt->error);
    }
    $productId = $stmt->insert_id;

    // Check if genre exists in genres table
    $sqlGenre = "SELECT id FROM genres WHERE name = ?";
    $stmt = $conn->prepare($sqlGenre);
    $stmt->bind_param("s", $bookType);
    $stmt->execute();
    $genreResult = $stmt->get_result();

    if ($genreResult->num_rows > 0) {
        $row = $genreResult->fetch_assoc();
        $genreId = $row['id'];
    } else {
        // Insert new genre into genres table
        $sqlInsertGenre = "INSERT INTO genres (name) VALUES (?)";
        $stmt = $conn->prepare($sqlInsertGenre);
        $stmt->bind_param("s", $bookType);
        if (!$stmt->execute()) {
            die("Failed to insert genre: " . $stmt->error);
        }
        $genreId = $stmt->insert_id;
    }

    // Insert into product_genres table
    $sqlProductGenre = "INSERT INTO product_genres (product_id, genre_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sqlProductGenre);
    $stmt->bind_param("ii", $productId, $genreId);
    if (!$stmt->execute()) {
        die("Failed to insert product genre: " . $stmt->error);
    }

    echo "<div class='alert alert-success text-center'>Book ad submitted successfully!</div>";
}
?>

<div class="container mt-4 mb-5">
    <form id="sellBookForm" method="POST" action="sell_books.php" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <p>Submit a free classified ad to <b>sell your used books for cash in India</b></p>
        <a href="#">Click here to learn how does it work?</a>
        <hr>
        <h6>Book Details:</h6>
        <div class="mb-3">
            <label for="adTitle" class="form-label">Add title</label>
            <input type="text" id="adTitle" name="adTitle" class="form-control" placeholder="Enter ad title">
        </div>
        
        <label class="form-label">Book details</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="bookEntry" id="manualEntry" checked onclick="toggleBookDetails()">
            <label class="form-check-label" for="manualEntry">
                Enter book details manually
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="bookEntry" id="isbnEntry" onclick="toggleBookDetails()">
            <label class="form-check-label" for="isbnEntry">
                Automatically, by just typing the ISBN number
            </label>
        </div>

        <div id="manualDetails">
            <div class="mb-3">
                <label for="bookType" class="form-label">Book Type</label>
                <select id="bookType" name="bookType" class="form-select">
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="educational">Educational</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" id="bookTitle" name="bookTitle" class="form-control" placeholder="Enter book name">
            </div>
        </div>

        <div id="isbnDetails" style="display: none;">
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" placeholder="Enter 13-digit ISBN number">
            </div>
            <button type="button" id="getBookDetails" class="btn btn-primary mb-3">Get Book Details</button>
            <div class="mb-3">
                <label for="bookTypeAfter" class="form-label">Book Type</label>
                <select id="bookTypeAfter" name="bookTypeAfter" class="form-select">
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="educational">Educational</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bookTitleAfter" class="form-label">Book Title</label>
                <input type="text" id="bookTitleAfter" name="bookTitleAfter" class="form-control" placeholder="Enter book name">
            </div>
        </div>

        <div class="mb-3">
            <label for="imageUpload" class="form-label">Choose an image to upload:</label>
            <input type="file" id="imageUpload" name="image" accept="image/*" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="Quantity" class="form-label">Quantity available</label>
            <select id="Quantity" name="Quantity" class="form-select" onchange="toggleQuantityInput()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="More">More</option>
            </select>
            <input type="text" id="customQuantity" name="customQuantity" class="form-control mt-2" placeholder="Enter quantity" style="display: none;">
        </div>
        
        <hr>
        <h6>Price Details:</h6>
        <div class="mb-3">
            <label for="price" class="form-label">Your Price (₹)</label>
            <input type="text" id="price" name="price" class="form-control" placeholder="Enter your price">
        </div>
        
        <h6>Preferred Payment Mode:</h6>
        <p>After your book is sold, in what mode would you like to receive the payment?</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paymentMode" id="upi" checked>
            <label class="form-check-label" for="upi">UPI Number</label>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="radio" name="paymentMode" id="bank">
            <label class="form-check-label" for="bank">Bank Account</label>
        </div>
        <hr>
        <fieldset>
            <legend>Your Details:</legend>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <div class="input-group">
                    <span class="input-group-text">+91</span>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter pincode">
            </div>
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="keepPrivate" name="keepPrivate">
                <label class="form-check-label" for="keepPrivate">
                    Keep my phone number private.
                </label>
            </div>
        </fieldset>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/sell_books.js"></script>
</body>
</html>
