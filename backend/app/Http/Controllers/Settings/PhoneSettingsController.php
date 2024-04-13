<?php

namespace App\Http\Controllers\Settings;

use App\Models\SimpleUser;
use App\Models\UsersSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneSettingsController extends BaseSettingsController
{
    public function call(SimpleUser $user, UsersSetting $setting, Request $request)
    {
        //
    }
}
