<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CompanyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Company Name'),

                TextEntry::make('industry')
                    ->placeholder('Not specified'),

                TextEntry::make('location')
                    ->placeholder('Not specified'),

                TextEntry::make('website_url')
                    ->label('Company Website')
                    ->placeholder('Not provided'),

                IconEntry::make('is_active')
                    ->label('Monitoring Enabled')
                    ->boolean(),

                TextEntry::make('last_modified')
                    ->label('Last Modified')
                    ->dateTime(),
            ])
            ->columns(2);
    }
}
