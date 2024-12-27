<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            table th, table td {
                padding: 10px;
                text-align: center;
                border: 1px solid #ddd;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            thead {
                background-color: green;
                color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <a style="margin:20px;" href="{{ route('products.create') }}">Create Product</a>
            <a href="/attributes">Attributes</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $produ)
                    <tr>
                        <td>{{ $produ->id }}</td>
                        <td>{{ $produ->product_name }}</td>
                        <td>{{ $produ->quantity }}</td>
                        <td>{{ $produ->price }}</td>
                        <td>{{ $produ->description }}</td>
                        <td>
                            <img src="{{ url('products/' . $produ->image_original) }}" width="25" height="25" />
                        </td>
                        <td>
                        <form action="{{ route('products.edit', $produ->id) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit">EDIT</button>
                                </form>
                            <form action="{{ route('products.destroy', $produ->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete Product</button>
                                </form>

                            <!-- <button class="btn btn-danger" onclick="deleteProduct({{ $produ->id }})">Delete</button> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function deleteProduct(productId) {
                if (confirm('Are you sure you want to delete this product?')) {
                    fetch(`/products/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                         //   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload(); // Optionally refresh the page
                        } else {
                            alert(data.message || 'Failed to delete the product.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the product.');
                    });
                }
            }
        </script>
    </body>
</html>
