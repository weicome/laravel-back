<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = AdminRole::create([
            'name' => '超级管理员',
            'symbol' => 'root',
            'status' => 1,
            'remark' => '最高权限角色',
        ]);
        $role->menus()->sync([1,2,3,4,5,6,7,8,9,10]);
        AdminRole::create([
            'name' => '代理商',
            'symbol' => 'agent',
            'status' => 1,
            'remark' => '后台代理',
        ]);
    }
}
