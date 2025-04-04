
function enableInlineEdit(fieldId) {
    const field = document.getElementById(fieldId);
    const currentValue = field.innerText.includes("[Not Set]") ? "" : field.innerText;

    field.innerHTML = `
        <input type="text" id="${fieldId}-input" value="${currentValue}" class="form-control" style="width: 70%; display: inline-block;">
        <button class="btn btn-primary" onclick="saveInlineEdit('${fieldId}')">Save</button>
        <button class="btn btn-secondary" onclick="cancelInlineEdit('${fieldId}', '${currentValue}')">Cancel</button>
    `;
}

function saveInlineEdit(fieldId) {
    const input = document.getElementById(`${fieldId}-input`);
    const newValue = input.value.trim();

    if (newValue) {
        const field = document.getElementById(fieldId);

        if (fieldId === "password") {
            const maskedPassword = "•".repeat(newValue.length);
            field.innerHTML = `${maskedPassword} <button class="btn" onclick="enableInlineEdit('${fieldId}')">Change</button>`;
            alert("Password updated successfully!");
        } else {
            field.innerHTML = `${newValue} <button class="btn" onclick="enableInlineEdit('${fieldId}')">Update</button>`;
        }
    } else {
        alert("Invalid input. Please try again.");
    }
}

function cancelInlineEdit(fieldId, originalValue) {
    const field = document.getElementById(fieldId);

    if (fieldId === "password") {
        const maskedPassword = "•".repeat(originalValue.length);
        field.innerHTML = `${maskedPassword} <button class="btn" onclick="enableInlineEdit('${fieldId}')">Change</button>`;
    } else {
        field.innerHTML = `${originalValue} <button class="btn" onclick="enableInlineEdit('${fieldId}')">Update</button>`;
    }
}