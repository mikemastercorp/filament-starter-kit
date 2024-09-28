<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    // Define the settings page inputs to use in the Settings Page
    public string $site_name;
    public string $site_email;
    public string $meta_title;
    public string $meta_description;

    // Use this function to return the settings group and its values
    // In a view we can use: <h1>{{ settings(App\Settings\GeneralSettings::class)->site_name }}</h1>
    public static function group(): string
    {
        return 'general';
    }
}
