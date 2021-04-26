<?php

namespace App\Traits;

use App\Models\Department;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Position;
trait HasPagesAndPermissions
{

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isAdmin()
    {
        if($this->roles->contains('slug', 'admin')){
            return true;
        }
    }
    public function isGuest()
    {
        if($this->roles->contains('slug', null)){
            return redirect('/');
        }
    }
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_ph');
    }

    /**
     * @return mixed
     */
//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class,'users_permissions');
//    }

    /**
     * Check if the user has Role
     *
     * @param [type] $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if( strpos($role, ',') !== false ){//check if this is an list of roles

            $listOfRoles = explode(',',$role);

            foreach ($listOfRoles as $role) {
                if ($this->roles->contains('slug', $role)) {
                    return true;
                }
            }
        }else{
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }

        return false;
    }
}
