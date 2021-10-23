<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table= 'stock';


    protected $fillable = [
        'id_stock','created_at','updated_at','inventory_id_inventory'
    ];

    protected $primaryKey = 'id_stock';
}
