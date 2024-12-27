<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributes</title>
</head>
<body>

<div class="container">
    <h1>Attributes</h1>
    <a href="{{ route('attributes.create') }}" class="btn btn-primary">Add Attribute</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attributes as $attribute)
            <tr>
                <td>{{ $attribute->id }}</td>
                <td>{{ $attribute->type }}</td>
                <td>{{ $attribute->name }}</td>
                <td>
                    <a href="{{ route('attributes.edit', $attribute->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('attributes.destroy', $attribute->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
