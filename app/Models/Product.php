<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price', 'quantity',
        'category_id'
    ];
    public function scopeCategoryName($query, $categoryName)
    {
        if (!empty($categoryName)) {
            return $query->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', 'like', '%' . $categoryName . '%');
            });
        }
        return $query;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getProductByCategoryIds($ids){
        $rs = self::whereIn('category_id', $ids)->get();
        return $rs;
    }
}
