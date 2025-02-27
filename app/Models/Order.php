<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'status', 'total_amount', 'total_amount_after_discount', 'payment_status', 'payment_method', 'pickup_date', 'address', 'phone_number', 'order_notes'];

    // Belongs-to relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many relationship with OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // One-to-One relationship with Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

