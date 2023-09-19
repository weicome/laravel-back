<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use App\Utils\TreeNode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['id', 'username', 'account', 'password', 'status', 'ip_address', 'created_at', 'updated_at'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class, AdminUserRole::class, 'user_id', 'role_id');
    }

    /**
     * @param $query
     * @param QueryFilter $filter
     * @return Builder
     */
    public function scopeFilter($query, QueryFilter $filter): Builder
    {
        return $filter->apply($query);
    }

    public function isSuperAdmin(): bool
    {
        return $this->roles->contains('id', 1);
    }

    public function permissions(): array
    {
        $menus = [];
        if ($this->isSuperAdmin()) {
            $menus = app(AdminMenu::class)->where('status', 1)->get()?->toArray();
        } else {
            $roles = $this->roles()->with('menus')->get();
            foreach ($roles as $role) {
                $menus = array_merge($menus, $role->menus->toArray());
            }
        }
        return TreeNode::generateSanctum($menus);
    }

    public function menus(): array
    {
        $menus = [];
        if ($this->isSuperAdmin()) {
            $menus = app(AdminMenu::class)->where('status', 1)->where('type','!=',2)->get()?->toArray();
        } else {
            $roles = $this->roles()->get();
            foreach ($roles as $role) {
                $menus = array_merge($menus, $role->menus()->where('type','!=',2)->get()?->toArray() ?? []);
            }
        }
        return TreeNode::generateTree($menus);
    }
}
