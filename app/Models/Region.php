<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable=[
        'zone_id',
        'name',
        'code'
    ];

    public function zone(){
        return $this->belongsTo(Zone::class);
    }
}
