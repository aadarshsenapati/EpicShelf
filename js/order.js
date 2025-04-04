var Orders = null;
if (Orders == null) {
document.getElementById("order").innerHTML = `
    <h3 class="None">No Orders Placed!</h3>
    
    
`;
} else {
document.getElementById("order").innerHTML = `<h3>Orders: ${Orders}</h3>`;
}