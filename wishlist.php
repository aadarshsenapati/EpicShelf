<?php
// Start session and include database connection

include('includes/connection.php');

// Initialize variables
$wishlist_items = [];

// Fetch wishlist items for the logged-in user
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT p.name AS product_name, p.price, p.image, p.stock_status, p.id AS product_id 
              FROM wishlist w 
              JOIN products p ON w.product_id = p.id 
              WHERE w.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $wishlist_items[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/wishlist.css">

</head>
<body>
    <?php include ('includes/header.php'); ?>
      <div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">
			        <div class="main-heading mb-10">My wishlist</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
					        		<th width="35%">Product Name</th>
					        		<th width="13%">Unit Price</th>
					        		<th width="15%">Stock Status</th>
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>
                                <?php if (!empty($wishlist_items)): ?>
                                    <?php foreach ($wishlist_items as $item): ?>
                                        <tr>
                                            <td width="45%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="" class="mCS_img_loaded">
                                                    </div>
                                                    <div class="name-product">
                                                        <?php echo htmlspecialchars($item['product_name']); ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">$<?php echo number_format($item['price'], 2); ?></td>
                                            <td width="15%">
                                                <span class="<?php echo $item['stock_status'] === 'In Stock' ? 'in-stock-box' : 'out-of-stock-box'; ?>">
                                                    <?php echo htmlspecialchars($item['stock_status']); ?>
                                                </span>
                                            </td>
                                            <td width="15%">
                                                <button class="round-black-btn small-btn">Add to Cart</button>
                                            </td>
                                            <td width="10%" class="text-center">
                                                <a href="#" class="trash-icon" onclick="deleteWishlistItem(this)" data-product-id="<?php echo $item['product_id']; ?>">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Your wishlist is empty.</td>
                                    </tr>
                                <?php endif; ?>
				        	</tbody>
				        </table>
				    </div>
			    </div>
			</div>
		</div>
	</div>
	<?php include ('includes/footer.php'); ?>
	<script>
    function deleteWishlistItem(element) {
        const row = element.closest('tr');
        const productId = element.getAttribute('data-product-id');

       
        fetch('delete_wishlist_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ product_id: productId }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                
                row.remove();
            } else {
                alert('Failed to delete the item. Please try again.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
