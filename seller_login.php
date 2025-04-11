<?php
include('includes/connection.php'); // Ensure this includes the DB connection

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // SIGNUP
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $aadhaar = $_POST['aadhaar'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $message = "Passwords do not match!";
        } else {
            // Check if user exists
            $check = $conn->prepare("SELECT id FROM sellers WHERE email = ?");
            $check->bind_param("s", $email);
            $check->execute();
            $check->store_result();

            if ($check->num_rows > 0) {
                $message = "Email already registered!";
            } else {
                // Insert new user
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $conn->prepare("INSERT INTO sellers (name, email, phone, dob, aadhaar, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $name, $email, $phone, $dob, $aadhaar, $gender, $hashed_password);
                if ($stmt->execute()) {
                    $message = "Registration successful! You can now login.";
                } else {
                    $message = "Error: " . $stmt->error;
                }
            }
        }
    }

    // LOGIN
    if (isset($_POST['login'])) {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['name'] = $name;
                header("Location: dash.php");
                exit;
            } else {
                $message = "Incorrect password.";
            }
        } else {
            $message = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EpicShelf</title>
     <!-- Bootstrap CSS link is here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- CSS link is here -->
    <link rel="stylesheet" href="css/style_seller.css">

    <!-- Font Awesome link is here -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&display=swap" rel="stylesheet">
    <!-- Inline CSS is here -->
    <style>
        body {
            background-color: #f8f1eb;
            color: #333;
        }
    </style>
    
</head>
<body>

  <!-- Navigation bar starts here -->
  <?php include ('includes/header.php'); ?>
        <!-- Navigation bar ends here -->

        <!-- User login nav starts here -->
        <a href="login.php" >
            <button class="lb">User login</button>
        </a>
        <!-- User login nav ends here -->

        <!-- card starts here -->
        
  
        <div class="containerf" id="containerf">
            <div class="form-containerf sign-up-containerf">
              <form action="#" class="form" method="post">
                <h1>Sign Up</h1>
                <div class="social-containerf">
                  <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                  <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
            <img id="photoPreview" class="w-24 h-24 rounded-full mx-auto hidden" />
   
                <input type="text" name="name" placeholder="Name" required />
                <br>
                <input type="email" name="email" placeholder="Email" required />
                <br>
                <input type="number" name="phone" placeholder="Phone Number" required />
                <br>
                <label for="dob">Date of birth</label>
          
                <input type="date" name="dob" id="dob" required />
                <br>
                <input type="number" name="aadhaar" id="aadhaar" placeholder="Aadhar Card Number" required />
                <br>
                <select name="gender" class="w-full p-2 border rounded-lg" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
                <br>
                <input type="password" name="password" placeholder="Password" required />
                <br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required />
                <br>
                <<button type="submit" name="signup">Sign Up</button>
              </form>
            </div>
            <div class="form-containerf sign-in-containerf">
                <form action="#" class="form" method="post">
                <h1>Login</h1>
                <div class="social-containerf">
                  <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                  <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email account</span>
                <input type="email" name="login_email" placeholder="Email" required />
                <br>
                <input type="password" name="login_password" placeholder="Password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Login</button>
              </form>
            </div>
            <div class="overlay-containerf">
              <div class="overlay">
                <div class="overlay-panel overlay-left">
                  <h1>Welcome Back!</h1>
                  <p>To stay connected with us please login with your personal info</p>
                  <button class="ghost" id="SignIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                  <h1>Hello, Seller!</h1>
                  <p>Enter your personal details and start your journey with us </p>
                  <button class="ghost" id="SignUp">Sign Up</button>
                </div>
              </div>
        
            </div>
          </div>        
          <br><br>
        <!-- card ends here -->



        <!-- Javascript start here -->
        <script>
          const SignUpButton = document.getElementById("SignUp");
        const SignInButton = document.getElementById("SignIn");
        const containerf = document.getElementById("containerf");

        SignUpButton.addEventListener('click', () => {
            containerf.classList.add("right-panel-active")
        });

        SignInButton.addEventListener('click', () => {
            containerf.classList.remove("right-panel-active")
        });

        document.getElementById("dob").addEventListener("change", function() {
            let dob = new Date(this.value);
            let age = new Date().getFullYear() - dob.getFullYear();
            if (age < 21) {
                alert("You must be at least 21 years old to sign up.");
                this.value = "";
            }
        });
        
        document.getElementById("aadhaar").addEventListener("input", function() {
            if (this.value.length > 12) this.value = this.value.slice(0, 12);
            if (!/^\d{12}$/.test(this.value) && this.value.length === 12) {
                alert("Aadhaar number must be exactly 12 digits.");
                this.value = "";
            }
        });

        document.getElementById("profilePhoto").addEventListener("change", function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let img = document.getElementById("photoPreview");
                img.src = reader.result;
                img.classList.remove("hidden");
            };
            reader.readAsDataURL(event.target.files[0]);
        });
      </script>
      <!-- Javascript ends here -->
</body>
<?php include ('includes/footer.php'); ?>
<!-- footer bar ends here -->
</html>
