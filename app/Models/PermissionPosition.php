<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionPosition extends Pivot
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
