<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];

    // Belongs-to relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many relationship with CartItems
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}