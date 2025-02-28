<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact'; 

    protected $primaryKey = 'contact_id'; // If using a custom primary key

    protected $fillable = ['name', 'email', 'contact', 'message'];
}
