<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Schemas\Schema;

class NewsForm
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
                \Filament\Forms\Components\DatePicker::make('date')->required(),
                \Filament\Forms\Components\FileUpload::make('main_image')
                    ->image()
                    ->directory('news/main')
                    ->imageEditor()
                    ->required()
                    ->label('Main Image'),
                \Filament\Forms\Components\TextInput::make('views')->numeric()->default(0)->label('Views Count'),
                \Filament\Forms\Components\Textarea::make('excerpt')->required()->rows(3),
                \Filament\Forms\Components\Textarea::make('content')->required()->rows(10),
                \Filament\Forms\Components\FileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->directory('news/gallery')
                    ->maxFiles(10)
                    ->imageEditor()
                    ->label('Gallery Images')
                    ->helperText('Upload multiple images for the gallery (max 10 images)')
            ]);
    }
}
