<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <link rel="stylesheet" href="css/sell_books.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Charmonman:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
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
            max-width: 400px; 
            margin-right: 20px;
        }
        
        .input-group-text {
            background-color: #5c3d2e;
            color: #f8f1eb;
            border: none;
        }
        
        .form-control {
            border: none;
            border-radius: 20px;
            width: 100%;
        }
        
        .btn-search {
            background-color: #f8f1eb;
            color: #5c3d2e;
            border: 1px solid #f8f1eb;
            border-radius: 20px;
        }
        
        .btn-search:hover {
            background-color: #5c3d2e;
            color: #f8f1eb;
        }
       
.custom-dropdown-toggle {
    font-size: 16px;
    font-weight: 600;
    color: #5c3d2e;
    transition: color 0.3s ease;
}

.custom-dropdown-toggle:hover {
    color: #d4a373;
}
.custom-dropdown-menu {
    background-color: #f8f1eb;
    border: 1px solid #d4a373;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}
.custom-dropdown-item {
    font-size: 14px;
    font-weight: 500;
    color: #5c3d2e;
    padding: 10px 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.custom-dropdown-item:hover {
    background-color: #d4a373;
    color: #fff;
    border-radius: 5px;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="buybooks.php"><img src="assets/logo.png" alt="EpicShelf" style="height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <div class="input-group me-4">
                            <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Book name/ Author/ Subject">
                            <button class="btn btn-search"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle custom-dropdown-toggle" href="#" id="myAccountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-user"></i> My Account
                      </a>
                      <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="myAccountDropdown">
                          <li><a class="dropdown-item custom-dropdown-item" href="seller_login.php">Login/Sign Up</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="buybooks.php">Browse Top Book Categories</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="dash.php">My dash</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="profile.php">My Profile</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="orders.php">My Orders</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="yet_to_ship.php">My Selling Orders</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="Wishlist.php">Wishlist</a></li>
                          <li><a class="dropdown-item custom-dropdown-item" href="#">How it Works?</a></li>
                      </ul>
                  </li>                
                  <li class="nav-item"><a class="nav-link" href="cart_login_signup.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
