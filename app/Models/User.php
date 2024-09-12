<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'date',
          'is_admin' => 'boolean',

    ];

    // An accessor transforms an Eloquent attribute value when it is accessed
    //    i.e you show how you want this to be view in the blade e.g upper or lower case 
    public function getnameAttribute($value)
    {
        return Ucfirst($value);
    }
//   laravel scopes helps make the code shorter and avoiding writting the same code many times

    public function scopeAdmin($query)
    {
        return $query->where('is_admin',true);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
