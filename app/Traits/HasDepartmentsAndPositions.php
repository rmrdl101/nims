<?php

namespace App\Traits;

use App\Models\Department;
use App\Models\Position;
trait HasDepartmentsAndPositions
{
    /**
     * @return mixed
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class,'users_departments');
    }

    /**
     * @return mixed
     */
    public function positions()
    {
        return $this->belongsToMany(Position::class,'users_positions');
    }

}
