<?php

namespace App\Traits;

use App\Models\Dashboard\Admin\Department;
use App\Models\Dashboard\Admin\Position;
trait HasDepartmentsPositionsPermissions
{
    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isAdmin()
    {
        if($this->positions->contains('slug', 'admin')){
            return true;
        }
    }
    public function isGuest()
    {
        if($this->positions->contains('slug', null)){
            return redirect('/');
        }
    }
    /**
     * @return mixed
     */
    public function positions()
    {
        return $this->belongsToMany(Position::class,'user_position');
    }

    /**
     * @return mixed
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class,'user_department');
    }

    public function hasPosition($position)
    {
        if( strpos($position, ',') !== false ){//check if this is an list of roles

            $listOfPositions = explode(',',$position);

            foreach ($listOfPositions as $position) {
                if ($this->positions->contains('slug', $position)) {
                    return true;
                }
            }
        }else{
            if ($this->positions->contains('slug', $position)) {
                return true;
            }
        }

        return false;
    }

    public function hasDepartment($department)
    {
        if( strpos($department, ',') !== false ){//check if this is an list of roles

            $listOfDepartments = explode(',',$department);

            foreach ($listOfDepartments as $department) {
                if ($this->departments->contains('slug', $department)) {
                    return true;
                }
            }
        }else{
            if ($this->departments->contains('slug', $department)) {
                return true;
            }
        }

        return false;
    }

}
