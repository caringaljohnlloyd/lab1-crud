<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .header {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #007bff;
        }
        .divider {
            background-color: #007bff;
            height: 2px;
            margin: 20px 0;
        }
        .product-card {
            background-color: #333;
            border: 1px solid #444; 
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); 
        }
        .product-actions {
            margin-top: 15px;
            text-align: right;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        label {
            color: #ffffff; 
        }
        .form-control {
            background-color: #444; 
            color: #ffffff; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Product Management</h1>
        <form action="/save" method="post">
            <div class="form-group">
                <label class="form-label">ID</label>
                <input type="hidden" class="form-control" name="ID" value="<?= isset($product['ID']) ? $product['ID'] : '' ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="ProductName" value="<?= isset($product['ProductName']) ? $product['ProductName'] : '' ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Product Description</label>
                <input type="text" class="form-control" name="ProductDescription" value="<?= isset($product['ProductDescription']) ? $product['ProductDescription'] : '' ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Product Category</label>
                <select class="form-control" name="ProductCategory">
                    <option value="" disabled selected>Select Category</option> 
                    <?php foreach ($productcategories as $category): ?>
                        <option value="<?= $category['ID'] ?>" <?= isset($product['ProductCategory']) && $product['ProductCategory'] == $category['ID'] ? 'selected' : '' ?>>
                        <?= $category['ProductCategory'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                
            </div>
            <a href="/add" class="btn btn-primary">Add Category</a>
            <div class="form-group">
                <label class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="ProductQuantity" value="<?= isset($product['ProductQuantity']) ? $product['ProductQuantity'] : '' ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Product Price</label>
                <input type="text" class="form-control" name="ProductPrice" value="<?= isset($product['ProductPrice']) ? $product['ProductPrice'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="divider"></div>
        
        <?php foreach ($product as $prod): ?>
            <div class="product-card">
                <strong>ID:</strong> <?= isset($prod['ID']) ? $prod['ID'] : '' ?><br>
                <a href="/edit/<?= $prod['ID'] ?>"><strong>Product Name:</strong> <?= isset($prod['ProductName']) ? $prod['ProductName'] : '' ?></a><br>
                <strong>Product Description:</strong> <?= isset($prod['ProductDescription']) ? $prod['ProductDescription'] : '' ?><br>
                <strong>Product Category:</strong>
        <?php
            $categoryId = isset($prod['ProductCategory']) ? $prod['ProductCategory'] : '';
            $categoryName = '';
            foreach ($productcategories as $category) {
                if ($category['ID'] == $categoryId) {
                    $categoryName = $category['ProductCategory'];
                    break;
                }
            }
            echo $categoryName;
        ?><br>
                <strong>Product Quantity:</strong> <?= isset($prod['ProductQuantity']) ? $prod['ProductQuantity'] : '' ?><br>
                <strong>Product Price</strong> <?= isset($prod['ProductPrice']) ? $prod['ProductPrice'] : '' ?><br>   
                <div class="product-actions">
                    <?php if (isset($prod['ID'])) : ?>
                        <a href="/delete/<?= $prod['ID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
