<?php

namespace App\Models;

use App\Models\Dashboard\Admin\Department;
use App\Traits\HasPositionsAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Dashboard\Admin\Position;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPositionsAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lname',
        'fname',
        'mname',
        'initials',
        'email',
        'birthday',
        'licnum',
        'position',
        'designation',
        'area',
        'username',
        'password',
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
        'email_verified_at' => 'datetime',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'user_position');
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'user_department');
    }
}
