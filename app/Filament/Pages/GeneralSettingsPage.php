<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;

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

                            // All TextInput options: https://filamentphp.com/docs/3.x/forms/fields/text-input
                            TextInput::make('site_name')->required()
                                ->label('TextInput field'),

                            TextInput::make('site_email')
                                ->email()
                                ->label('TextInput field with email validation')
                                ->required(),

                            // All Select options: https://filamentphp.com/docs/3.x/forms/fields/select
                            Select::make('site_select')
                                ->label('Select input field')
                                ->options([
                                    'choice1' => 'First Selector Choice',
                                    'choice2' => 'Second Selector Choice',
                                    'choice3' => 'Third Selector Choice',
                                ])
                                ->searchable() // show a searchbox on Select input
                                // ->multiple() // allow multi choice select input (returns array)
                                ->required() // set the input as required in form validation
                                ->preload() // preload all selector choices on page load
                                ->selectablePlaceholder() // disable the option to select the placeholder as a choice
                                ->default('Second Selector Choice'), // set the default Select input based on it's option value

                            // All Checkbox options: https://filamentphp.com/docs/3.x/forms/fields/checkbox
                            Checkbox::make('site_is_checked') // checkbox input field
                                ->label('Checkbox field') // set the label of the checkbox (inline with the input)
                                ->inline(false)
                                ->required(), // set the checkbox as mandatory

                            // All toggle options: https://filamentphp.com/docs/3.x/forms/fields/toggle
                            Toggle::make('site_is_toggled') // toggle input field
                                ->onIcon('heroicon-m-bolt') // define the icon when the toggle is ON
                                ->offIcon('heroicon-m-user') // define the icon when the toggle is OFF
                                ->label('Toggle input field')
                                ->inline(false)
                                ->required(), // set the toggle as mandatory

                            // All CheckboxList options: https://filamentphp.com/docs/3.x/forms/fields/checkbox-list
                            CheckboxList::make('site_checkboxlist') // checkbox list with supplied options
                                // ->label('') // set an empty label value to hide it
                                ->options([ // define the checkbox list options to chose from
                                    '1' => '== A ==',
                                    '2' => '== B ==',
                                    '3' => '== C =='
                                ])
                                ->descriptions([
                                    '1' => 'Option A',
                                    '2' => 'Option B',
                                    '3' => 'Option C'
                                ])
                                // set the number of columns to order the list options (equal number of coluns and choices makes them horizonta)
                                ->columns(3),

                            // All Radio options: https://filamentphp.com/docs/3.x/forms/fields/radio
                            Radio::make('site_radio')
                                ->columnSpanFull()
                                ->label('Radio input field')
                                ->options([
                                    '1' => '== A ==',
                                    '2' => '== B ==',
                                    '3' => '== C ==',
                                ])
                                ->descriptions([
                                    '1' => 'Option A',
                                    '2' => 'Option B',
                                    '3' => 'Option C'
                                ])
                                // set the number of columns to order the list options (equal number of coluns and choices makes them horizonta)
                                ->columns(3),

                            // URL for All Date/Time Pickers: https://filamentphp.com/docs/3.x/forms/fields/date-time-picker
                            DateTimePicker::make('site_datetimepicker') // datetime picker input field (obvious ;))
                                ->label('DateTimePicker input field') // define the input label
                                ->timezone('America/New_York') // set the timezone of the datepicker
                                ->native(false) // enable Javascript picker as by default Filament uses the HTML5 one
                                ->seconds(false) // disable seconds in the timepicker
                                ->format('d/m/Y H:i') // format of the input during POST request
                                ->displayFormat('d/m/Y H:i'), // format to display on screen independently from the format we defined to store
                            DatePicker::make('site_datepicker')
                                ->label('DatePicker input field')
                                ->timezone('America/New_York') // set the timezone of the datepicker
                                //->native(false) // enable Javascript picker as by default Filament uses the HTML5

                                // If the default HTML5 date picker is used, the display format will remain mm/dd/yyyy no matter what we defined
                                ->format('d/m/Y') // format of the input during POST request
                                ->displayFormat('d/m/Y'), // format to display on screen independently from the format we defined to store
                            TimePicker::make('site_timepicker')
                                ->label('TimePicker input field'),

                            Section::make('File Uploads')
                                ->description('Allow the attachment of various file types and if images, allow editing')
                                ->schema([
                                    // File Upload tps://filamentphp.com/docs/3.x/forms/fields/file-upload
                                    FileUpload::make('site_fileupload_single')
                                        ->label('File upload input') // define the file upload input label
                                        ->disk('public'), // define the disk to store the attached file

                                    // File Upload tps://filamentphp.com/docs/3.x/forms/fields/file-upload
                                    FileUpload::make('site_fileupload_multi')
                                        ->label('Multi Image upload input with editor') // define the file upload input label
                                        ->disk('public') // define the disk to store the attached file
                                        ->multiple() // set the file upload input as multiple
                                        ->image() // set the file upload type as image mime
                                        ->imageEditor() // allow an image editor on upload or editing
                                        ->imageEditorMode(2) // define the image editor mode (1, 2 or 3)
                                        ->panelLayout('grid'), // align all attached files in a grid (2 columns)

                                    FileUpload::make('site_fileupload_avatar')
                                        ->label('Avatar upload input')
                                        ->avatar(), // set the file upload type as avatar (image mime type with cropped size)
                                ])
                                ->columns(3)

                        ])
                        ->columns(3),

                    Tabs\Tab::make('SEO Settings')
                        ->icon('heroicon-m-bell')
                        ->schema([
                            TextInput::make('meta_title')->required(),
                            TextInput::make('meta_description')->required(),
                        ])
                        ->columns(2),

                ])
                ->columnSpanFull()

        ]);
    }
}
