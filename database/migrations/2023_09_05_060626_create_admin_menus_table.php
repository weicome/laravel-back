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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('')->comment('页面标题');
            $table->string('name')->default('')->comment('路由名称');
            $table->string('path')->default('')->comment('路径');
            $table->string('icon')->default('')->comment('图标');
            $table->string('component')->default('')->comment('组件路径');
            $table->string('redirect')->default('')->comment('默认页面');
            $table->integer('pid')->default(0)->comment('上级id');

            $table->string('route')->default('')->comment('接口地址');
            $table->tinyInteger('type')->default(0)->comment('类型：0=目录,1=菜单,2=按钮');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->integer('sort')->default(1)->comment('排序');
            $table->timestamps();
            $table->comment('菜单表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menus');
    }
};
