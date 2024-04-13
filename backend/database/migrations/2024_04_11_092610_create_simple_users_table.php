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
        Schema::create('simple_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->comment('Имя пользователя');
            $table->string('phone', 16)->index()->comment('Номер телефона');
            $table->string('email')->index()->comment('Электронная почта');
            $table->string('password')->comment('Пароль');
            $table->text('settings')->comment('Настройки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simple_users');
    }
};
