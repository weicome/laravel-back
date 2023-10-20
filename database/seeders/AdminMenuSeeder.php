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
        AdminMenu::create([
            'name' => 'Home',
            'title' => '首页',
            'path' => '/home',
            'component' => 'home/index',
            'route' => 'index',
            'icon' => 'ri:home',
            'pid' => 0,
            'type' => 1,
        ]);
        $admin = AdminMenu::create([
            'name' => 'Admin',
            'title' => '系统管理',
            'path' => '/admin',
            'component' => 'AdminLayout',
            'route' => 'admin',
            'icon' => '',
            'pid' => 0,
            'type' => 0,
        ]);
        $user = AdminMenu::create([
            'name' => 'AdminUser',
            'title' => '用户管理',
            'path' => 'user',
            'component' => 'admin/user/index',
            'route' => 'user',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminUserList',
                'title' => '用户列表',
                'path' => 'list',
                'component' => '',
                'route' => 'index',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserShow',
                'title' => '查看用户',
                'path' => 'show',
                'component' => '',
                'route' => 'display',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserAdd',
                'title' => '新增用户',
                'path' => 'add',
                'component' => '',
                'route' => 'create',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserMod',
                'title' => '修改用户',
                'path' => 'update',
                'component' => '',
                'route' => 'modify',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminUserDel',
                'title' => '删除用户',
                'path' => 'del',
                'component' => '',
                'route' => 'delete',
                'icon' => '',
                'pid' => $user->id,
                'type' => 2,
            ],
        ]);

        $role = AdminMenu::create([
            'name' => 'AdminRole',
            'title' => '角色管理',
            'path' => 'role',
            'component' => 'admin/role/index',
            'route' => 'role',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminRoleList',
                'title' => '角色列表',
                'path' => 'list',
                'component' => '',
                'route' => 'index',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleShow',
                'title' => '查看角色',
                'path' => 'show',
                'component' => '',
                'route' => 'display',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleAdd',
                'title' => '新增角色',
                'path' => 'add',
                'component' => '',
                'route' => 'create',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleMod',
                'title' => '修改角色',
                'path' => 'update',
                'component' => '',
                'route' => 'modify',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminRoleDel',
                'title' => '删除角色',
                'path' => 'del',
                'component' => '',
                'route' => 'delete',
                'icon' => '',
                'pid' => $role->id,
                'type' => 2,
            ],
        ]);

        $menu = AdminMenu::create([
            'name' => 'AdminMenu',
            'title' => '菜单管理',
            'path' => 'menu',
            'component' => 'admin/menu/index',
            'route' => 'menu',
            'icon' => '',
            'pid' => $admin->id,
            'type' => 1,
        ]);
        AdminMenu::insert([
            [
                'name' => 'AdminMenuList',
                'title' => '菜单列表',
                'path' => 'list',
                'component' => '',
                'route' => 'index',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuShow',
                'title' => '查看菜单',
                'path' => 'show',
                'component' => '',
                'route' => 'display',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuAdd',
                'title' => '新增菜单',
                'path' => 'add',
                'component' => '',
                'route' => 'create',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuMod',
                'title' => '修改菜单',
                'path' => 'update',
                'component' => '',
                'route' => 'modify',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
            [
                'name' => 'AdminMenuDel',
                'title' => '删除菜单',
                'path' => 'del',
                'component' => '',
                'route' => 'delete',
                'icon' => '',
                'pid' => $menu->id,
                'type' => 2,
            ],
        ]);
    }
}
