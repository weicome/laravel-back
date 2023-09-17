<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('username',20)->default('')->comment('昵称');
            $table->string('account',64)->default('')->comment('账号')->unique();
            $table->string('password',64)->default('')->comment('密码');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->ipAddress()->nullable()->comment('登录ip地址');
            $table->timestamps();
            $table->rememberToken();
            $table->comment('管理员账号表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
