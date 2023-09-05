<!-- resources/views/emails/product_created.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>New Product Created</title>
</head>

<body>
    <h1>New Product Created</h1>
    <p>A new product has been created:</p>
    <p>Name: {{ $product->name }}</p>
    <p>Description: {{ $product->description }}</p>
    <!-- More product details -->
</body>

</html>
