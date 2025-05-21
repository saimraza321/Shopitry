<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model
{
    protected $table = 'newproduct';
    protected $guarded = [];
    use HasFactory;
    
}
