<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MensajeResource\Pages;
use App\Filament\Resources\MensajeResource\RelationManagers;
use App\Models\Mensaje;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MensajeResource extends Resource
{
    protected static ?string $model = Mensaje::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('texto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('fecha_incidente'),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longitud')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('latitud')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('estado_atendido')
                    ->required()
                    ->maxLength(255)
                    ->default('NO ATENDIDO'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('texto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_incidente')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_atendido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMensajes::route('/'),
            'create' => Pages\CreateMensaje::route('/create'),
            'edit' => Pages\EditMensaje::route('/{record}/edit'),
        ];
    }
}
