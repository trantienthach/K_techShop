<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerUserModel extends Model
{
    use HasFactory;
    protected $table = 'managers';

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeSearch($query) {
        if($search = request()->searchStr){
            $query = $query->where('fullname','like','%'.$search.'%');
        }
        return $query;
    }
}
