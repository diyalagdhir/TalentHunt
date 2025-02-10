<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['role_name'];

    // Define relationship with users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
