<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative flex justify-center items-top min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input name="product_name" type="text" class="form-control" id="pname" value="{{ $product->product_name }}" required>
            </div>
            
            <div class="form-group">
                <label for="pprice">Product Price</label>
                <input name="price" type="number" class="form-control" id="pprice" value="{{ $product->price }}" required>
            </div>
            
            <div class="form-group">
                <label for="pquantity">Product Quantity</label>
                <input name="quantity" type="number" class="form-control" id="pquantity" value="{{ $product->quantity }}" required>
            </div>
            
            <div class="form-group">
                <label for="pimage">Product Image</label>
                <input name="image_original" type="file" id="pimage">
                @if($product->image_original)
                    <p>Current Image: <img src="{{ asset('products/' . $product->image_original) }}" width="100"></p>
                @endif
            </div>
            
            <div class="form-group">
                <label for="pdiscount">Discount</label>
                <input name="discount" type="number" id="pdiscount" value="{{ $product->discount }}" required>
            </div>
            
            <div class="form-group">
                <label for="pdescription">Description</label>
                <input name="description" type="text" id="pdescription" value="{{ $product->description }}" required>
            </div>
            
            <button style="padding: 5px; background-color: green; color: white;" type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
