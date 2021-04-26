<?php

namespace App\Models;

use App\Traits\HasPages;
use App\Traits\HasPagesAndPermissions;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionPosition;

class Position extends Model
{
//    use HasPages;

    protected $fillable = [
        'page_id',
        'permission_id',
        'position_id'
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)
            ->using(PermissionPosition::class )
            ->withPivot('page_id');
    }
}
