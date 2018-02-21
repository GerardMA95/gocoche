<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserRole;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function hasAdminRole() 
    {
        if ($this->role_id === UserRole::ROOT_ID || $this->role_id === UserRole::ADMIN_ID) {
            return true;
        }
        return false;
    }
}
