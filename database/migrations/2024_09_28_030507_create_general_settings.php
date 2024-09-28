<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Default Site Name');
        $this->migrator->add('general.site_email', 'default@example.com');
        $this->migrator->add('general.meta_title', 'Default Meta Title');
        $this->migrator->add('general.meta_description', 'Default Meta Description');
    }
};
