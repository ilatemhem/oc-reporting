<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $table = 'oc_category';

    protected $primaryKey = 'category_id';

    public function description()
    {
        return $this->hasOne(CategoryDescription::class, 'category_id')
            ->where('language_id', App::currentLocale() == 'en' ? 1 : 2);
    }

    public function descriptions()
    {
        return $this->hasMany(CategoryDescription::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'oc_product_to_category', 'category_id', 'product_id');
    }
}
