<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class AdminUser extends Model
{
    use HasApiTokens, HasFactory;

    public function role(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class,AdminUserRole::class,'user_id','role_id');
    }
}
