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
        AdminRole::create([
            'name' => '超级管理员',
            'symbol' => 'root',
            'status' => 1,
            'remark' => '最高权限角色',
        ]);
    }
}
