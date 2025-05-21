<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table = 'addtocart';
    protected $guarded = [];
    use HasFactory;
}
