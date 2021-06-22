<?php

namespace App\Traits;

use App\Models\Dashboard\Admin\Position;

trait HasPositionsAndPermissions
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
     * Check if the user has Position
     *
     * @param [type] $position
     * @return boolean
     */
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

}
