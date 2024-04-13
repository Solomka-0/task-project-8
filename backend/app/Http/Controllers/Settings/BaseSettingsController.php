<?php

namespace App\Http\Controllers\Settings;

use App\Models\SimpleUser;
use App\Models\UsersSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BaseSettingsController extends BaseController implements BaseSettingsControllerInterface
{
    use AuthorizesRequests, ValidatesRequests;

    public function call(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        echo 'Обработка события';
    }

    public function mail(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        echo 'Подтверждение по почте';
    }

    public function phone(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        echo 'Подтверждение по номеру телефона';
    }

    public function telegram(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        echo 'Подтверждение через телеграм';
    }

    public function confirm(Request $request, $confirm_id, $code)
    {
        echo 'Подтверждение';
    }
}
