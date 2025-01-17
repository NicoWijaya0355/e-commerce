<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category',
        'quantity',
    ];
    use Sluggable;

    public function Sluggable():array
    {

        return [
            'slug'=>
            [
                'source'=>'title'
            ]
            ];
    }
  
}
