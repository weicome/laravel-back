<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdminRole extends BaseModel
{

    public $fillable = ['id','name','symbol','status','remark','created_at','updated_at'];
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(AdminMenu::class,AdminPermission::class,'role_id','menu_id');
    }
}
