<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    protected $table = 'oc_product';

    protected $primaryKey = 'product_id';

    public function description()
    {
        return $this->hasOne(ProductDescription::class, 'product_id')
            ->where('language_id', App::currentLocale() == 'en' ? 1 : 2);
    }

    public function descriptions()
    {
        return $this->hasMany(ProductDescription::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'oc_order_product', 'product_id', 'category_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order');
    }
}
