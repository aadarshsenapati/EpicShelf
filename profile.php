<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="container">
        <div class="profile">
            <h1>Personal Information</h1>
            <h2>Full Name</h2>
            <p id="fullName">[Not Set] <button class="btn" onclick="enableInlineEdit('fullName')">Update</button></p>
            <h2>Birthday</h2>
            <p id="birthday">[Not Set] <button class="btn" onclick="enableInlineEdit('birthday')">Update</button></p>
            <h2>Gender</h2>
            <p id="gender">[Not Set] <button class="btn" onclick="enableInlineEdit('gender')">Update</button></p>
            <h2>Email</h2>
            <p id="email">[Not Set] <button class="btn" onclick="enableInlineEdit('email')">Update</button></p>
            <h2>Password</h2>
            <p id="password">[Not Set] <button class="btn" onclick="enableInlineEdit('password')">Set</button></p>
        </div>
    </div>

    <div id="updateFormContainer" style="display: none; margin-top: 20px;">
        <form id="updateForm" onsubmit="submitUpdate(event)">
            <label for="updateInput" id="updateLabel" class="form-label"></label>
            <input type="text" id="updateInput" class="form-control" required>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" onclick="hideUpdateForm()">Cancel</button>
            </div>
        </form>
    </div>

    <script src="js/profile.js"></script>
</body>
</html>