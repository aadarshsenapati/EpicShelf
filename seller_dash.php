<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

    <style>
        .sidebar {
            width: 250px;
            background: #f8f8f8;
            padding: 20px;
            height: 100%; 
        }
        .sidebar a {
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: 0.3s;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background: #d69777;
            color: black;
        }
        .logout {
            color: red !important;
        }
        .main {
            flex: 1;
            padding: 0;
            position: relative;
            height: 100%; 
        }
        .profile-card {
            background: #b6795b;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        .profile-card h2 {
            margin: 0;
        }
        .profile-card {
            background:  #b6795b;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            color:white
        }
        
        .profile-card button {
            margin-top: 10px;
            padding: 10px 15px;
            background: #5c3d2e;
            color:white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        .profile-card button:hover {
            background:  #523729;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            text-align: center;
        }
        .grid-item {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            cursor: pointer;
        }
        .grid-item:hover {
            background: #d69777;
            color: black;
        }
        .content-frame {
            width: 100%;
            height: 100%; /* Ensure the iframe fills the main content area */
            border: none;
            display: none;
        }
        .container1 {
            max-width: 1100px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            height: calc(100vh - 100px); /* Dynamically fill the viewport minus the navbar height */
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f1eb;
            color: #333;
        }
        .navbar {
            background-color: #5c3d2e !important;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand, .nav-link {
            color: #f8f1eb !important;
            font-size: 18px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .nav-link {
            margin-right: 20px;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #e0fbfc !important;
        }
        .input-group {
            width: 100%;
        }
        .input-group-text {
            background-color: #5c3d2e;
            color: #f8f1eb;
            border: none;
        }
        .form-control {
            border: none;
            border-radius: 0;
        }
        .btn-search {
            background-color: #f8f1eb;
            color: #5c3d2e;
            border: 1px solid #f8f1eb;
            border-radius: 10px;
        }
        .btn-search:hover {
            background-color: #5c3d2e;
            color: #f8f1eb;
        }
        .container-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 950px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-label {
            font-weight: bold;
            color: #5c3d2e;
        }
        .form-control, .form-select {
            border-radius: 10px;
            width: 80%;
        }
        .input-group{
            width: 80%;
        }
        .form-check-label {
            color: #5c3d2e;
        }
        .btn-primary {
            background-color: #5c3d2e;
            border: none;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #3e2a1f;
        }
        .text-muted {
            color: #5c3d2e !important;
        }
        .form-check-input:checked {
            background-color: #5c3d2e;
        }
        .form-check-input:focus {
            border-color: #5c3d2e;
            box-shadow: 0 0 0 0.25rem rgba(92, 61, 46, 0.25);
        }
    </style>
</head>
<body>
    <?php include ('includes/header.php'); ?>
        <div class="container1">
        <div class="sidebar">
            <h4 class="text-center mb-4">Overview</h4>
            <a href="#" onclick="loadPage('sell_books.php')"><i class="bi bi-book"></i> Sell Books</a>
            <a href="#" onclick="loadPage('check_profits.php')"><i class="bi bi-graph-up"></i> Check Profits</a>
            <a href="#" onclick="loadPage('yet_to_ship.php')"><i class="bi bi-truck"></i> Yet to Be Shipped</a>
            <a href="#" onclick="loadPage('address.php')"><i class="bi bi-geo-alt"></i> My Addresses</a>
            <a href="#" onclick="loadPage('profile.php')"><i class="bi bi-person"></i> My Profile</a>
            <a href="#" class="logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <div class="main" id="main">
          <iframe class="content-frame" id="content-frame"></iframe>
          <div class="profile-card">
            <h2>Username</h2>
            <p><i class="bi bi-envelope"></i> User email</p>
            <p><i class="bi bi-telephone"></i> 999999999</p>
            <button onclick="loadPage('profile.html')">
<i class="bi bi-pencil"></i> Edit Profile
</button>
        </div>

            <div class="grid-container" id="dashboard-grid">
                <div class="grid-item" onclick="loadPage('sell_books.php')">
                    <i class="bi bi-book"></i>
                    <h6>Sell Books</h6>
                </div>
                <div class="grid-item" onclick="loadPage('check_profits.php')">
                    <i class="bi bi-graph-up"></i>
                    <h6>Check Profits</h6>
                </div>
                <div class="grid-item" onclick="loadPage('yet_to_ship.php')">
                    <i class="bi bi-truck"></i>
                    <h6>Yet to Be Shipped</h6>
                </div>
                <div class="grid-item" onclick="loadPage('address.php')">
                    <i class="bi bi-geo-alt"></i>
                    <h6>My Addresses</h6>
                </div>
                <div class="grid-item" onclick="loadPage('profile.php')">
                    <i class="bi bi-person"></i>
                    <h6>My Profile</h6>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadPage(page) {
        const frame = document.getElementById("content-frame");
        const dashboardGrid = document.getElementById("dashboard-grid");
        const profileCard = document.querySelector(".profile-card");

        frame.src = page;
        frame.style.display = "block";

        dashboardGrid.style.display = "none";
        profileCard.style.display = "none";
    }
    </script>
    <?php include ('includes/footer.php'); ?>
</body>
</html>
