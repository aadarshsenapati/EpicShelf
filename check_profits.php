<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Profits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto; /* Allows columns to adjust dynamically */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            text-align: right;
        }
        .book-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin-bottom: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .book-name {
            text-align: center;
            font-size: 1em;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Check Profits</h1>
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Price</th>
                <th>Quantity Sold</th>
                <th>Total Earnings</th>
            </tr>
        </thead>
        <tbody id="profitsTable">
            
        </tbody>
    </table>
    <p class="total">Total Earnings: $<span id="totalEarnings">0</span></p>

    <script>
        const booksSold = [
            { name: "Book A", price: 20, quantity: 5, image: "book_a.jpg" },
            { name: "Book B", price: 15, quantity: 3, image: "book_b.webp" },
            { name: "Book C", price: 25, quantity: 2, image: "book_c.jpg" }
        ];

        function calculateProfits() {
            const tableBody = document.getElementById("profitsTable");
            let totalEarnings = 0;

            booksSold.forEach(book => {
                const earnings = book.price * book.quantity;
                totalEarnings += earnings;

                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>
                        <img src="${book.image}" alt="${book.name}" class="book-image">
                        <div class="book-name">${book.name}</div>
                    </td>
                    <td>$${book.price}</td>
                    <td>${book.quantity}</td>
                    <td>$${earnings}</td>
                `;
                tableBody.appendChild(row);
            });

            document.getElementById("totalEarnings").innerText = totalEarnings;
        }

        calculateProfits();
    </script>
</body>
</html>