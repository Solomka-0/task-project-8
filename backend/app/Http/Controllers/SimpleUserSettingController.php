<?php

namespace App\Http\Controllers;

use App\Models\SimpleUser;
use App\Models\ConfirmationSetting;
use App\Models\UsersSetting;
use App\Notifications\ConfirmSettingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SimpleUserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = UsersSetting::query()->get();
        return $settings;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('nice');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('nice');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersSetting $usersSetting)
    {
        dd('nice');
        //
    }

    /**
     * Вызывает методы обработки по обновлению настройки на указанное значение
     * Принимает параметр value, где значение - есть будущее значение настройки
     *
     * @param Request $request
     * @param SimpleUser $user
     * @param UsersSetting $setting
     * @return void
     */
    public function update(Request $request, SimpleUser $user, UsersSetting $setting)
    {
        $user->setSetting($setting->key, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersSetting $usersSetting)
    {
        dd('nice');
        //
    }
}
