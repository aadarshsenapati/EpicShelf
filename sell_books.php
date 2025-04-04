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
    <?php include ('includes/header.php'); ?>
    <div class="container mt-4 mb-5">
        
            <p>Submit a free classified ad to <b>sell your used books for cash in India</b></p>
            <a href="#">Click here to learn how does it work?</a>
            <hr>
            <form id="sellBookForm">
                <h6>Book Details:</h6>
                <div class="mb-3">
                    <label for="adTitle" class="form-label">Add title</label>
                    <input type="text" id="adTitle" class="form-control" placeholder="Enter ad title">
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
                        <select id="bookType" class="form-select">
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="educational">Educational</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bookTitle" class="form-label">Book Title</label>
                        <input type="text" id="bookTitle" class="form-control" placeholder="Enter book name">
                    </div>
                </div>

                <div id="isbnDetails" style="display: none;">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" id="isbn" class="form-control" placeholder="Enter 13-digit ISBN number">
                    </div>
                    <button type="button" id="getBookDetails" class="btn btn-primary mb-3">Get Book Details</button>
                    <div class="mb-3">
                        <label for="bookTypeAfter" class="form-label">Book Type</label>
                        <select id="bookTypeAfter" class="form-select">
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="educational">Educational</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bookTitleAfter" class="form-label">Book Title</label>
                        <input type="text" id="bookTitleAfter" class="form-control" placeholder="Enter book name">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Choose an image to upload:</label>
                    <input type="file" id="imageUpload" name="image" accept="image/*" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="Quantity" class="form-label">Quantity available</label>
                    <select id="Quantity" class="form-select" onchange="toggleQuantityInput()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="More">More</option>
                    </select>
                    <input type="text" id="customQuantity" class="form-control mt-2" placeholder="Enter quantity" style="display: none;">
                </div>
                
                <hr>
                <h6>Price Details:</h6>
                <div class="mb-3">
                    <label for="price" class="form-label">Your Price (₹)</label>
                    <input type="text" id="price" class="form-control" placeholder="Enter your price">
                </div>
                
                <div class="mb-3">
                    <label for="shipping" class="form-label">Your shipping charges to buyer</label>
                    <input type="text" id="shipping" class="form-control d-inline w-50" placeholder="Enter shipping charges">
                    <input type="checkbox" id="freeShipping" class="ms-2">
                    <label for="freeShipping">Free Shipping</label>
                    <p class="text-muted small">Buyers prefer free shipping or low shipping charges</p>
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
                        <input type="text" id="name" class="form-control" placeholder="Enter name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" id="mobile" class="form-control" placeholder="Enter mobile number">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="text" id="pincode" class="form-control" placeholder="Enter pincode">
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="keepPrivate">
                        <label class="form-check-label" for="keepPrivate">
                            Keep my phone number private.
                        </label>
                    </div>
                </fieldset>
                
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        
    </div>
    <?php include ('includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/sell_books.js">
        
    </script>
</body>
</html>