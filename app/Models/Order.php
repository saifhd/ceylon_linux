<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'zone_id',
        'region_id',
        'territory_id',
        'destributor_id',
        'total',
        'remark'
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('units');
    }

    public function territory(){
        return $this->belongsTo(Territory::class);
    }

    public function zone()
    {
        return $this->belongsTo(ZOne::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function destributor()
    {
        return $this->belongsTo(User::class,'destributor_id','id');
    }

}
