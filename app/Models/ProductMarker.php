<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMarker extends Model
{
    use HasFactory;

    protected $table = 'products_markers';
    
    protected $fillable = [
        'product_id',
        'marker_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function marker()
    {
        return $this->belongsTo(Marker::class, 'marker_id');
    }
}

