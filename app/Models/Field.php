<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function lists()
    {
        return $this->hasMany(ListField::class, 'field_id', 'id');
    }
}
