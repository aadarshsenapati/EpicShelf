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
    include('includes/connection.php');
    include('includes/header.php');
    $_SESSION['seller_id'] = 1; // Assuming seller_id is set in the session for demonstration purposes

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adTitle = $_POST['adTitle'];
        $bookTypes = $_POST['bookType']; // Array of selected genres
        $newGenre = $_POST['newGenre'] ?? null;
        $quantity = $_POST['Quantity'] === 'More' ? $_POST['customQuantity'] : $_POST['Quantity'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $seller_id = $_SESSION['seller_id']; // Assuming seller_id is stored in the session

        // Upload the image
        $target_dir = "assets/"; // Save the image in the assets folder
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Check if a new genre is provided
        if (in_array('new', $bookTypes) && !empty($newGenre)) {
            // Insert the new genre into the genres table
            $stmt = $conn->prepare("INSERT INTO genres (name) VALUES (?)");
            $stmt->bind_param("s", $newGenre);
            $stmt->execute();
            $newGenreId = $conn->insert_id; // Get the ID of the newly inserted genre
            $bookTypes[] = $newGenreId; // Add the new genre ID to the selected genres
        }

        // Determine stock status
        $stock_status = $quantity > 0 ? 'In Stock' : 'Out of Stock';

        // Insert the product into the products table
        $stmt = $conn->prepare("INSERT INTO products (name, price, image, stock_status, quantity, seller_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssii", $adTitle, $price, $target_file, $stock_status, $quantity, $seller_id);
        $stmt->execute();
        $product_id = $conn->insert_id; // Get the ID of the newly inserted product

        // Link the product to the selected genres in the product_genres table
        foreach ($bookTypes as $genre_id) {
            $stmt = $conn->prepare("INSERT INTO product_genres (product_id, genre_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $product_id, $genre_id);
            $stmt->execute();
        }

        // Link the product to the seller in the seller_products table
        $stmt = $conn->prepare("INSERT INTO seller_products (product_id, seller_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $product_id, $seller_id);
        $stmt->execute();

        echo "<script>alert('Book added successfully!'); window.location.href = 'sell_books.php';</script>";
    }
    ?>
    <div class="container mt-4 mb-5">
        <p>Submit a free classified ad to <b>sell your used books for cash in India</b></p>
        <a href="#">Click here to learn how does it work?</a>
        <hr>
        <form id="sellBookForm" method="POST" enctype="multipart/form-data">
            <h6>Book Details:</h6>
            <div class="mb-3">
                <label for="adTitle" class="form-label">Ad Title</label>
                <input type="text" id="adTitle" name="adTitle" class="form-control" placeholder="Enter ad title" required>
            </div>

            <div class="mb-3">
                <label for="bookType" class="form-label">Book Type</label>
                <div id="bookType">
                    <?php
                    // Fetch all genres from the genres table
                    $query = "SELECT * FROM genres";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='bookType[]' id='genre_{$row['id']}' value='" . htmlspecialchars($row['id']) . "'>
                                <label class='form-check-label' for='genre_{$row['id']}'>" . htmlspecialchars($row['name']) . "</label>
                              </div>";
                    }
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="bookType[]" id="newGenreOption" value="new">
                        <label class="form-check-label" for="newGenreOption">Add New Genre</label>
                    </div>
                </div>
            </div>

            <div class="mb-3" id="newGenreField" style="display: none;">
                <label for="newGenre" class="form-label">New Genre</label>
                <input type="text" id="newGenre" name="newGenre" class="form-control" placeholder="Enter new genre">
            </div>

            <div class="mb-3">
                <label for="imageUpload" class="form-label">Choose an image to upload:</label>
                <input type="file" id="imageUpload" name="image" accept="image/*" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity Available</label>
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
                <input type="text" id="price" name="price" class="form-control" placeholder="Enter your price" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('input[name="bookType[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const newGenreField = document.getElementById('newGenreField');
                if (this.id === 'newGenreOption' && this.checked) {
                    newGenreField.style.display = 'block';
                } else if (this.id === 'newGenreOption' && !this.checked) {
                    newGenreField.style.display = 'none';
                }
            });
        });

        function toggleQuantityInput() {
            const quantitySelect = document.getElementById('Quantity');
            const customQuantityInput = document.getElementById('customQuantity');
            if (quantitySelect.value === 'More') {
                customQuantityInput.style.display = 'block';
            } else {
                customQuantityInput.style.display = 'none';
            }
        }
    </script>
</body>
</html>
