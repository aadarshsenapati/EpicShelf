<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/address.css">
    
</head>
<body>

<div class="container">
    <h3 class="text-center"><i class="bi bi-geo-alt"></i> Address</h3>
    
    <div id="address-section">
        <div id="address-details"></div>
        <form id="address-form" action="" method="post" style="display: none;">
            <label for="country" class="form-label">Country</label>
            <input type="text" id="country" name="country" class="form-control" required>

            <label for="first-name" class="form-label">First Name</label>
            <input type="text" id="first-name" name="first-name" class="form-control" required>

            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" id="last-name" name="last-name" class="form-control" required>

            <label for="mobile" class="form-label">Mobile Number</label>
            <input type="text" id="mobile" name="mobile" class="form-control" required>

            <label for="pin-code" class="form-label">Pin Code/Postal Code</label>
            <input type="text" id="pin-code" name="pin-code" class="form-control" required>

            <label for="city" class="form-label">City</label>
            <input type="text" id="city" name="city" class="form-control" required>

            <label for="state" class="form-label">State</label>
            <input type="text" id="state" name="state" class="form-control" required>

            <label for="flat-number" class="form-label">Flat Number/Building</label>
            <input type="text" id="flat-number" name="flat-number" class="form-control" required>

            <label for="street-name" class="form-label">Street Name</label>
            <input type="text" id="street-name" name="street-name" class="form-control" required>

            <label for="area" class="form-label">Area/Locality</label>
            <input type="text" id="area" name="area" class="form-control" required>

            <label for="landmark" class="form-label">Landmark</label>
            <input type="text" id="landmark" name="landmark" class="form-control">

            <label for="address-type" class="form-label">Address Type</label>
            <select id="address-type" name="address-type" class="form-control" required>
                <option value="home">Home</option>
                <option value="office">Office</option>
                <option value="other">Other</option>
            </select>

            <button type="submit" class="btn btn-primary w-100 mt-2"style="background-color: #5c3d2e;" >Submit</button>
        </form>
        <button id="change-address-btn" class="btn btn-secondary w-100 mt-2"style="background-color: #5c3d2e;" onclick="showAddressForm()">Change Address</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/address.js"></script>


</body>
</html>