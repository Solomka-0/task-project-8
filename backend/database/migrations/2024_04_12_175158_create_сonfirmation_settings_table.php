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
        Schema::create('confirmation_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->comment('ID Пользователя');
            $table->integer('setting_id')->index()->comment('ID настройки');
            $table->string('value')->index()->comment('Значение после подтверждения');
            $table->enum('confirm_type', ['mail', 'sms', 'telegram'])->index()->comment('Тип подтверждения');
            $table->string('code')->index()->comment('Код подтверждения');
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('confirm_at')->nullable()->comment('Время подтверждения');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmation_settings');
    }
};
