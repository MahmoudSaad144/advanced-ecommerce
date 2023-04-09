<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;

    protected $fillable = ["product_name", "product_desc", "product_price", "product_sku", "product_images", "product_discount","active"];



    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getcategory()
    {
        return $this->belongsTo(Category::class,'categoryid','id');
    }


    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getvendor()
    {
        return $this->belongsTo(User::class,'vendorid','id');
    }


    public function scopeSearch($query,$term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('product_name','like',$term)->orWhere('id','like',$term)->orWhere('created_at','like',$term);
        });
    }


}
