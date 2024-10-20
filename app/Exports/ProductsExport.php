<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::all(); // Mengambil semua data produk
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Description',
            'Image',
            'Price',
            'Category',
            'Quantity',
            'Slug',
            'Created At',
            'Updated At',
        ];
    }
}
