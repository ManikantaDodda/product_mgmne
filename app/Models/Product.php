<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_name",
        "quantity",
        "price",
        "discount",
        "image_original",
        "description",
        "image_generated",
        "image_generated_2",
    ];
}
