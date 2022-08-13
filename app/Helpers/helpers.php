<?php

use App\Models\Setting\Setting;

if (!function_exists('user')) {

    function user()
    {
        return auth()->user();
    }
}


if (!function_exists('setting')) {

    function setting($key, $default = 'N/A', $company = null)
    {
        if (!$company) {
            $company = user()->current_company;
        }
        $setting = Setting::where('key', $key)->where('company_id', $company)->first();

        return ($setting) ? $setting->value : $default;
    }
}

if (!function_exists('setSetting')) {

    function setSetting($key, $value, $company = null)
    {
        if (!$company) {
            $company = user()->current_company;
        }

        $setting = Setting::where('key', $key)->where('company_id', $company)->first();

        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else {
            Setting::create([
                'company_id' => $company,
                'key' => $key,
                'value' => $value
            ]);
        }
        return true;
    }
}


if (!function_exists('removeCompanySetting')) {

    function removeCompanySetting($company)
    {
        if (!$company) {
            $company = user()->current_company;
        }
        $settings = Setting::where('company_id', $company)->get();
        foreach ($settings as $setting) {
            $setting->delete();
        }
    }
}
