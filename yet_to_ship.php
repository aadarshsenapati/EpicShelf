<?php
include('includes/connection.php');

// Fetch shipment data from the database
$query = "SELECT 
            s.id AS shipment_id,
            p.name AS product_name,
            se.name AS seller_name,
            s.quantity,
            s.shipped,
            s.shipment_date
          FROM shipments s
          JOIN products p ON s.product_id = p.id
          JOIN sellers se ON s.seller_id = se.id";
$result = $conn->query($query);

$shipments = [];
while ($row = $result->fetch_assoc()) {
    $shipments[] = $row;
}
?>
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
            background-color: #f8f1eb;
        }
        
        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #5c3d2e; 
            padding: 10px;
            text-align: center;
        }
        th {
            background: #5c3d2e;
        }
        .status {
            background: #5c3d2e;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .shipped {
            background-color: #4CAF50;
        }
        .not-shipped {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Yet to Be Shipped</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Seller Name</th>
                <th>Quantity</th>
                <th>Shipping Status</th>
                <th>Shipment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($shipments)): ?>
                <?php foreach ($shipments as $shipment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($shipment['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($shipment['seller_name']); ?></td>
                        <td><?php echo $shipment['quantity']; ?></td>
                        <td>
                            <span class="status <?php echo $shipment['shipped'] ? 'shipped' : 'not-shipped'; ?>">
                                <?php echo $shipment['shipped'] ? 'Shipped' : 'Not Shipped'; ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $shipment['shipped'] ? htmlspecialchars($shipment['shipment_date']) : 'N/A'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No shipment data available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
