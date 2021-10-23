<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table= 'inventory';


    protected $fillable = [
        'id_inventory','spare_part','product_code','price','due_date',
        'branch','created_at','updated_at','user_id_user','provider_id_provider'
    ];

    protected $primaryKey = 'id_inventory';
}
