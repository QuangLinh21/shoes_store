<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModal extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $primariKey = 'order_id';
    protected $fillable  = [
        'cus_id','ship_id','pay_id','order_total','order_status','created_at','updated_at'
    ];
}
