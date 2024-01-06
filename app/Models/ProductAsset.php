<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'url',
        'type',
    ];

    protected $table = 'products_assets';

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
