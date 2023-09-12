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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名称');
            $table->string('symbol')->default('')->comment('符号')->unique();
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->string('remark')->default('')->comment('描述');
            $table->timestamps();
            $table->comment('角色表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_roles');
    }
};
