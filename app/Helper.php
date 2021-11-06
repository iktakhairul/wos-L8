<?php

use Laravel\Lumen\Routing\UrlGenerator;
use Illuminate\Support\Facades\DB;

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

if (!function_exists('divisions')) {
    function divisions()
    {
        return DB::connection('locations')->table('divisions')->get();
    }
}

if (!function_exists('districts')) {
    function districts()
    {
        return DB::connection('locations')->table('districts')->get();
    }
}

if (!function_exists('thanas')) {
    function thanas()
    {
        return DB::connection('locations')->table('thanas')->get();
    }
}

if (!function_exists('my_businesses')) {
    function my_businesses()
    {
       return Auth::check() ? DB::table('businesses')->where('user_id', Auth::user()->id)->get() : false ;
    }
}

if (!function_exists('check_business_user')) {
    function check_business_user($businessId)
    {
        $businesses = DB::table('businesses')->where('user_id',Auth::user()->id)->pluck('id')->toArray();
        return in_array($businessId, $businesses) ? true : false ;
    }
}