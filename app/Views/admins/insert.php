<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footwear Product</title>
    <!-- Include Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for the minimalistic theme -->
    <style>
        body {
            background-color: #f5f5f5; /* Light gray background color */
            color: #333; /* Text color */
        }
        .form-control {
            background-color: #fff; /* White input background color */
            border-color: #ccc; /* Light gray border color */
            color: #333; /* Input text color */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button background color */
            border-color: #007bff; /* Primary button border color */
            color: #fff; /* Button text color */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Primary button background color on hover */
            border-color: #0056b3; /* Primary button border color on hover */
        }
        .alert-success {
            background-color: #28a745; /* Success alert background color */
            border-color: #28a745; /* Success alert border color */
            color: #fff; /* Alert text color */
        }
        .table {
            background-color: #fff; /* White table background color */
            color: #333; /* Table text color */
        }
        th, td {
            border-color: #ccc; /* Light gray table border color */
        }
        img {
            max-width: 100px; /* Max width for product images */
        }
        /* Custom CSS for Admin title */
        .admin-title {
            text-align: center;
            padding: 20px;
            background-color: #007bff; /* Primary color for admin title */
            color: #fff;
            font-size: 24px;
        }
        /* Custom CSS for Edit and Delete buttons */
        .btn-edit {
            background-color: #28a745; /* Edit button background color (green) */
            border-color: #28a745; /* Edit button border color (green) */
            color: #fff; /* Edit button text color (white) */
        }
        .btn-delete {
            background-color: #dc3545; /* Delete button background color (red) */
            border-color: #dc3545; /* Delete button border color (red) */
            color: #fff; /* Delete button text color (white) */
        }
        .btn-edit:hover {
            background-color: #218838; /* Edit button background color on hover (dark green) */
            border-color: #218838; /* Edit button border color on hover (dark green) */
        }
        .btn-delete:hover {
            background-color: #c82333; /* Delete button background color on hover (dark red) */
            border-color: #c82333; /* Delete button border color on hover (dark red) */
        }
    </style>
</head>
<body>
    <!-- Admin Title -->
    <div class="admin-title">
        Admin
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Footwear Product</h2>
        <!-- Display success message if available -->
        <?php if (session()->getFlashdata('successMessage')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('successMessage') ?></div>
        <?php endif; ?>

        <!-- Display error message if available -->
        <?php if (session()->getFlashdata('errorMessage')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('errorMessage') ?></div>
        <?php endif; ?>
        <!-- Form for adding a product -->
        <div class="row mt-3">
            <div class="col-md-6">
                <form method="post" action="admins/insert" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">Product Image</label>
                        <input type="file" name="image_url" class="form-control" id="image_url" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>

        <!-- Display Products Table -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>All Products</h2>
                <?php if (isset($success)) : ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Action</th> <!-- Move this column header here -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($products)) : ?>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $product['name'] ?></td>
                                    <td>$<?= number_format($product['price'], 2) ?></td>
                                    <td>
                                        <img src="<?= base_url($product['image_url']) ?>" alt="<?= $product['name'] ?>">
                                    </td>
                                    <td><?= $product['quantity'] ?></td>
                                    <td> <!-- Move the buttons here -->
                                        <a href="/admins/editfootwear?id=<?= $product['id'] ?>" class="btn btn-edit">Edit</a>
                                        <a href="/admins/deleteProduct/<?= $product['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">No products found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap 5 JS and jQuery (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
