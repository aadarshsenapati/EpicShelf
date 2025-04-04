function toggleBookDetails() {
    const manualDetails = document.getElementById('manualDetails');
    const isbnDetails = document.getElementById('isbnDetails');
    manualDetails.style.display = document.getElementById('manualEntry').checked ? 'block' : 'none';
    isbnDetails.style.display = document.getElementById('isbnEntry').checked ? 'block' : 'none';
}

function toggleQuantityInput() {
    const quantitySelect = document.getElementById('Quantity');
    const customQuantityInput = document.getElementById('customQuantity');
    if (quantitySelect.value === 'More') {
        customQuantityInput.style.display = 'block';
    } else {
        customQuantityInput.style.display = 'none';
    }
}

document.getElementById('sellBookForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;
    const pincode = document.getElementById('pincode').value;

    const nameRegex = /^[a-zA-Z\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
    const pincodeRegex = /^\d{6}$/;

    if (!nameRegex.test(name)) {
        alert('Please enter a valid name.');
        return;
    }
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email.');
        return;
    }
    if (!mobileRegex.test(mobile)) {
        alert('Please enter a valid mobile number.');
        return;
    }
    if (!pincodeRegex.test(pincode)) {
        alert('Please enter a valid pincode.');
        return;
    }

    alert('Form submitted successfully!');
});