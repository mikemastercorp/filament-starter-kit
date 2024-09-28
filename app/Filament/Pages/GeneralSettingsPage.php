<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;

class GeneralSettingsPage extends SettingsPage
{
    protected static string $settings = GeneralSettings::class;

    // protected static ?string $navigationGroup = 'Settings'; // Group the settings in a navigation group

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public function form(Form $form): Form
    {
        return $form->schema([

            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('General Settings')
                        ->icon('heroicon-m-bell')
                        ->schema([
                            TextInput::make('site_name')->required(),
                            TextInput::make('site_email')->email()->required(),
                        ])
                        ->columns(2),
                    Tabs\Tab::make('SEO Settings')
                        ->icon('heroicon-m-bell')
                        ->schema([
                            TextInput::make('meta_title')->required(),
                            TextInput::make('meta_description')->required(),
                        ])
                        ->columns(2),

                ])
                ->columnSpanFull()
                ->vertical(),

        ]);
    }
}
