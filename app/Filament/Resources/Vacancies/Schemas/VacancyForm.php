<?php

namespace App\Filament\Resources\Vacancies\Schemas;

use App\Models\Company;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VacancyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('company_id')
                    ->label('Company')
                    ->relationship('company', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('title')
                    ->label('Job Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('URL Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('Example: junior-software-developer-kenya'),

                Textarea::make('description')
                    ->label('Job Description')
                    ->rows(8)
                    ->columnSpanFull(),

                TextInput::make('location')
                    ->label('Location')
                    ->placeholder('Nairobi, Kenya or Remote'),

                Select::make('employment_type')
                    ->label('Employment Type')
                    ->options([
                        'Internship' => 'Internship',
                        'Full-time' => 'Full-time',
                        'Part-time' => 'Part-time',
                        'Contract' => 'Contract',
                        'Temporary' => 'Temporary',
                        'Graduate Trainee' => 'Graduate Trainee',
                        'Attachment' => 'Industrial Attachment',
                    ])
                    ->searchable(),

                Select::make('experience_level')
                    ->label('Experience Level')
                    ->options([
                        'Entry-level' => 'Entry-level',
                        'Junior' => 'Junior',
                        'Mid-level' => 'Mid-level',
                        'Senior' => 'Senior',
                        'Manager' => 'Manager',
                        'Executive' => 'Executive',
                    ])
                    ->searchable(),

                TextInput::make('application_url')
                    ->label('Application URL')
                    ->url()
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                DateTimePicker::make('published_at')
                    ->label('Publication Date'),

                DateTimePicker::make('deadline')
                    ->label('Application Deadline'),

                TextInput::make('external_id')
                    ->label('External Vacancy ID')
                    ->maxLength(255),

                TextInput::make('source')
                    ->label('Source')
                    ->default('company_website')
                    ->required(),

                Toggle::make('is_active')
                    ->label('Active Vacancy')
                    ->default(true),

                DateTimePicker::make('last_seen_at')
                    ->label('Last Detected'),
            ])
            ->columns(2);
    }
}

