<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EpicShelf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/go_to_checkout.css">

</head>
<body>
    <header>
      <?php
      include('includes/connection.php'); // This already starts the session
      include('includes/header.php');
 
     $cart_items = [];
     $total_cost = 0;
     $fname = $lname = $email = $address = $country = $state = $zip = '';
     $cname = $ccnumber = $ccexp = $cvv = '';
 
     if (isset($_SESSION['user_id'])) {
         $user_id = $_SESSION['user_id'];
 
         // Get cart items
         $query = "SELECT p.name AS product_name, c.quantity, p.price, p.image 
                   FROM cart c 
                   JOIN products p ON c.product_id = p.id 
                   WHERE c.user_id = ?";
         $stmt = $conn->prepare($query);
         $stmt->bind_param("i", $user_id);
         $stmt->execute();
         $result = $stmt->get_result();
 
         $cart_items = [];
         $total_cost = 0;
 
         while ($row = $result->fetch_assoc()) {
             $cart_items[] = $row;
             $total_cost += $row['price'] * $row['quantity'];
         }
 
         // Get address
         $stmt = $conn->prepare("SELECT * FROM user_address WHERE id = ?");
         $stmt->bind_param("i", $user_id);
         $stmt->execute();
         $result = $stmt->get_result();
 
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             $fname = $row['fname'];
             $lname = $row['lname'];
             $email = $row['email'];
             $address = $row['flat_num'] . ' ' . $row['street_name'] . ' ' . $row['area'] . ' ' . $row['landmark'];
             $country = $row['country'];
             $state = $row['state'];
             $zip = $row['zip'];
         } else {
             echo "<script>alert('Please fill your address before proceeding.'); window.location.href = 'address.php';</script>";
             exit;
         }
 
         
     }
 
     // POST handling
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $address = $_POST['address'];
         $address2 = $_POST['address2'];
         $country = $_POST['country'];
         $state = $_POST['state'];
         $zip = $_POST['zip'];
        

         // Update address
         $stmt = $conn->prepare("UPDATE user_address SET name = ?, email = ?, address = ?, address2 = ?, country = ?, state = ?, zip = ? WHERE id = ?");
         $stmt->bind_param("sssssssi", $name, $email, $address, $address2, $country, $state, $zip, $user_id);
         $stmt->execute();

         
        
         // Insert data into the `checked_out` table
         $query = "INSERT INTO checked_out (user_id, book_name, quantity, total_amount, checkout_date) VALUES (?, ?, ?, ?, NOW())";
         $stmt = $conn->prepare($query);

         foreach ($cart_items as $item) {
             $book_name = $item['product_name'];
             $quantity = $item['quantity'];
             $stmt->bind_param("isid", $user_id, $book_name, $quantity, $total_cost);
             $stmt->execute();
         }

         // Clear the user's cart
         $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
         $stmt->bind_param("i", $user_id);
         $stmt->execute();

         echo "<script>alert('Checkout successful!'); </script>";
     }
     
       ?>
      </header>
      <div class="container">
        <main>
          <div class="row g-5 py-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span style="color:#5c3d2e">Your cart</span>
                    <span class="badge rounded-pill" style="background-color: #5c3d2e;"><?php echo count($cart_items); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($cart_items as $item): ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="d-flex">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                            <div>
                                <h6 class="my-0"><?php echo htmlspecialchars($item['product_name']); ?></h6>
                                <small class="text-body-secondary">Quantity: <?php echo $item['quantity']; ?></small>
                            </div>
                        </div>
                        <span class="text-body-secondary">₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                    </li>
                    <?php endforeach; ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (₹)</span>
                        <strong>₹<?php echo number_format($total_cost, 2); ?></strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn" style="background-color: #5c3d2e;color:#f8f1eb;">Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3">Billing address</h4>
              <form class="needs-validation" novalidate="" method="POST">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="name" placeholder=""  value="<?php echo $fname; ?>" required="">
                    <div class="invalid-feedback">
                      Valid Name is required.
                    </div>
                  </div>
                  <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="firstName" name="lname" placeholder=""  value="<?php echo htmlspecialchars($lname); ?>" required="">
                    <div class="invalid-feedback">
                      Valid Last Name is required.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                  </div>
      
                  <div class="col-md-5">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($country); ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid country.
                    </div>
                  </div>
      
                  <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" value="<?php echo htmlspecialchars($state); ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid state.
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="<?php echo htmlspecialchars($zip); ?>" required>
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                  </div>
                </div>
      
                <hr class="my-4">
      
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="same-address">
                  <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
      
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="save-info">
                  <label class="form-check-label" for="save-info">Save this information for next time</label>
                </div>
      
                
      
                
                <button class="w-100 btn btn-lg" type="submit" style="background-color: #5c3d2e;color:#f8f1eb">Continue to checkout</button>
              </form>
            </div>
          </div>
        </main>
      </div>
</body>
<?php include ('includes/footer.php'); ?>
    </div>
  </footer>
</html>
