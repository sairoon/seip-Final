<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['product_name', 'category_name','brand_name', 'description', 'image', 'status'];

    protected static $product, $imgObject, $imgName, $imgDirectory, $imageUrl;

    protected static function imageUpload($request, $product = null){
        self::$imgObject = $request->file('image');
        if (self::$imgObject){
            if (!empty($product)){
                if (file_exists($product->image)){
                    unlink($product->image);
                }
            }
            self::$imgName = time().self::$imgObject->getClientOriginalName();
            self::$imgDirectory = 'backend/uploaded-file/product/';
            self::$imgObject->move(self::$imgDirectory, self::$imgName);
            self::$imageUrl = self::$imgDirectory.self::$imgName;
        }else{
            if (!empty($product)){
                self::$imageUrl = $product->image;
            }else{
                self::$imageUrl = null;
            }
        }
        return self::$imageUrl;
    }

    public static function createProduct($request){
        self::$product                  = new Product();
        self::$product->product_name    = $request->product_name;
        self::$product->category_id     = $request->category_id;
        self::$product->brand_name      = $request->brand_name;
        self::$product->description     = $request->description;
        self::$product->image           = self::imageUpload($request);
        self::$product->status          = $request->status;
        self::$product->save();
    }
    public static function updateProduct($request, $id){
        self::$product                  = Product::find($id);
        self::$product->product_name    = $request->product_name;
        self::$product->category_id     = $request->category_id;
        self::$product->brand_name      = $request->brand_name;
        self::$product->description     = $request->description;
        self::$product->image           = self::imageUpload($request, self::$product);
        self::$product->status          = $request->status;
        self::$product->save();
    }
}
