<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Schemas\Schema;

class JournalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\Select::make('jenjang')
                    ->options([
                        'KAMPUS' => 'Kampus',
                        'MA' => 'MA',
                        'SMPT' => 'SMPT',
                        'MI' => 'MI',
                        'UMUM' => 'Umum',
                    ])->required(),
                \Filament\Forms\Components\TextInput::make('category')->required(),
                \Filament\Forms\Components\TextInput::make('author')->required(),
                \Filament\Forms\Components\TextInput::make('mentor')->required(),
                \Filament\Forms\Components\TextInput::make('score')->numeric()->required(),
                \Filament\Forms\Components\DatePicker::make('date')->required(),
                \Filament\Forms\Components\Toggle::make('is_best')->required(),
                \Filament\Forms\Components\Textarea::make('abstract')->required(),
            ]);
    }
}
