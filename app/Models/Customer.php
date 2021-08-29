<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'oc_customer';

    protected $primaryKey = 'customer_id';

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
