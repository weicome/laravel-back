<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_index(): void
    {
        $response = $this->post('/api/back/admin/user/index');

        $response->dump();
    }

    public function test_user_create(): void
    {
        $response = $this->post('/api/back/admin/user/create',[
            'name' => 'AdminUser',
            'title' => '管理员列表',
            'url' => 'admin/user/list',
            'path' => 'admin.user.list',
            'pid' => '0',
            'type' => '1',
            'status' => '1',
            'sort' => '1',
        ]);

        $response->dump();
    }

//    public function test_user_display(): void
//    {
//        $response = $this->post('/api/back/admin/user/display',['id'=>1]);
//
//        $response->dump();
//    }
//
//    public function test_user_modify(): void
//    {
//        $response = $this->post('/api/back/admin/user/modify',[
//            'name' => 'AdminUser',
//            'title' => '管理员列表',
//            'url' => 'admin/user/list',
//            'path' => 'admin.user.list',
//            'pid' => '0',
//            'type' => '1',
//            'status' => '1',
//            'sort' => '1',
//        ]);
//
//        $response->dump();
//    }
//
//    public function test_user_delete(): void
//    {
//        $response = $this->post('/api/back/admin/user/delete',['id'=>2]);
//
//        $response->dump();
//    }
}
