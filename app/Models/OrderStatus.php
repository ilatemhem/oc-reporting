<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'oc_order_status';

    protected $primaryKey = 'order_status_id';

}
