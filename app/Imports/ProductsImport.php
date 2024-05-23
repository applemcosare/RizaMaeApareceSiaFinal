<?php
// App/Imports/ProductsImport.php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Log the row data for debugging
        Log::info('Importing row: ', $row);

        // Check if all required keys exist
        if (!isset($row['name']) || !isset($row['price']) || !isset($row['description']) || !isset($row['category'])) {
            Log::error('Missing one or more required keys in the row: ', $row);
            return null; // or handle the error as per your requirement
        }

        return new Product([
            'name'        => $row['name'],
            'price'       => $row['price'],
            'description' => $row['description'],
            'category'    => $row['category'],
        ]);
    }
}


