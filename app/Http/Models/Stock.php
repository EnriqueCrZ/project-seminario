<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table= 'stock';
    public $timestamps = false;

    protected $fillable = [
        'id_stock','created_at','updated_at','inventory_id_inventory','user_id'
    ];

    protected $primaryKey = 'id_stock';
}
