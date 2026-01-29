<?php

namespace App\Filament\Resources\Journals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class JournalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                \Filament\Tables\Columns\TextColumn::make('author')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('category')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('score')->sortable(),
                \Filament\Tables\Columns\IconColumn::make('is_best')->boolean()->sortable(),
                \Filament\Tables\Columns\TextColumn::make('date')->date()->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
