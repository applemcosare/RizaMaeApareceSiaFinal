@extends('layout')

@section('content')

<div class="container mt-4">
    <a href="{{ route('products.pdf') }}" target="_blank" class="btn btn-primary rounded py-1 px-4 text-black hover:bg-blue-300 duration-200">Export PDF</a>
    <a href="{{ route('products.csv') }}" target="_blank" class="btn btn-secondary rounded py-1 px-4 text-black hover:bg-gray-300 duration-200">Download CSV</a>
    <a href="{{ url('/import') }}">Import Products</a>

   
        @csrf
        <input type="file" name="csv_file" accept=".csv" class="form-control-file">
       
    </form>

    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        {!! QrCode::size(100)->generate(url('/products/' . $product->id)) !!}
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
