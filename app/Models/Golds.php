<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golds extends Model
{
    use HasFactory;

    protected $fillable = [
        "carat",
        "gold_price",
        "capital_price",
        "selling_price"
    ];
}
