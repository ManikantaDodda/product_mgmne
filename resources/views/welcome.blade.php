<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <div class="relative justify-center flex items-top min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input 
                    name="product_name" 
                    type="text" 
                    class="form-control" 
                    id="pname" 
                    pattern="^[a-zA-Z\s]+$" 
                    title="Product name should only contain letters and spaces." 
                    required 
                    placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="pprice">Product Price</label>
                <input 
                    name="price" 
                    type="number" 
                    class="form-control" 
                    id="pprice" 
                    min="0" 
                    placeholder="Price" 
                    required>
            </div>
            <div class="form-group">
                <label for="pquanity">Product Quantity</label>
                <input 
                    name="quantity" 
                    type="number" 
                    class="form-control" 
                    id="pquanity" 
                    min="0" 
                    placeholder="Quantity" 
                    required>
            </div>
            <div class="form-group">
                <label for="pimage">Product Image</label>
                <input 
                    name="image_original" 
                    type="file" 
                    id="pimage" 
                    accept=".jpg, .jpeg" 
                    required>
            </div>
            <div class="form-group">
                <label for="pdiscount">Discount</label>
                <input 
                    name="discount" 
                    type="number" 
                    id="pdiscount" 
                    min="0" 
                    placeholder="Discount" 
                    required>
            </div>
            <div class="form-group">
                <label for="pdescription">Description</label>
                <input 
                    name="description" 
                    type="text" 
                    id="pdescription" 
                    placeholder="Description" 
                    required>
            </div>
            <div class="form-group">
                <label for="attributes">Attributes</label>
                <div id="attributes">
                    @foreach($attributes as $attribute)
                        <div>
                            <input 
                                type="checkbox" 
                                name="attributes[]" 
                                value="{{ $attribute->id }}">
                            <label>{{ $attribute->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button style="padding:3px; background-color:green;" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
