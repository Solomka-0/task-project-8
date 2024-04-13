<?php

namespace App\Models;

use App\Events\ConfirmationSettingCreating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class ConfirmationSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'setting_id',
        'value',
        'confirm_type',
    ];

    protected $dispatchesEvents = [
        'creating' => ConfirmationSettingCreating::class
    ];

    public function setting()
    {
        return $this->hasOne(UsersSetting::class, 'id', 'setting_id');
    }

    /**
     * Проверка кода, изменение настроек
     *
     * @param $id - id confirmation_settings
     * @param $code - Код подтверждения
     * @return SimpleUser | Response
     */
    public static function confirm($id, $code): SimpleUser | Response
    {
        $confirm_setting = ConfirmationSetting::query()->find($id);

        // TODO: Время ожидания
        // Подтверждено ли и соответствие кода
        if (empty($confirm_setting->confirm_at) && $confirm_setting->code == $code) {
            $user = SimpleUser::query()->find($confirm_setting->user_id);

            $confirm_setting->confirm_at = new \DateTime();
            $confirm_setting->save();

            $setting = $confirm_setting->setting;
            $setting->setSetting($user, $confirm_setting->value);
            return $user;
        } else {
            return new Response('Not Found', 404);
        }
    }
}
