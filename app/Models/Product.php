<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'price', 'description', 'image'];


    function scopeExcludeMine($query)
    {
        if (auth()->check()) {
            $query->where('user_id', '!=', auth()->user()->id);
        }
    }

    function scopeMyProducts($query)
    {
        $query->where('user_id', auth()->user()->id);
    }
}
