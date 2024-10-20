<?php
// app/Exports/OrdersExport.php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::with(['user', 'product'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Recipient Address',
            'Phone',
            'Status',
            'User ID',
            'Product ID',
            'Payment Status',
            'Created At',
            'Updated At',
        ];
    }
}
