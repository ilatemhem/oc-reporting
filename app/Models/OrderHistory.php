<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class OrderHistory extends Model
{
    protected $table = 'oc_order_history';

    protected $primaryKey = 'order_history_id';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function statuses()
    {
        return $this->hasOne(OrderStatus::class, 'order_status_id', 'order_status_id');
    }
}
