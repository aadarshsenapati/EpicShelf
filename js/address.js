var storedAddress = {};

function showAddressForm() {
    document.getElementById("address-form").style.display = "block";
    document.getElementById("change-address-btn").style.display = "none";
    document.getElementById("address-details").style.display = "none";
}

function saveAddress(event) {
    event.preventDefault(); 
    storedAddress = {
        country: document.getElementById("country").value,
        firstName: document.getElementById("first-name").value,
        lastName: document.getElementById("last-name").value,
        mobile: document.getElementById("mobile").value,
        pinCode: document.getElementById("pin-code").value,
        city: document.getElementById("city").value,
        state: document.getElementById("state").value,
        flatNumber: document.getElementById("flat-number").value,
        streetName: document.getElementById("street-name").value,
        area: document.getElementById("area").value,
        landmark: document.getElementById("landmark").value,
        addressType: document.getElementById("address-type").value
    };

    
    document.getElementById("address-details").innerHTML = `
        <p>Country: ${storedAddress.country}</p>
        <p>First Name: ${storedAddress.firstName}</p>
        <p>Last Name: ${storedAddress.lastName}</p>
        <p>Mobile Number: ${storedAddress.mobile}</p>
        <p>Pin Code/Postal Code: ${storedAddress.pinCode}</p>
        <p>City: ${storedAddress.city}</p>
        <p>State: ${storedAddress.state}</p>
        <p>Flat Number/Building: ${storedAddress.flatNumber}</p>
        <p>Street Name: ${storedAddress.streetName}</p>
        <p>Area/Locality: ${storedAddress.area}</p>
        <p>Landmark: ${storedAddress.landmark}</p>
        <p>Address Type: ${storedAddress.addressType}</p>
    `;

    
    document.getElementById("address-form").style.display = "none";
    document.getElementById("change-address-btn").style.display = "block";
    document.getElementById("address-details").style.display = "block";
}

window.onload = function() {
    if (storedAddress && Object.keys(storedAddress).length > 0) {
        
        document.getElementById("address-details").innerHTML = `
            <p>Country: ${storedAddress.country}</p>
            <p>First Name: ${storedAddress.firstName}</p>
            <p>Last Name: ${storedAddress.lastName}</p>
            <p>Mobile Number: ${storedAddress.mobile}</p>
            <p>Pin Code/Postal Code: ${storedAddress.pinCode}</p>
            <p>City: ${storedAddress.city}</p>
            <p>State: ${storedAddress.state}</p>
            <p>Flat Number/Building: ${storedAddress.flatNumber}</p>
            <p>Street Name: ${storedAddress.streetName}</p>
            <p>Area/Locality: ${storedAddress.area}</p>
            <p>Landmark: ${storedAddress.landmark}</p>
            <p>Address Type: ${storedAddress.addressType}</p>
        `;
        document.getElementById("address-form").style.display = "none";
        document.getElementById("change-address-btn").style.display = "block";
        document.getElementById("address-details").style.display = "block";
    } else {
        
        document.getElementById("address-details").innerHTML = "";
        document.getElementById("address-form").style.display = "block";
        document.getElementById("change-address-btn").style.display = "none";
        document.getElementById("address-details").style.display = "none";
    }
};


document.getElementById("address-form").addEventListener("submit", saveAddress);
