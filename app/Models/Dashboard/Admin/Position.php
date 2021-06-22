<?php

namespace App\Models\Dashboard\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
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
