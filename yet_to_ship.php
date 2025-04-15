<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yet to Be Shipped</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        table {
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto; /* Allows columns to adjust dynamically */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px; /* Reduced padding for smaller cells */
            text-align: center; /* Center-align text */
            position: relative; /* For relative positioning of content */
        }
        th {
            background-color: #f4f4f4;
        }
        .status {
            font-weight: bold;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
        }
        .shipped {
            background-color: #4CAF50; /* Green for shipped */
        }
        .not-shipped {
            background-color: #f44336; /* Red for not shipped */
        }
        .book-image {
            width: 15%; /* 75% of the cell's width */
            /* 75% of the cell's height */
            object-fit: cover;
            margin-bottom: 5px; /* Reduced margin */
            border: 2px solid #ddd;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .book-name {
            text-align: center;
            font-size: 0.9em; /* Reduced font size */
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Yet to Be Shipped</h1>
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Quantity</th>
                <th>Shipping Status</th>
            </tr>
        </thead>
        <tbody id="shippingTable">
            
        </tbody>
    </table>

    <script>
        const books = [
            { name: "Book A", quantity: 5, image: "book_a.jpg", shipped: true },
            { name: "Book B", quantity: 3, image: "book_b.webp", shipped: false },
            { name: "Book C", quantity: 2, image: "book_c.jpg", shipped: true }
        ];

        function displayShippingStatus() {
            const tableBody = document.getElementById("shippingTable");

            books.forEach(book => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>
                        <img src="${book.image}" alt="${book.name}" class="book-image">
                        <div class="book-name">${book.name}</div>
                    </td>
                    <td>${book.quantity}</td>
                    <td>
                        <span class="status ${book.shipped ? 'shipped' : 'not-shipped'}">
                            ${book.shipped ? 'Shipped' : 'Not Shipped'}
                        </span>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        displayShippingStatus();
    </script>
</body>
</html>