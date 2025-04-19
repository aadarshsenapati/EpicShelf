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
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/buybooks.css">
</head>
<style>
    .wishlist-btn {
        background: none;
        border: none;
        cursor: pointer;
        color: #ccc;
        font-size: 20px;
    }

    .wishlist-btn.active {
        color: red;
    }

    .wishlist-btn .sprinkles {
        display: none;
    }
</style>

<body>
<?php include ('includes/header.php'); ?>
        <main>
          <!-- Featured Books Section -->
          <div class="py-5" style="background-color: #f8f1eb;">
            <div class="container text-center">
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <a href="college-books.html" class="featured-book">
                        <img src="assets/college_books.png" alt="College Books">
                        <p>College Books</p>
                    </a>
                    <a href="exam-preparation.html" class="featured-book">
                        <img src="assets/exam_preparation.png" alt="Exam Preparation">
                        <p>Exam Preparation</p>
                    </a>
                    <a href="reading-books.html" class="featured-book">
                        <img src="assets/reading_books.png" alt="Reading Books">
                        <p>Reading Books</p>
                    </a>
                    <a href="school-books.html" class="featured-book">
                        <img src="assets/School_books.png" alt="School Books">
                        <p>School Books (upto 12th)</p>
                    </a>
                    <a href="all-second-hand-books.html" class="featured-book">
                        <img src="assets/view_all.png" alt="View All Second Hand Books">
                        <p>View All Books</p>
                    </a>
                </div>
            </div>
          </div>
      
        <!-- Carousel Section -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="assets/buy1.png" class="d-block w-100" alt="Slide 1">
              </div>
              <div class="carousel-item">
                  <img src="assets/buy2.png" class="d-block w-100" alt="Slide 2">
              </div>
              <div class="carousel-item">
                  <img src="assets/buy3.png" class="d-block w-100" alt="Slide 3">
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
      </main>
      <div  style="background-color: #f8f1eb;">
          <div class="container text-center">
              <!-- Banner Section -->
              <div class="mb-5 py-5">
                  <div class="p-4" style="background-color: #e8f5e9; border-radius: 10px;">
                      <h5>Explore from over 1000s of used books on EpicShelf</h5>
                      <a href="#" class="btn btn-primary mt-3">View All Books</a>
                  </div>
              </div>
      
              <!-- Featured Books Section -->
              <h2 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 600;">Select From Top Books Categories</h2>
              <div class="py-5" style="background-color: #f8f1eb;">
          </div>
      <div class="container text-center">
         
          <div class="row justify-content-center">
              <div class="col-md-3 col-sm-6 mb-4">
                  <div class="card shadow-sm custom-card">
                      <img src="assets/College_books1.png" class="card-img-top" alt="College Books">
                      <div class="card-body">
                          <h5 class="card-title">College Books</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 mb-4">
                  <div class="card shadow-sm custom-card">
                      <img src="assets/Exam_preparation1.png" class="card-img-top" alt="Exam Preparation">
                      <div class="card-body">
                          <h5 class="card-title">Exam Preparation</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 mb-4">
                  <div class="card shadow-sm custom-card">
                      <img src="assets/Novels.png" class="card-img-top" alt="Reading Books">
                      <div class="card-body">
                          <h5 class="card-title">Reading Books</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 mb-4">
                  <div class="card shadow-sm custom-card">
                      <img src="assets/School_books1.png" class="card-img-top" alt="School Books">
                      <div class="card-body">
                          <h5 class="card-title">School Books (upto 12th)</h5>
                      </div>
                  </div>
              </div>
          </div>
              <h3 class="mt-5 mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 600;">Browse from Curated Book Categories</h3>
              <div class="d-flex flex-wrap justify-content-center gap-3">
                  <a href="#" class="btn btn-outline-primary">Arihant Books</a>
                  <a href="#" class="btn btn-outline-primary">Books for JEE</a>
                  <a href="#" class="btn btn-outline-primary">CAT Books</a>
                  <a href="#" class="btn btn-outline-primary">Dictionary</a>
                  <a href="#" class="btn btn-outline-primary">Encyclopedia</a>
                  <a href="#" class="btn btn-outline-primary">Gate Books</a>
                  <a href="#" class="btn btn-outline-primary">GMAT Books</a>
                  <a href="#" class="btn btn-outline-primary">Health</a>
                  <a href="#" class="btn btn-outline-primary">History & Archaeology Books</a>
                  <a href="#" class="btn btn-outline-primary">Made Easy Books</a>
                  <a href="#" class="btn btn-outline-primary">Mythology</a>
                  <a href="#" class="btn btn-outline-primary">NCERT Books</a>
                  <a href="#" class="btn btn-outline-primary">Politics Books</a>
                  <a href="#" class="btn btn-outline-primary">RD Sharma Books</a>
              </div>
          </div>
      </div>
      <div class="container my-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h4>Newly Added Books</h4>
              <a href="#" class="btn btn-link text-primary">View All</a>
          </div>
          <div class="row flex-nowrap overflow-auto" style="gap: 15px;">
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/greatest_shortstory.png" class="card-img-top" alt="Greatest Short Stories For Children">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Greatest Short Stories For Children">Greatest Short Stories...</h6>
                          <p class="text-success">₹169 <span class="text-muted text-decoration-line-through">₹299</span></p>
                          <p class="badge bg-success">43% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/Secret_garden.png" class="card-img-top" alt="The Secret Garden">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="The Secret Garden">The Secret Garden</h6>
                          <p class="text-success">₹289 <span class="text-muted text-decoration-line-through">₹523</span></p>
                          <p class="badge bg-success">45% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/10mins_bedtime.png" class="card-img-top" alt="10 Mins Bedtime Stories">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="10 Mins Bedtime Stories">10 Mins Bedtime...</h6>
                          <p class="text-success">₹449 <span class="text-muted text-decoration-line-through">₹599</span></p>
                          <p class="badge bg-success">35% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/handbook.png" class="card-img-top" alt="Handbook Computer Science & IT for GATE,IES,PSU">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Handbook Computer Science & IT for GATE,IES,PSU">Handbook Computer...</h6>
                          <p class="text-success">₹215 <span class="text-muted text-decoration-line-through">₹295</span></p>
                          <p class="badge bg-success">27% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/indian_economy.png" class="card-img-top" alt="Indian Economy 8th Edition (In English) 2025">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Indian Economy 8th Edition (In English) 2025">Indian Economy 8th...</h6>
                          <p class="text-success">₹400 <span class="text-muted text-decoration-line-through">₹550</span></p>
                          <p class="badge bg-success">27% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/science_textbook.png" class="card-img-top" alt="Science Textbook For Class VII">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Science Textbook For Class VII">Science Textbook...</h6>
                          <p class="text-success">₹135 <span class="text-muted text-decoration-line-through">₹150</span></p>
                          <p class="badge bg-success">10% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/cbse_claa10.png" class="card-img-top" alt="PW CBSE Class 10 PYQs - Past 10 Years Solved Papers For 2025-2026 Exams">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="PW CBSE Class 10 PYQs - Past 10 Years Solved Papers For 2025-2026 Exams">PW CBSE Class 10...</h6>
                          <p class="text-success">₹679 <span class="text-muted text-decoration-line-through">₹849</span></p>
                          <p class="badge bg-success">20% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
          </div>
      <div class="container my-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h4>Buy Second Hand Fiction Books</h4>
              <a href="#" class="btn btn-link text-primary">View All</a>
          </div>
          <div class="row flex-nowrap overflow-auto" style="gap: 15px;">
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book1.png" class="card-img-top" alt="Twisted Love">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Twisted Love">Twisted Love</h6>
                          <p class="text-success">₹199 <span class="text-muted text-decoration-line-through">₹299</span></p>
                          <p class="badge bg-success">43% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book2.png" class="card-img-top" alt="Republic Paperback – 22 July 2013">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Republic Paperback – 22 July 2013">Republic Paperback</h6>
                          <p class="text-success">₹170 <span class="text-muted text-decoration-line-through">₹250</span></p>
                          <p class="badge bg-success">32% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book3.png" class="card-img-top" alt="The Art of Being Alone: Loneliness Was My Cage, Solitude Is My Home">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="The Art of Being Alone: Loneliness Was My Cage, Solitude Is My Home">The Art of Being Alone</h6>
                          <p class="text-success">₹196<span class="text-muted text-decoration-line-through">₹299</span></p>
                          <p class="badge bg-success">34% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book4.png" class="card-img-top" alt="THE SILENT PATIENT [Paperback] Michaelides, Alex">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="THE SILENT PATIENT [Paperback] Michaelides, Alex">THE SILENT PATIENT...</h6>
                          <p class="text-success">₹256 <span class="text-muted text-decoration-line-through">₹399</span></p>
                          <p class="badge bg-success">36% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book5.png" class="card-img-top" alt="Never Lie : A Totally Gripping Thriller with Mind-bending Twists">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="Never Lie : A Totally Gripping Thriller with Mind-bending Twists">Never Lie...</h6>
                          <p class="text-success">₹242 <span class="text-muted text-decoration-line-through">₹550</span></p>
                          <p class="badge bg-success">38% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/fiction_book6.png" class="card-img-top" alt="A Man Called Ove ">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="A Man Called Ove ">A Man Called...</h6>
                          <p class="text-success">₹257 <span class="text-muted text-decoration-line-through">₹399</span></p>
                          <p class="badge bg-success">36% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-6 mb-4">
                  <div class="card shadow-sm">
                      <div class="card-img-container" style="background-color: #f8f1eb; padding: 10px;">
                          <img src="assets/cbse_claa10.png" class="card-img-top" alt="PW CBSE Class 10 PYQs - Past 10 Years Solved Papers For 2025-2026 Exams">
                          <button class="wishlist-btn position-absolute top-0 end-0 m-2">
                                <i class="fas fa-heart "></i>
                                <div class="sprinkles"></div> 
                          </button>
                      </div>
                      <div class="card-body">
                          <h6 class="card-title" title="PW CBSE Class 10 PYQs - Past 10 Years Solved Papers For 2025-2026 Exams">PW CBSE Class 10...</h6>
                          <p class="text-success">₹679 <span class="text-muted text-decoration-line-through">₹849</span></p>
                          <p class="badge bg-success">20% off</p>
                          <a href="#" class="btn btn-primary btn-sm w-100">Buy Now</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="container my-5">
          <div class="text-center mb-4">
              <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #5c3d2e;">
                  Discover the Best Selection of Books Online
              </h2>
              <p style="font-size: 16px; color: #555; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                  EpicShelf is an innovative online platform designed to simplify the buying, selling, and renting of books while empowering small businesses, particularly independent sellers from platforms like Instagram. By bridging the gap between book enthusiasts and sellers, EpicShelf creates a seamless and user-friendly marketplace.
              </p>
          </div>
      
          <div class="row align-items-center">
              <div class="col-md-4">
                  <img src="assets/Group_books.png" alt="Books Banner" class="img-fluid rounded shadow-sm" style="border-radius: 15px;">
              </div>
              <div class="col-md-8">
                  <div class="p-4" style="background-color: #f8f1eb; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                      <h4 style="font-family: 'Montserrat', sans-serif; font-weight: 600; color: #5c3d2e;">
                          Why Choose EpicShelf?
                      </h4>
                      <ul style="list-style: none; padding: 0; margin-top: 15px; color: #555; font-size: 15px;">
                          <li class="mb-2">
                              <i class="far fa-check-circle text-success me-2"></i>
                              Structured rental system ensuring smooth transactions.
                          </li>
                          <li class="mb-2">
                              <i class="far fa-check-circle text-success me-2"></i>
                              Secure payment gateways and a digital wallet.
                          </li>
                          <li class="mb-2">
                              <i class="far fa-check-circle text-success me-2"></i>
                              Community-driven commerce promoting sustainability.
                          </li>
                          <li class="mb-2">
                              <i class="far fa-check-circle text-success me-2"></i>
                              Robust admin dashboard for dispute resolution.
                          </li>
                      </ul>
                      <a href="#" class="btn btn-primary mt-3" style="border-radius: 20px; padding: 10px 20px; font-size: 16px;">
                          Explore Now
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <?php include ('includes/footer.php'); ?>
      <script>
    document.addEventListener('DOMContentLoaded', function () {
        const wishlistButtons = document.querySelectorAll('.wishlist-btn');

        wishlistButtons.forEach(button => {
            button.addEventListener('click', function () {
                this.classList.toggle('active');
            });
        });
    });
</script>
</body>
</html>
