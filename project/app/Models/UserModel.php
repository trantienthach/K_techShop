<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'prod_name',
        'prod_meta_title',
        'prod_meta_desc',
        'prod_meta_url',
        'prod_icon',
        'prod_cate_id',
        'prod_price',

    ];

    public function scopeSearch($query) {
        if($search = request()->searchStr){
            $query = $query->where('prod_name','like','%'.$search.'%');
        }
        return $query;
    }
    public function cates() {
        return $this->hasOne(CateModel::class,'id','prod_cate_id');
    }
    public function products() {
        return $this->hasMany(ProductModel::class,'id','id');
    }
}
