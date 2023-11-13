<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModal extends Model
{
    use HasFactory;
    protected $table = 'tbl_contact';
    protected $primariKey = 'contact_id';
}
