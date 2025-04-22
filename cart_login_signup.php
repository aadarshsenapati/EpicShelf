<?php

include('includes/connection.php');

$is_logged_in = isset($_SESSION['user_id']);
$user_id = $is_logged_in ? $_SESSION['user_id'] : null;

// Handle "Remove" action
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id']) && $is_logged_in) {
    $product_id = intval($_GET['product_id']);

    // Remove the product from the cart
    $stmt = $conn->prepare("DELETE FROM cart WHERE product_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $product_id, $user_id);
    $stmt->execute();

    // Redirect back to the cart page
    header("Location: cart_login_signup.php");
    exit();
}

$cart_items = [];
$total_cost = 0;

if ($is_logged_in) {
    $query = "SELECT p.id AS product_id, p.name AS product_name, p.price, c.quantity, p.image 
              FROM cart c 
              JOIN products p ON c.product_id = p.id 
              WHERE c.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total_cost += $row['price'] * $row['quantity'];
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
</head>
<body>
  <?php include('includes/header.php'); ?>

  <div class="container" style="width:1400px">
    <?php if (!$is_logged_in): ?>
      <!-- Show login/signup prompt -->
      <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
          <img src="assets/cart_login.jpg" style="height:350px;width:350px;">
          <p class="col-lg-8 mx-auto fs-5 text-muted">
            Please login/signup to view your cart.
          </p>
          <div class="d-inline-flex gap-2 mb-5">
            <a href="signup.php" class="d-inline-flex align-items-center btn btn-lg px-4 rounded-pill" style="background-color: #5c3d2e;color:#f8f1eb;">
              Signup
            </a>
            <a href="login.php" class="btn btn-outline-secondary btn-lg px-4 rounded-pill" style="background-color:#f8f1eb;color:#5c3d2e">
              Login
            </a>
          </div>
        </div>
      </div>
    <?php else: ?>
      
      <div class="container my-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center bg-body-tertiary border rounded-3">
            <li class="breadcrumb-item">
              <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                <svg class="bi" width="16" height="16"><use xlink:href="#house-door-fill"></use></svg>
                Cart (<?php echo count($cart_items); ?>)
              </a>
            </li>
          </ol>
        </nav>
      </div>
      <div class="container my-5">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cart_items as $item): ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="" style="width: 50px; height: 50px; margin-right: 10px;">
                      <?php echo htmlspecialchars($item['product_name']); ?>
                    </div>
                  </td>
                  <td>$<?php echo number_format($item['price'], 2); ?></td>
                  <td><?php echo $item['quantity']; ?></td>
                  <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                  <td>
                    <a href="cart_login_signup.php?product_id=<?php echo $item['product_id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                  </td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                <td colspan="2"><strong>$<?php echo number_format($total_cost, 2); ?></strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <?php include('includes/footer.php'); ?>
</body>
</html>
