<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributes</title>
</head>
<body>

<div class="container">
    <h1>Add Attribute</h1>
    <form action="{{ route('attributes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Attribute Type</label>
            <input type="text" name="attribute_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Attribute Name</label>
            <input type="text" name="attribute_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>
