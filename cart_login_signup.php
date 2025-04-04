<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EpicShelf</title>
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

    
</head>
<body>
  <?php include ('includes/header.php'); ?>
      <div class="container" style="width:1400px">
      <div class="container my-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center bg-body-tertiary border rounded-3">
            <li class="breadcrumb-item">
              <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                <svg class="bi" width="16" height="16"><use xlink:href="#house-door-fill"></use></svg>
                Cart (0)
              </a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
      <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
          <img src="assets/cart_login.jpg" style="height:350px;width:350px;">
          <p class="col-lg-8 mx-auto fs-5 text-muted">
            Please login/signup
          </p>
          <div class="d-inline-flex gap-2 mb-5">
            <button class="d-inline-flex align-items-center btn btn-lg px-4 rounded-pill" type="button" style="background-color: #5c3d2e;color:#f8f1eb;">
              Signup
            </button>
            <button class="btn btn-outline-secondary btn-lg px-4 rounded-pill" type="button" style="background-color:#f8f1eb;color:#5c3d2e">
              Login
            </button>
          </div>
        </div>
      </div>
</body>
<?php include ('includes/footer.php'); ?>
</html>