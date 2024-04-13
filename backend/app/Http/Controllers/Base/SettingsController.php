<?php

namespace App\Http\Controllers\Base;

class SettingsController
{
    public function __construct($handler, $method = 'call', ...$args)
    {
        // Составляю полный путь до класса
        $controller_class = "App\\Http\\Controllers\\Settings\\$handler";

        if (!class_exists($controller_class)) {
            throw new \Error('Указанный обработчик не найден: ' . $controller_class, 404);
        }

        return (new $controller_class())->{$method ?? 'call'}(...$args);
    }
}
