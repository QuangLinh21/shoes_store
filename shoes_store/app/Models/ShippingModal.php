<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingModal extends Model
{
    use HasFactory;
    protected $table='tbl_shipping';
    protected $primariKey='ship_id ';
}
