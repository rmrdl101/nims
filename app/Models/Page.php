<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function  positions()
    {
        return $this->belongsToMany( Position::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'page_permission');
    }

    public function allPagePermissions()
    {
        return $this->belongsToMany(Permission::class, 'page_permission');
    }
}
