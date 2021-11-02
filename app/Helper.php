<?php

use Laravel\Lumen\Routing\UrlGenerator;

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     * @return string
     */
    function config_path(string $path = ''): string
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('public_path')) {
    /**
     * Get the public path.
     *
     * @param string $path
     * @return string
     */
    function public_path(string $path = ''): string
    {
        return app()->basePath() . '/public' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('is_debug')) {
    /**
     * Get the public path.
     *
     * @return bool
     */
    function is_debug(): bool
    {
        return env('APP_DEBUG');
    }
}
if (!function_exists('urlGenerator')) {
    /**
     * @return UrlGenerator
     */
    function urlGenerator(): UrlGenerator
    {
        return new UrlGenerator(app());
    }
}

if (!function_exists('asset')) {
    /**
     * @param $path
     * @param bool $secured
     *
     * @return string
     */
    function asset($path, bool $secured): string
    {
        return urlGenerator()->asset($path, $secured);
    }
}
