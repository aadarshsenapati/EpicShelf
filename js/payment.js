var storedCard =null; 
var storedUPI = null; 

function showCardForm() {
    document.getElementById("card-form").style.display = "block";
    document.getElementById("add-card-btn").style.display = "none";
}

function showUPIForm() {
    document.getElementById("upiId").style.display = "block";
    document.getElementById("add-upi-btn").style.display = "block";
    document.getElementById("show-upi-form-btn").style.display = "none";
}

function addUPI() {
    var upiId = document.getElementById("upiId").value;
    if (upiId) {
        storedUPI = upiId;
        document.getElementById("upi-details").innerHTML = `<p>UPI ID: ${storedUPI}</p>`;
        document.getElementById("upiId").style.display = "none";
        document.getElementById("add-upi-btn").style.display = "none";
    }
}

window.onload = function() {
    if (storedCard) {
        document.getElementById("card-details").innerHTML = `<p>Card Number: ${storedCard}</p>`;
        document.getElementById("add-card-btn").style.display = "block";
    } else {
        document.getElementById("card-form").style.display = "block";
    }

    if (storedUPI) {
        document.getElementById("upi-details").innerHTML = `<p>UPI ID: ${storedUPI}</p>`;
        document.getElementById("upiId").style.display = "none";
        document.getElementById("add-upi-btn").style.display = "none";
        document.getElementById("show-upi-form-btn").style.display = "none";
    } else {
        document.getElementById("upiId").style.display = "none";
        document.getElementById("add-upi-btn").style.display = "none";
        document.getElementById("show-upi-form-btn").style.display = "block";
    }
}