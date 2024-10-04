<?php

namespace App\Settings;

use DateTime;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // Define the settings page inputs to use in the Settings Page
    // General Settings tab variables
    public string   $site_name; // text input
    public string   $site_email; // same text input but used in the form with email validation
    public string   $site_select; // select input
    public bool     $site_is_checked; // checkbox input
    public bool     $site_is_toggled; // toggle input
    public array    $site_checkboxlist; // checkbox list input
    public string   $site_radio; // radio input
    public string   $site_datetimepicker; // date and time picker input
    public string   $site_datepicker;  // date picker input.
    public string   $site_timepicker;// time picker input
    public string   $site_fileupload_single;// file upload input
    public array    $site_fileupload_multi;// file upload input for multiple files
    public string   $site_fileupload_avatar;// file upload input for avatar (circular upload zone cropping image to avatar size)

    // Meta Tab variables
    public string   $meta_title;
    public string   $meta_description;

    // Use this function to return the settings group and its values
    // In a view we can use: <h1>{{ settings(App\Settings\GeneralSettings::class)->site_name }}</h1>
    public static function group(): string
    {
        return 'general';
    }

    protected $casts = [
        'site_datetimepicker' => 'datetime', // set the casted value of the input to datetime
        'site_datepicker' => 'date', // set the casted value of the input to date
        'site_timepicker' => 'time' // set the casted value of the input to time
    ];
}
