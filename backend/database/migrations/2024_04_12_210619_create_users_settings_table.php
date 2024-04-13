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
        Schema::create('users_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->index()->comment('Ключ');
            $table->string('type')->index()->comment('Тип настройки');
            $table->boolean('is_basic')->comment('Основная ли или храниться в settings-поле');
            $table->string('default')->index()->nullable()->comment('Значение по умолчанию');
            $table->text('confirm_types')->nullable()->comment('Типы подтверждения');
            $table->string('handler')->nullable()->comment('Обработчик при изменении');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_settings');
    }
};
