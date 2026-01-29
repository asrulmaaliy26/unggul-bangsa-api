<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;

class ProjectForm
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
                \Filament\Forms\Components\DatePicker::make('date')->required(),
                \Filament\Forms\Components\TextInput::make('imageUrl')->url()->required(),
                \Filament\Forms\Components\Textarea::make('description')->required()->rows(5),
                \Filament\Forms\Components\Repeater::make('documents')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')->required(),
                        \Filament\Forms\Components\Select::make('type')->options(['proposal'=>'Proposal','report'=>'Report'])->required(),
                        \Filament\Forms\Components\Select::make('format')->options(['pdf'=>'PDF','docx'=>'DOCX'])->required(),
                        \Filament\Forms\Components\TextInput::make('url')->url()->required(),
                    ])
            ]);
    }
}
