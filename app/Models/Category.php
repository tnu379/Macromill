<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    public static function getRecursiveChildren($categoryId)
    {
        $query = <<<SQL
        WITH RECURSIVE category_tree AS (
            SELECT id, name, parent_id
            FROM categories
            WHERE id = :categoryId

            UNION ALL

            SELECT c.id, c.name, c.parent_id
            FROM categories c
            JOIN category_tree ct ON c.parent_id = ct.id
        )
        SELECT id
        FROM category_tree
        SQL;
        $ids = DB::select($query, ['categoryId' => $categoryId]);
        foreach ($ids as $id) {
            $results[] = $id->id;
        }
        return $results;
    }


    public static function getCategoryIds($categoryName){
        $arrayId = [];
        $categories = Category::where('name', 'like', '%' . $categoryName . '%')->get();
        if(count($categories)){
            foreach ($categories as $category) {
                $rs =  Category::getRecursiveChildren($category->id);
                $arrayId = array_merge($arrayId,$rs);
            }
        }
        return $arrayId;
    }
}
