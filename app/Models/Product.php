<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = ['id'];
    public $timestamps = true;


   public function comments()
    {
        return $this->hasMany(Comment::class, 'commentable_id', 'id')->where('commentable_type', 2);
    }

    public static function checkTitle($title, $id)
    {
        if ($id == 0)
            $Product = Product::where('title', $title)->where('delete', 0)->count();
        else
            $Product = Product::where('title', $title)->where('delete', 0)->where('id', '!=', $id)->count();
        return $Product;
    }


    public static function store($data)
    {
        try {
            $Product = new Product();
            $Product->title = $data['title'];
            $Product->english_title = $data['english_title'];
            $Product->image = $data['image'];
            $Product->code = $data['code'];
            $Product->seo = $data['seo'];
            $Product->accounting_code = $data['accounting_code'];
            $Product->price = $data['price'];
            $Product->discount_percent = $data['discount_percent'];
            $Product->min_order = $data['min_order'];
            $Product->count = $data['count'];
            $Product->weight = $data['weight'];
            $Product->length = $data['length'];
            $Product->width = $data['width'];
            $Product->height = $data['height'];
            $Product->guarantee = $data['guarantee'];
            $Product->type = $data['type'];
            $Product->short_description = $data['short_description'];
            $Product->description = $data['description'];
            $Product->delete = $data['delete'];
            $Product->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getProducts()
    {
        return Product::where('delete', 0)->get();

    }


    public static function getProductsPaginate()
    {
        return Product::where('delete', 0)->paginate(12);

    }

    public static function getProduct($id)
    {
        return Product::where('delete', 0)->where('id', $id)->first();

    }


    public static function ProductDelete($id)
    {
        try {
            $Product = Product::find($id);
            $Product->delete = 1;
            $Product->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateProduct($data, $id)
    {
        try {

            $Product = Product::find($id);
            $Product->title = $data['title'];
            $Product->english_title = $data['english_title'];
            $Product->image = $data['image'];
            $Product->seo = $data['seo'];
            $Product->code = $data['code'];
            $Product->accounting_code = $data['accounting_code'];
            $Product->price = $data['price'];
            $Product->discount_percent = $data['discount_percent'];
            $Product->min_order = $data['min_order'];
            $Product->count = $data['count'];
            $Product->weight = $data['weight'];
            $Product->length = $data['length'];
            $Product->width = $data['width'];
            $Product->height = $data['height'];
            $Product->type = $data['type'];
            $Product->short_description = $data['short_description'];
            $Product->description = $data['description'];
            $Product->delete = $data['delete'];
            $Product->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public static function getSQLQueryByCategory($product_ids, $SearchOrder = 0)
    {

        $product_ids = explode(",", $product_ids);
        $Products = Product::where('product.delete', 0)
            ->select('product.*')
            ->leftJoin('product_price as product_price', 'product.id', '=', 'product_price.product_id')
            ->groupBy('product.id')
            ->whereIn('product.id', $product_ids);
        if ($SearchOrder == 3)
            $Products->orderBy('product_price.price', 'DESC');
        elseif ($SearchOrder == 4)
            $Products->orderBy('product_price.price', 'asc');
        elseif ($SearchOrder == 1)
            $Products->orderBy('product.id', 'DESC');

        return $Products;
    }





    public static function getProductWithName($text)
    {

        return Product::where('delete', 0)->where('title', 'like', '%' . $text . '%')->get()->take(5);


    }

         public static function updateProductCount($count,$id)
    {

         try {

            $ProductPrice = Product::find($id);
            $ProductPrice->count = $count;
            $ProductPrice->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getAttributeJoin($product_id)
    {

        $product_attribute = DB::table('product_attribute as product_attribute')
            ->leftJoin('attribute as attribute', 'attribute.id', '=', 'product_attribute.attribute_id')
            ->leftJoin('attribute_value as attribute_value', 'attribute_value.id', '=', 'product_attribute.attribute_value_id')
            ->where('product_attribute.product_id', '=', $product_id)
            ->select('product_attribute.*', 'attribute.*', 'attribute_value.*')
            ->toSql();
        dd($product_attribute);
        /*
        SELECT `category_attribute`.`title`,`category_attribute`.`id`,`attribute`.`id`,`attribute`.`title`,`attribute_value`.*,`product_attribute`.*  FROM `category_attribute` as `category_attribute`
left join `attribute` as `attribute` on `attribute`.`category_attribute_id` = `category_attribute`.`id`
left join `attribute_value` as `attribute_value` on `attribute_value`.`attribute_id` = `attribute`.`id`
left join `product_attribute` as `product_attribute` on `product_attribute`.`attribute_id` = `attribute`.`id`
WHERE (`product_attribute`.`product_id`=3 and `product_attribute`.`special_price`=0)
*/

        /*
    foreach ($product_attribute as $key) {
        $row_array['id'] = $key->id;
        $row_array['product_id'] = $key->product_id;
        $row_array['attribute_id'] = $key->attribute_id;
        $row_array['attribut_value_id'] = $key->attribut_value_id;
        $row_array['name'] = $key->name;
        array_push($response, $row_array);
    }

    return $response;
    */
    }


    public static function getOfferProduct($categoryId = 0)
    {
        return ProductPrice::where('discount_percent', '!=', 0)->distinct('product_id')->
        leftJoin('product', 'product_id', '=', 'product.id')->where('product.delete', 0)->select('discount_percent', 'price', 'product.*')->get();
    }



}

