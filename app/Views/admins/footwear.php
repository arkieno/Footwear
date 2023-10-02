
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for dark theme -->
    <style>
        body {
            background-color: #333; /* Dark background color */
            color: #fff; /* Text color */
        }
        /* Add your custom styling for product display here */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Products</h1>

        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="<?= base_url($product['image_url']) ?>" alt="<?= $product['name'] ?>">
                        <div class="product-details">
                            <h6><?= $product['name'] ?></h6>
                            <div class="price">
                                <h6>$<?= number_format($product['price'], 2) ?></h6>
                            </div>
                            <!-- Add other product details as needed -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
