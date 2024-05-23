<!-- resources/views/import.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Import Products</title>
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Choose CSV File</label>
            <input type="file" name="file" id="file" required>
        </div>
        <div>
            <button type="submit">Import</button>
        </div>
    </form>
</body>
</html>
