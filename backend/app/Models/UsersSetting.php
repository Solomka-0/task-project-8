<?php

namespace App\Models;

use App\Http\Controllers\Base\SettingsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'key',
        'type',
        'is_basic',
        'default',
        'handler',
    ];

    protected $hidden = [
        'handler'
    ];

    protected $casts = [
      'confirm_types' => 'array'
    ];

    public function setSetting(SimpleUser $user, $value) {
        if ($this->is_basic) {
            $user->{$this->key} = $value;
            $user->save();
        } else {
            $user->updateSettings([$this->key => $value]);
        }
    }

    /**
     * Принимает пользователя и тело запроса.
     * Если находит обработчик для настройки пользователя - вызывает его,
     * иначе - присваивает значение, обращаясь к полю value в json
     *
     * @param SimpleUser $user
     * @param Request $request
     * @return Response
     */
    public function callSetting(SimpleUser $user, Request $request) {
        $confirm_types = json_decode($this->confirm_types);
        if (!empty($this->handler)) {
            // Если есть предопределенные методы подтверждения
            if (!empty($confirm_types)) {
                // Есть ли метод в предопределенных, Ошибка если нет
                if (!empty($request->json('confirm_method')) && !in_array($request->json('confirm_method'), $confirm_types)) {
                    return new Response('Метод не определен', 409);
                }
                (new SettingsController($this->handler, $request->json('confirm_method'), $user, $this, $request));
            } else {
                (new SettingsController($this->handler, null, $user, $this, $request));
            }
        } else {
            $this->setSetting($user, $request->json('value'));
        }
        return new Response(null, 200);
    }
}
