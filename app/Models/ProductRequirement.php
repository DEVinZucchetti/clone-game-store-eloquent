<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'operational_system',
        'memory',
        'storage',
        'observations',
        'type',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
