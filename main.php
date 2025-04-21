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
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&display=swap" rel="stylesheet"> -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Dosis:wght@200..800&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inspiration&family=Italiana&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
  .input-group {
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
      <div class="card bg-dark text-white" style="font-size:20px;">
        <img src="assets/book.webp" class="card-img" alt="bookstore" style="height:400px;background-size:cover;opacity:50%";>
        <div class="card-img-overlay">
          <h5 class="card-title" style="text-align: center;font-size:30px;">Buy and Sell books online for Actual Money!</h5>
          <p class="card-text" style="text-align: center;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><br><br>
          <div class="row" style="justify-content: center;">
            <div class="col-sm-2">
              <div class="card" style="align-items: center;">
                <div class="card-body">
                  <img src="assets/buy.png" style="height:70px;width:70px;">
                  <a href="buybooks.php" class="btn" style="font-size:18px;background-color: #5c3d2e;color:#f8f1eb">Buy Books</a>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="card">
                <div class="card-body">
                  <img src="assets/sell.png" style="height:70px;width:70px;">
                  <a href="sell_books.php" class="btn" style="font-size:18px;background-color: #5c3d2e;color:#f8f1eb">Sell  Books</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br>
    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel" style="font-size:25px;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card-wrapper container-sm d-flex justify-content-around">
            
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">10% OFF</span>
              <img src="assets/b1.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $20</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>
              </div>
            </div>
    
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">15% OFF</span>
              <img src="assets/b2.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $18</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>
              </div>
            </div>
    
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">20% OFF</span>
              <img src="assets/b3.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $25</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card-wrapper container-sm d-flex justify-content-around">
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">10% OFF</span>
              <img src="assets/b1.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $20</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>              </div>
            </div>
    
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">15% OFF</span>
              <img src="assets/b2.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $18</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>              </div>
            </div>
    
            <div class="card position-relative" style="width: 18rem;">
              <span class="badge bg-danger position-absolute top-0 end-0 m-2">20% OFF</span>
              <img src="assets/b3.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <p class="card-text"><strong>Price: $25</strong></p>
                <a href="#" class="btn" style="font-size:15px;background-color: #5c3d2e;color:#f8f1eb">Buy Book</a>
                <a href="#" class="btn" style="font-size:15px;background-color:green;color:#f8f1eb">Add to Cart</a>              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
    
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="px-4 py-5 my-5 text-center" style="background-color: #5c3d2e;color:#f8f1eb">
      <h1 class="display-5 fw-bold text-body-emphasis">EpicShelf</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4" style="font-size:25px;">EpicShelf is a web app for buying, selling, and renting books effortlessly. Whether you want to sell old books, find affordable reads, or rent textbooks, EpicShelf connects readers and sellers seamlessly. With a user-friendly interface, it simplifies book transactions while promoting sustainability through book reuse and accessibility.</p>
      </div>
    </div>
    <div class="container">
    <div class="p-5 text-center bg-body-tertiary rounded-3" >
      <h1 class="text-body-emphasis" style="font-size:40px;">Have used old books cluttering on your bookshelf?</h1>
      <p class="col-lg-8 mx-auto fs-5 text-muted" style="font-size:40px;">
        Why not sell your old books and convert them into 'Real Money' into your account?<br>
"Sell your used books, directly to a book lover just like you for actual money."
      </p>
      <div class="d-inline-flex gap-2 mb-5">
        <button class="d-inline-flex align-items-center btn btn-lg px-4 rounded-pill" type="button" style="background-color: #5c3d2e;color:#f8f1eb">
          Post free ad now
          <svg class="bi" width="20" height="24"><use xlink:href="#arrow-right-short"></use></svg>
        </button>
      </div>
    </div>
  </div>
    <div class="container px-4 py-5" id="custom-cards" >
      <h2 class="pb-2 border-bottom" style="color:#5c3d2e;font-size:50px;">How to sell your old books online on EpicShelf?</h2>
  
      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden  rounded-4 shadow-lg" style="background-image: url('ad.webp'); background-repeat:no-repeat;background-position: center;opacity:70%">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-black text-shadow-1">
              <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-size:50px">Post an ad for selling used books</h3>
            </div>
          </div>
        </div>
  
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden rounded-4 shadow-lg" style="background-image: url('money.jpg'); background-repeat:no-repeat;background-position:center;opacity:70%">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-black text-shadow-1">
              <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-size:50px;">Set the selling price for your books</h3>
            </div>
          </div>
        </div>
  
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden rounded-4 shadow-lg" style="background-image: url('buyingandselling.avif');background-repeat:no-repeat;background-size:cover;opacity:70%;">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-black text-shadow-1">
              <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-size:50px;">Get paid into your UPI/Bank account</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="px-4 py-2 my-2 text-center">
      <!-- <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <h1 class="display-5 fw-bold text-body-emphasis" style="color:#5c3d2e">Read from our BLOG</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-1" >
      <div class="col">
        <div class="card h-100">
          <img src="assets/howtosell.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-size:30px;">Where and how to sell books online?</h5>
            <p class="card-text" style="font-size:20px">EpicShelf has a robust User Management System to handle different types of users, including buyers, sellers, and renters, ensuring a seamless experience across the platform.<br>The seller needs to add a security deposit of minimum Rs. 500 can be withdraw
              anytime but if any book is listed cannot be withdrawn and if balance less than 500,
              New book cannot be listed</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="assets/booksonchair.webp" class="card-img-top" alt="..." style="height:275px;">
          <div class="card-body">
            <h5 class="card-title" style="font-size:30px;">Confused about what to do with your old books?</h5>
            <p class="card-text" style="font-size:20px">Now the question is what should a person do after reading new books?
              The answer is, resell used books to some another book lover just like you. By selling used books, you are trying to keep the book’s motto alive and are helping to spread books knowledge ahead. If you like to do so, then you will definitely feel that how will I find the buyer for my book who will be ready to buy second hand books from you and where I can sell used books? Don’t worry, we have an answer to all of your questions.
              If you are a true book lover and you too want to sell your old used books then EpicShelf is just for you – on a silver platter.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100" style="background-color: #5c3d2e;">
          <img src="assets/logo.png" class="card-img-top" alt="...">
          <br><br><br><br><br><br>
          <div class="card-body">
            <h5 class="card-title" style="font-size:30px;color:#f8f1eb">What is EpicShelf?</h5>
            <p class="card-text" style="font-size:20px; color:#f8f1eb">EpicShelf aims to empower small businesses, especially Instagram sellers, by providing a dedicated platform to list and sell books easily. It offers a seamless experience for users to buy, sell, and rent books while ensuring affordability and accessibility. The rental system includes a security feature where renters must maintain a minimum balance of 125% of the book's price. By promoting book reuse and sustainable reading habits, EpicShelf creates a community-driven marketplace that supports both sellers and readers.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container px-4 py-5" id="icon-grid" >
      <h2 class="border-bottom ">EpicShelf featured on</h2>
  
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <div class="col d-flex align-items-start">
          <svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#bootstrap"></use></svg>
          <div>
            <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">NextBigWhat</h3>
            <!-- <p>Paragraph of text beneath the heading to explain the heading.</p> -->
          </div>
        </div>
        <div class="col d-flex align-items-start">
          <svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cpu-fill"></use></svg>
          <div>
            <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">LaunchingNext</h3>
            <!-- <p>Paragraph of text beneath the heading to explain the heading.</p> -->
          </div>
        </div>
        <div class="col d-flex align-items-start">
          <svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"></use></svg>
          <div>
            <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Starter Story</h3>
            <!-- <p>Paragraph of text beneath the heading to explain the heading.</p> -->
          </div>
        </div>
        <div class="col d-flex align-items-start">
          <svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#home"></use></svg>
          <div>
            <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">StartUpFreak</h3>
            <!-- <p>Paragraph of text beneath the heading to explain the heading.</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="text me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="color: #5c3d2e;background-color:#f8f1eb">
      <div class="my-3 py-3">
        <h2 class="display-5">Our Community</h2>
        <p class="lead">We're not just another shopping website where you buy from professional sellers - we are a vibrant community of students, book lovers across India who deliver happiness to each other!</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 60%; height: 400px; border-radius: 21px 21px 0 0;">
        <img src="assets/peopleconnecting.jpg" style="height:400px;width:850px;border-radius:20px 20px 0px 0px">
      </div>
    </div>
</body>
<?php include ('includes/footer.php'); ?>
</html>
