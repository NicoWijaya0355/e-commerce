<?php
// app/Imports/ProductsImport.php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Use dd to dump the row and stop execution
        
        
        return new Product([
            
            'title' => $row['title'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'category' => $row['category'],
            'quantity' => $row['quantity'],
            'slug' =>$row['slug'],
            
        ]);
    }
}
