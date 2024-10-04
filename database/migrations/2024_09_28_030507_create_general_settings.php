<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Table columns for General Settings Tab
        $this->migrator->add('general.site_name', 'Default Site Name'); // text input setting
        $this->migrator->add('general.site_email', 'default@example.com'); // text input with email validation
        $this->migrator->add('general.site_select', ''); // select dropdown input
        $this->migrator->add('general.site_is_checked', ''); // checkbox input
        $this->migrator->add('general.site_is_toggled', ''); // toggle input
        $this->migrator->add('general.site_checkboxlist', []); // checkbox list input (since we store an array data, the [] is required to mark DB column!)
        $this->migrator->add('general.site_radio', ''); // radio options input
        $this->migrator->add('general.site_datetimepicker', ''); //datet/time options input
        $this->migrator->add('general.site_datepicker', ''); // date options input
        $this->migrator->add('general.site_timepicker', ''); // time options input
        $this->migrator->add('general.site_fileupload_single', ''); // file upload options input
        $this->migrator->add('general.site_fileupload_multi', []); // file upload options input
        $this->migrator->add('general.site_fileupload_avatar', ''); // file upload options input

        // Table columns for Meta Settings Tab
        $this->migrator->add('general.meta_title', 'Default Meta Title'); // text input on another tab
        $this->migrator->add('general.meta_description', 'Default Meta Description'); // demo text input for the second tab
    }
};
