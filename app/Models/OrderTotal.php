<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTotal extends Model
{
    protected $table = 'oc_order_total';

    protected $primaryKey = 'order_total_id';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
