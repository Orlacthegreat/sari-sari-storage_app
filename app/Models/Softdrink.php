<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softdrink extends Model
{
    use HasFactory;
    protected $table = 'softdrinks';

    protected $fillable = [
        'name',
        'size',
        'price',
        'quantity',
    ];
}
