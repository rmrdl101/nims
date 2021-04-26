<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //referred to Position Model
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'departments_positions');
    }

    public function allDepartmentPositions()
    {
        return $this->belongsToMany(Position::class, 'roles_permissions');
    }
}
