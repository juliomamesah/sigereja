<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepel extends Model
{
    use HasFactory;

    public function jemaat()
    {
        return $this->hasMany(Jemaat::class);
    }
}
