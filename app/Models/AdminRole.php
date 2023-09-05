<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdminRole extends Model
{
    use HasFactory;

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(AdminMenu::class,AdminPermission::class,'role_id','menu_id');
    }
}
