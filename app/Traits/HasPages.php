<?php

namespace App\Traits;

use App\Models\Page;
use App\Models\Permission;
trait HasPages
{
    public function hasPage($page)
    {
        if( strpos($page, ',') !== false ){//check if this is an list of pages

            $listOfPages = explode(',',$page);

            foreach ($listOfPages as $page) {
                if ($this->pages->contains('slug', $page)) {
                    return true;
                }
            }
        }else{
            if ($this->pages->contains('slug', $page)) {
                return true;
            }
        }

        return false;
    }
}
