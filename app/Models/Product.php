<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'price_after_discount', 'stock', 'category_id', 'video'];

    // Belongs-to relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // One-to-Many relationship with ProductImages
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    

    // One-to-Many relationship with Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating() { return $this->reviews()->avg('rating'); }
    public function ratingsCount()
    {
        return $this->reviews()->count();
    }
    public function activeRatingsCount()
    {
        return $this->reviews()->where('is_active', 1)->count();
    }
    public function wishlists()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id');
    }

    public function isInWishlist($userId)
    {
        return $this->wishlists()->where('user_id', $userId)->exists();
    }

}

