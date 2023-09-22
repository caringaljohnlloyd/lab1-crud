<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #171717;
            margin: 0;
            padding: 0;
            color: #ffffff; 
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #222;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            color: #ffffff;
        }
        .form-control {
            background-color: #444;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .divider {
            background-color: #007bff;
            height: 2px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Add Category</h1>
            <a href="<?= base_url('back') ?>" class="btn btn-primary">Back</a>
        </div>
        <form method="post" action="/category/add">
            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="ProductCategory" value="<?= isset($product['ProductCategory']) ? $product['ProductCategory'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>


    <div class="divider"></div>

    <div class="container">
        <h2>Product Categories</h2>
        <?php foreach ($productcategories as $category): ?>
            <strong>Product Category:</strong> <?= isset($category['ProductCategory']) ? $category['ProductCategory'] : '' ?><br>
            <div class="product-actions">
                <?php if (isset($category['ID'])) : ?>
                    <a href="/deletecateg/<?= $category['ID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

