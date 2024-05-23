<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert to pdf</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Qr Code</th>
                <th>Name</th>
                <th>Descrirption</th>
                <th>Category</th>
                <th>Price</th>
               
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($products as $prod)
                @if($count++ > 10)
                <div style="page-break-after: always"> &nbsp; </div>
                @php $count = 0; @endphp
                @endif
            <tr>
                <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(80)->generate($prod->name)) }}" alt="QR Code"></td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->description}}</td>
                <td>{{$prod->category_id}}</td>
                <td>{{$prod->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>