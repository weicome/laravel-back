<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = AdminMenu::create([
            'name' => 'Admin',
            'title' => '权限管理',
            'url' => 'admin',
            'path' => 'admin',
            'icon' => '',
            'pid' => 0,
            'type' => 0,
        ]);
        $user = AdminMenu::create([
            'name' => 'AdminUser',
            'title' => '用户管理',
            'url' => 'admin/user',
            'path' => 'user',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminUserList',
                'title' => '用户列表',
                'url' => 'admin/user/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserShow',
                'title' => '查看用户',
                'url' => 'admin/user/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserAdd',
                'title' => '新增用户',
                'url' => 'admin/user/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserMod',
                'title' => '修改用户',
                'url' => 'admin/user/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserDel',
                'title' => '删除用户',
                'url' => 'admin/user/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
        ]);

        $role = AdminMenu::create([
            'name' => 'AdminRole',
            'title' => '角色管理',
            'url' => 'admin/role',
            'path' => 'role',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminRoleList',
                'title' => '角色列表',
                'url' => 'admin/role/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleShow',
                'title' => '查看角色',
                'url' => 'admin/role/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleAdd',
                'title' => '新增角色',
                'url' => 'admin/role/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleMod',
                'title' => '修改角色',
                'url' => 'admin/role/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleDel',
                'title' => '删除角色',
                'url' => 'admin/role/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
        ]);

        $menu = AdminMenu::create([
            'name' => 'AdminMenu',
            'title' => '菜单管理',
            'url' => 'admin/menu',
            'path' => 'menu',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminMenuList',
                'title' => '菜单列表',
                'url' => 'admin/menu/index',
                'path' => 'index',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuShow',
                'title' => '查看菜单',
                'url' => 'admin/menu/display',
                'path' => 'show',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuAdd',
                'title' => '新增菜单',
                'url' => 'admin/menu/create',
                'path' => 'create',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuMod',
                'title' => '修改菜单',
                'url' => 'admin/menu/modify',
                'path' => 'modify',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuDel',
                'title' => '删除菜单',
                'url' => 'admin/menu/delete',
                'path' => 'delete',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
        ]);
    }
}
