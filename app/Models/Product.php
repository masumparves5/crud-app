<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\New_;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageUrl, $imageName, $directory, $extension;

    public static function newProduct($request)
    {
        self::$image =$request->file('image');
        self::$extension =self::$image->getClientOriginalExtension();
        self::$imageName =time().'.'.self::$extension;
        self::$directory ='uploads/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl =self::$directory.self::$imageName;

        self::$product              = New Product();
        self::$product->name        =$request->name;
        self::$product->price       =$request->price;
        self::$product->description    =$request->description;
        self::$product->image       = self::$imageUrl;
        self::$product->save();
    }
    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }

            self::$image =$request->file('image');
            self::$extension =self::$image->getClientOriginalExtension();
            self::$imageName =time().'.'.self::$extension;
            self::$directory ='uploads/product-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl =self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }
            self::$product              = New Product();
            self::$product->name        =$request->name;
            self::$product->price       =$request->price;
            self::$product->description    =$request->description;
            self::$product->image       = self::$imageUrl;
            self::$product->save();
    }
    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);

        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }

        self::$product->delete();
    }
}
