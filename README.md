# EpicShelf
### Introduction
EpicShelf is a web app for buying, selling, and renting books effortlessly. Whether you want to sell old books, find affordable reads, or rent textbooks, EpicShelf connects readers and sellers seamlessly. With a user-friendly interface, it simplifies book transactions while promoting sustainability through book reuse and accessibility.

### Objective
EpicShelf aims to empower small businesses, especially Instagram sellers, by providing a dedicated platform to list and sell books easily. It offers a seamless experience for users to buy, sell, and rent books while ensuring affordability and accessibility. The rental system includes a security feature where renters must maintain a minimum balance of 125% of the book's price. By promoting book reuse and sustainable reading habits, EpicShelf creates a community-driven marketplace that supports both sellers and readers.

### Abstract
EpicShelf is an innovative online platform designed to simplify the buying, selling, and renting of books while empowering small businesses, particularly independent sellers from platforms like Instagram. By bridging the gap between book enthusiasts and sellers, EpicShelf creates a seamless and user-friendly marketplace where individuals can effortlessly list, discover, and acquire books.

The platform introduces a structured rental system where renters must maintain a minimum balance of 125% of the book’s price, ensuring smooth transactions and accountability. Sellers are required to maintain a minimum wallet balance of ₹500 to list books, reinforcing a secure and trustworthy ecosystem. Additionally, EpicShelf incorporates a digital wallet, secure payment gateways, and an automated rental duration tracker, enhancing user experience and security.

With a focus on accessibility, sustainability, and community-driven commerce, EpicShelf encourages book reuse while making reading affordable and convenient. The platform prevents direct communication between buyers and sellers outside the system, ensuring a safe and controlled environment. A robust admin dashboard facilitates dispute resolution, transaction monitoring, and platform analytics, optimizing operational efficiency.

Built using PHP as the core backend technology, along with MySQL for database management and Bootstrap, JavaScript, and CSS for a responsive user interface, EpicShelf delivers a fully functional and scalable web solution. With features like an intuitive search and filter system, wallet-based transactions, and integrated customer support, EpicShelf redefines the online book marketplace, fostering a sustainable and efficient book trading community.

### Scope of Work 

1) User management<br>
   a) Register and login page <br>
   <pre>
     i) User
     ii) Seller
     iii) Admin
   </pre>
   b) Profile management for listing and transaction history<br>

2) Book Listings & Transactions<br>
   a) Sellers can list books with details<br>
   <pre>
        i) Title
        ii) Author
        iii) Price
        iv) Condition [New/Old]
        v) Images
        vi) Rent or sell
        vii) Catagory [Crime/Thriller/Suspense/Love/etc]
   </pre>
   b) Buyers can browse, search, and purchase books<br>
   Search by:<br>
   <pre>
         i) Title
        ii) Author
       iii) Category
   </pre>
   Filter By:<br>
   <pre>
         i) Price
        ii) Condition [New/Old]
        iii) Rent/Sell
         iv) Category
   </pre>
   Sort By:<br>
   <pre>
         i) Price
         ii) Listing date
   </pre>
   c) Recharge wallet<br>
   <pre>
       i) Renters can request books with a minimum balance of 125% of the book price
       ii) Automated rent duration tracking and book return management
    </pre>
3) Payment & Security<br>
   a) Integration of payment gateways for buying, selling, and renting<br>
   b) Secure transactions and balance management<br>
   c) Wallet management<br>
5) Admin Dashboard<br>
   a)  Manage users, listings, and transactions<br>
   b)  Monitor rental balances and disputes<br>
   c)  Incase of damage of book, 90% of the book amount will go to seller from users wallet<br>
6) Notifications & Communication<br>
   a) Email notifications for transactions<br>
   b) Chat with admin for any disputes<br>

### User Management
<p>
   EpicShelf will have a robust User Management System to handle different types of users, including buyers, sellers, and renters, ensuring a seamless experience across the platform.
</p>

#### There will be 3 pages similar to this for:

   <ol>
      <li>User</li>
      <li>Seller [The seller needs to add a security deposit of minimum Rs. 500 can be withdraw <br>anytime but if any book is listed cannot be withdrawn and if balance less than 500,<br>New book cannot be listed]
      </li>
      <li>Admin [This will have an extra field: Employee ID]</li>
   </ol>

<ol>
   <li>User Registration</li>
   <ul>
      <li>Email</li>
      <li>Phone number</li>
      <li>Name</li>
      <li>DOB</li>
      <li>Address</li>
      <li>Password</li>
      <li>Confirm_Password</li>
      <li>Gender</li>
      <li>Profile_Photo</li>
   </ul>
   <li>Login for Users</li>
   <ul>
      <li>Email/Phone_number</li>
      <li>Password</li>
      <li>Remember Me{CheckBox}</li>
   </ul>
   <li>Authentication</li>
   <ul>
      <li>SignUp/Login with Email</li>
      <li>Forget Password</li>
   </ul>
</ol>

### 2. Profile Management
<ol>
   <li>User can update personal info like</li>
   <ul>
      <li>Name</li>
      <li>Contact</li>
      <li>Address</li>
      <li>Profile picture</li>
      <li>Private profile/Public{Public will show the books read/ordered by the perticular person}</li>
   </ul>
   <li>Sellers can update personal info like</li>
   <ul>
      <li>Name</li>
      <li>Contact</li>
      <li>Address</li>
      <li>Profile picture</li>
   </ul>

   <li>Seller Managent</li>
   <ul>
      <li>Book Listings</li>
      <li>Track Sales</li>
      <li>Set mimimum account balance for a perticular book rental</li>
      <li>Profile picture</li>
      <li>Transaction history and Income</li>
      <li>Reviews</li>
      <li>Rating</li>
      <li>Chat with Costomer Care[Admin]</li>
   </ul>
   
   <li>User Profile</li>
   <ul>
      <li>Rental history</li>
      <li>Order history</li>
      <li>Wallet</li>
      <li>Wishlist</li>
      <li>Cart</li>
      <li>Return Date[For rent] and rent cost</li>
      <li>Number of books read[Only for public account]</li>
      <li>Chat with Costomer Care[Admin]</li>
   </ul>

   <li>Admin</li>
   <ul>
      <li>Monitor users</li>
      <li>Chat with seller and user in case of disputs</li>
      <li>Manage transaction</li>
      <li>Analytics of customers</li>
      <li>Income[5% of the transaction to be transfered admin incase of disputs 10% to be transfered]</li>
      <li>All the contact between the user and seller to be done over website. Sharing email id/Contact number will mark '*' in the chat</li>
   </ul>
</ol>

### Sample Requisition
<ol>
   <li> User Requisition</li>
   <ul>
      <li>User visits the registration page</li>
      <li>Provides email, phone number, password, and personal details</li>
      <li>Verifies account via OTP/email confirmation</li>
      <li>Logs into the platform</li>
   </ul>
 <pre>
      <b>SampleUser register and login example in Json request</b>
      {
        "name": "John Doe",
        "email": "johndoe@example.com",
        "phone": "+919876543210",
        "password": "Secure@123",
        "confirm_password": "Secure@123",
        "dob": "2000-04-15",
        "address": "123, Book Street, Delhi, India",
        "gender": "Male",
        "profile_photo": "profile_image_url"
      }
   </pre>

   
   <li> Book Listing (Seller)</li>
   <ul>
      <li>Seller logs in and navigates to the listing section</li>
      <li>Fills in book details and selects rent or sell option</li>
      <li>Book is listed after verification</li>
   </ul>
    <pre>
      <b>Sample Book Listing example in Json request</b>
      {
        "seller_id": 202,
        "book_title": "Data Science Essentials",
        "author": "Jane Smith",
        "price": 350.00,
        "condition": "New",
        "images": ["image1_url", "image2_url"],
        "category": "Technology",
        "listing_type": "Sell"
      }
   </pre>


   <li>Book Search & Purchase</li>
   <ul>
      <li>Buyer searches/filter books</li>
      <li>Adds book to cart</li>
      <li>Proceeds to checkout and payment</li>
      <li>Receives confirmation</li>
   </ul>
    <pre>
      <b>Sample Book Search example in Json request</b>
      {
        "search_query": "Python",
        "filters": {
          "price_range": [100, 500],
          "condition": "New",
          "category": "Programming"
        }
      }
   </pre>
   <pre>
       <b>Sample Book Search example in Json response</b>
      {
        "books": [
          {
            "book_id": 302,
            "title": "Advanced Python Programming",
            "author": "John Coding",
            "price": 299.00,
            "condition": "New"
          },
          {
            "book_id": 405,
            "title": "Python for Data Science",
            "author": "Jane Smith",
            "price": 450.00,
            "condition": "New"
          }
        ]
      }
   </pre>
   <br>
   <pre>
      <b>Sample Book  Purchase example in Json request</b>
      {
        "user_id": 101,
        "book_id": 302,
        "payment_method": "Wallet"
      }
   </pre>
   <br>
   <pre>
      <b>Sample Book  Purchase example in Json response</b>
      {
        "transaction_id": 9001,
        "message": "Purchase successful. Book will be delivered soon."
      }
   </pre>

   <li> Book Rental Process</li>
   <ul>
      <li>User selects rent option</li>
      <li>System checks if wallet has minimum balance (125% of book price)</li>
      <li>Transaction is processed</li>
      <li>System tracks return date.</li>
   </ul>
    <pre>
      <b>Sample Book Rental example in Json request</b>
      {
        "user_id": 101,
        "book_id": 405,
        "rental_days": 15,
        "wallet_balance": 500.00
      }
   </pre>
    <pre>
   <b>Sample Book Rental example in Json response</b>
   {
     "rental_id": 8001,
     "book_title": "Python for Data Science",
     "rental_cost": 20.00,
     "return_date": "2025-03-15",
     "message": "Rental successful"
   }
   </pre>

   <li> Payment Process</li>
   <ul>
      <li>User selects payment method</li>
      <li>System processes transaction via gateway</li>
      <li>Wallet updated accordingly.</li>
   </ul>
    <pre>
      <b>Sample Payment example in Json request</b>
      {
        "user_id": 101,
        "transaction_type": "Recharge",
        "amount": 1000.00,
        "payment_method": "UPI"
      }

   </pre>
    <pre>
   <b>Sample Payment example in Json response</b>
   {
     "transaction_id": 55501,
     "user_id": 101,
     "wallet_balance": 1150.00,
     "message": "Wallet recharged successfully"
   }
   </pre>

   <li>Review Posting</li>
   <ul>
      <li>User purchases a book → A transaction is recorded</li>
      <li>After order delivery, the system unlocks the review feature</li>
      <li>User navigates to the book’s page and clicks on "Write a Review"</li>
      <li>The system checks if the user has a completed transaction for this book</li>
      <li>If verified, the user submits the review (rating + comment)</li>
      <li>The review is stored in the database and displayed on the book page</li>      
   </ul>
    <pre>
      <b>Sample Review posting example in Json request</b>
      {
        "user_id": 101,
        "book_id": 302,
        "rating": 4.5,
        "comment": "Great book! Very insightful and well-written."
      }
   </pre>
    <pre>
   <b>Sample Review posting example in Json response success</b>
   {
     "review_id": 6001,
     "message": "Review submitted successfully.",
     "book_id": 302,
     "rating": 4.5,
     "comment": "Great book! Very insightful and well-written."
   }
   </pre>
   <pre>
      <b>Sample Review posting example in Json response success</b>
      {
        "error": "You can only review books you have purchased.",
        "status": 403
      }
   </pre>
   <h4>Additional:</h4>
   <ol>
      <li>Admin can flag inappropriate reviews</li>
      <li>Sellers can report fake reviews</li>
      <li>Reviews can be edited only within 24 hours of posting</li>
   </ol>
</ol>

### Technology Used
<ol>
   <li>Frontend Scripting</li>
   <ol>
      <li>HTML5</li>
      <li>CSS3</li>
      <li>JavaScript(ES6+)</li>
      <li>Bootstrap(v5.3)</li>
   </ol>
   <li>Server Side Scripting</li>
   <ol>
      <li>PHP(v8.3)</li>
   </ol>
   <li>Database</li>
   <ol>
      <li>MySQL(Version: 8)</li>
   </ol>
   <li>UI/UX Design</li>
   <ol>
      <li>Figma</li>
      <li>Adobe Photoshop Online</li>
   </ol>
</ol>

### Contributors
<ol>
   <li>Aadarsh Senapati</li>
   <li>K. Praveen Kumar</li>
   <li>DNV Likhitha</li>
   <li>T. Likhitha</li>
</ol>
