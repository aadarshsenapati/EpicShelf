<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/payment.css">
    
</head>
<body>

<div class="container">
    <h3 class="text-center"><i class="bi bi-credit-card"></i> Payment</h3>
    
    <div id="card-section">
        <fieldset class="p-3 border rounded">
            <h5><i class="bi bi-credit-card"></i> Debit & Credit Cards</h5>
            <div id="card-details"></div>
            <form id="card-form" action="payment.php" method="post" style="display: none;">
                <label for="card" class="form-label">Card Number</label>
                <input type="text" id="card" name="card" class="form-control" required>

                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>

                <label for="exp" class="form-label">Expiry Date</label>
                <input type="month" id="exp" name="exp" class="form-control" required>

                <label for="cvv" class="form-label">CVV</label>
                <input type="number" id="cvv" name="cvv" class="form-control" required>

                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
            </form>
            <button id="add-card-btn" class="btn btn-secondary w-100 mt-2" style="background-color: #5c3d2e;" onclick="showCardForm()">Add Card</button>
        </fieldset>
    </div>

    <div id="upi-section">
        <fieldset class="p-3 border rounded mt-3">
            <h5><i class="bi bi-upc-scan"></i> UPI</h5>
            <div id="upi-details"></div>
            <input type="text" id="upiId" class="form-control" placeholder="Enter UPI ID" style="display: none;">
            <button id="add-upi-btn" class="btn btn-success w-100 mt-2" style="background-color: #5c3d2e;" onclick="addUPI()">Save</button>
            <button id="show-upi-form-btn" class="btn btn-secondary w-100 mt-2" style="background-color: #5c3d2e;" onclick="showUPIForm()">Add UPI</button>
        </fieldset>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/payment.js"></script>


</body>
</html>