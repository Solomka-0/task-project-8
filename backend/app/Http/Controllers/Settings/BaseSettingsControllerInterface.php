<?php

namespace App\Http\Controllers\Settings;

use App\Models\SimpleUser;
use App\Models\UsersSetting;
use Illuminate\Http\Request;

interface BaseSettingsControllerInterface
{
    /**
     * Точка входа
     *
     * @param ...$args
     * @return mixed
     */
    public function call(SimpleUser $user, UsersSetting $setting, Request $request);
}
