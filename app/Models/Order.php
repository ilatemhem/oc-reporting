<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'oc_order';

    protected $primaryKey = 'order_id';


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'oc_product_to_category', 'order_id', 'product_id');
    }

    public function total()
    {
        return $this->hasMany(OrderTotal::class, 'order_id', 'order_id');
    }

}
