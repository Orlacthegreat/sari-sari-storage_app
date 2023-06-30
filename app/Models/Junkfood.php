<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junkfood extends Model
{
    use HasFactory;
    protected $table = 'junkfoods';

    protected $fillable = [
        'name',
        'size',
        'price',
        'quantity',
    ];
}
