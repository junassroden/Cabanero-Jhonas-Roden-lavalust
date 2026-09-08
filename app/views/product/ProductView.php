<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductView</title>
</head>
<body>
    <h4><?php echo $name; ?></h4>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>