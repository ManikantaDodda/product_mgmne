<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributes</title>
</head>
<body>
<div class="container">
    <h1>Edit Attribute</h1>
    <form action="{{ route('attributes.update', $attribute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Attribute Type</label>
            <input type="text" name="attribute_type" class="form-control" value="{{ $attribute->type }}" required>
        </div>
        <div class="form-group">
            <label>Attribute Name</label>
            <input type="text" name="attribute_name" class="form-control" value="{{ $attribute->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
