<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoUsuarioResource\Pages;
use App\Filament\Resources\TipoUsuarioResource\RelationManagers;
use App\Models\TipoUsuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoUsuarioResource extends Resource
{
    protected static ?string $model = TipoUsuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tipo_usuario')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('estado')
                    ->required()
                    ->maxLength(255)
                    ->default('ACTIVO'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_usuario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
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
            'index' => Pages\ListTipoUsuarios::route('/'),
            'create' => Pages\CreateTipoUsuario::route('/create'),
            'edit' => Pages\EditTipoUsuario::route('/{record}/edit'),
        ];
    }
}
