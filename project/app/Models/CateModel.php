<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
;
class CateModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'cateprod_name',
        'cateprod_meta_title',
        'cateprod_meta_desc',
        'cateprod_meta_url',
        'cateprod_icon'
    ];

    public function scopeSearch($query) {
        if($search = request()->searchStr){
            $query = $query->where('cateprod_name','like','%'.$search.'%');
        }
        return $query;
    }
    public function products() {
        return $this->hasMany(ProductModel::class,'id','id');
    }
}
