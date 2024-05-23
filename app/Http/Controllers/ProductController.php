<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product-list', compact('products'));
    }

    public function create()
    {
        return view('create-product');
    }

    public function store(Request $request)
    {
        // Validate and store the product
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string'
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('edit-product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate and update the product
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string'
        ]);

        $product->update($validated);

        return redirect('/products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully.');
    }

    public function export()
    {
        $products = Product::latest()->get();
        $pdf = Pdf::loadView('pdf', ['products' => $products]);
        return $pdf->download('products-list.pdf');
    }

    public function downloadCSV()
    {
        return Excel::download(new ProductsExport, 'products.csv');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect('/products')->with('success', 'Products imported successfully.');
    }

    public function generateCSV()
    {
        $products = Product::all();

        $filename = 'products.csv';

        $file = fopen($filename, 'w+');

        // Write CSV headers
        fputcsv($file, ['Name', 'Price', 'Description', 'Category']);

        foreach ($products as $product) {
            fputcsv($file, [
                $product->name,
                $product->price,
                $product->description,
                $product->category,
            ]);
        }

        fclose($file);

        // Return CSV file as response
        return Response::download($filename)->deleteFileAfterSend();
    }

    public function showQRScanner()
    {
        return view('qr-scanner');
    }
}
