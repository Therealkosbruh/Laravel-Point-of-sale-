<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'ku',
    //     'unitPrice',
    //     'quantity',
    //     // другие атрибуты, которые вы хотите разрешить для массового присвоения
    // ];
    protected $table = 'products';
    protected $guarded = false;
}
