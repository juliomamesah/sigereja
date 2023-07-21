<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Keuangan;

class User extends Authenticatable
{
    protected $guarded = [];
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //  'username',
    // 'password',
    // 'role'
    // ];
   
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }
}
