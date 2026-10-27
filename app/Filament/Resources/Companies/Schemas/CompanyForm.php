<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),

                TextInput::make('website_url')
                    ->label('Company Website')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://example.com'),

                TextInput::make('industry')
                    ->label('Industry')
                    ->maxLength(255)
                    ->placeholder('Technology, Finance, Healthcare...'),

                TextInput::make('location')
                    ->label('Location')
                    ->maxLength(255)
                    ->placeholder('Nairobi, Kenya'),

                Toggle::make('is_active')
                    ->label('Enable Monitoring')
                    ->default(true)
                    ->helperText('Disable this to stop monitoring this company.'),
            ])
            ->columns(2);
    }
}
