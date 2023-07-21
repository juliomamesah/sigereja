<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kepel()
    {
        return $this->belongsTo(Kepel::class);
    }
}
