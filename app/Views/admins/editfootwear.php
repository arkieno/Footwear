<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for the minimalistic theme -->
    <style>
        body {
            background-color: #f5f5f5; /* Light gray background color */
            color: #333; /* Text color */
        }
        .form-box {
            background-color: #fff; /* White background color */
            border: 1px solid #ddd; /* Light gray border color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Add a subtle box shadow */
        }
        .form-box:hover {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5); /* Enhance box shadow on hover */
        }
        .form-control {
            background-color: #f5f5f5; /* Light gray input background color */
            border-color: #ddd; /* Light gray border color */
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
    </style>
</head>
<body>
  <!-- Edit Product Form -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 form-box">
            <form method="post" action="/admins/updatefootwearProduct/<?= isset($product['id']) ? $product['id'] : '' ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= isset($product['name']) ? $product['name'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?= isset($product['price']) ? $product['price'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label">Product Image</label>
                    <input type="file" name="image_url" class="form-control" id="image_url">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="price" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ?>" required>
                </div>

                <button type="submit" class="btn btn-primary btn-md">Update Product</button>

                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary btn-md" onclick="cancelUpdate()">Cancel</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
