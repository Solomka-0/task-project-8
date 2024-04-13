<?php

namespace App\Http\Controllers\Settings;

use App\Models\ConfirmationSetting;
use App\Models\SimpleUser;
use App\Models\UsersSetting;
use App\Notifications\ConfirmationType;
use App\Notifications\ConfirmSettingNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImportantSettingsController extends BaseSettingsController
{
    public function mail(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        $confirmation = $user->confirmationCall($setting->id, $request->json('value'), ConfirmationType::MAIL);
        $user->notify(new ConfirmSettingNotification($confirmation));
    }

    public function confirm(Request $request, $confirm_id, $code)
    {
        return ConfirmationSetting::confirm($confirm_id, $code);
    }
}
