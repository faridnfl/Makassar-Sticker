<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone',
        'address',
        'vehicle_number',
        'plate_size',
        'plate_material',
        'plate_color',
        'font_type',
        'finishing',
        'quantity',
        'status',
        'notes',
        'stnk_file',
    ];
}
