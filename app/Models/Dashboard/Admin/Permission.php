<?php

namespace App\Models\Dashboard\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class)
            ->withPivot('page_id');
    }
}
