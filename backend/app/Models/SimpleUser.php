<?php

namespace App\Models;

use App\Notifications\ConfirmationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SimpleUser extends Model
{
    use HasFactory;
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    protected $attributes = [
        'settings' => '[]'
    ];

    protected $casts = [
        'password' => 'encrypted',
        'settings' => 'array'
    ];

    protected $hidden = [
        'password'
    ];

    public function setSetting($key, $value)
    {
        // Обновляю настройки
        $this->updateSettings();
        $setting = UsersSetting::query()->firstWhere('key', '=', $key);
        $setting->callSetting($this, $value);
    }

    /**
     * Возвращает полный список настроек
     *
     * @return object
     */
    public function settings(): object
    {
        // Обновляю настройки
        $this->updateSettings();

        // Формирую полный список настроек
        $settings_other = UsersSetting::query()->where('is_basic', '=', 1)->get();
        $settings = [];
        foreach ($settings_other as $setting) {
            $settings[$setting->key] = $this->{$setting->key};
        }
        $settings_full = array_merge($settings, $this->settings);

        return (object)$settings_full;
    }

    /**
     * Update one or more settings and then optionally save the model.
     *
     */
    public function updateSettings(array $revisions = [], bool $save = true): self
    {
        // Формирую список из таблицы user_settings
        $settings_other = UsersSetting::query()->where('is_basic', '=', 0)->get();
        $settings = [];
        foreach ($settings_other as $setting) {
            // TODO: обработка типов
            $settings[$setting->key] = $setting->default ?? null;
        }
        $this->settings = array_merge($settings, $this->settings, $revisions);

        // Сохранение
        if ($save) {
            $this->save();
        }
        return $this;
    }

    /**
     * Retrieve a setting with a given name or fall back to the default.
     *
     */
    public function setting(string $name, $default = null)
    {
        if (array_key_exists($name, $this->settings)) {
            return $this->settings[$name];
        }
        return $default;
    }

    /**
     * Создает запись для подтверждения настройки
     *
     * @param string $key
     * @param string $value
     * @param ConfirmationType $type
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed
     */
    public function confirmationCall(int $setting_id, string $value, ConfirmationType $type)
    {
        $confirmation_setting = ConfirmationSetting::query()->create([
            'user_id' => $this->id,
            'setting_id' => $setting_id,
            'value' => $value,
            'type' => $type->value(),
        ]);
        return $confirmation_setting;
    }
}
