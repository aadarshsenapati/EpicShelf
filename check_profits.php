<?php
include('includes/connection.php');

$query = "SELECT book_name, price, quantity_sold, total_earnings, sold_date FROM books_sold";
$result = $conn->query($query);

$books_sold = [];
$total_earnings = 0;

while ($row = $result->fetch_assoc()) {
    $books_sold[] = $row;
    $total_earnings += $row['total_earnings'];
}
?>
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
            background-color: #f8f1eb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto;
            border: 2px solid #5c3d2e; 
        }
        th, td {
            border: 1px solid #5c3d2e; 
            padding: 10px;
            text-align: left;
        }
        th {
            background: #5c3d2e;
            color: #fff;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            text-align: right;
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
                <th>Sold Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books_sold)): ?>
                <?php foreach ($books_sold as $book): ?>
                    <tr>
                        <td>
                            <div class="book-name"><?php echo htmlspecialchars($book['book_name']); ?></div>
                        </td>
                        <td>$<?php echo number_format($book['price'], 2); ?></td>
                        <td><?php echo $book['quantity_sold']; ?></td>
                        <td>$<?php echo number_format($book['total_earnings'], 2); ?></td>
                        <td><?php echo htmlspecialchars($book['sold_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No books sold yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <p class="total">Total Earnings: $<?php echo number_format($total_earnings, 2); ?></p>
</body>
</html>
