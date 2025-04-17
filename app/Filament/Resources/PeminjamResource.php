<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamResource\Pages;
use App\Filament\Resources\PeminjamResource\RelationManagers;
use App\Models\Peminjam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeminjamResource extends Resource
{
    protected static ?string $model = Peminjam::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Peminjaman';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('peminjam_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('anggota_id')
                    ->relationship('anggota', 'nama')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('buku_id')
                    ->relationship('buku', 'judul')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('petugas_id')
                    ->relationship('petugas', 'nama_anggota')
                    ->required()
                    ->searchable(),
                Forms\Components\DatePicker::make('tanggal_peminjaman')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengembalian')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                        'terlambat' => 'Terlambat',
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('peminjam_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('anggota.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('buku.judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('petugas.nama_anggota')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_peminjaman')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dipinjam' => 'info',
                        'dikembalikan' => 'success',
                        'terlambat' => 'danger',
                        default => 'secondary',
                    })
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPeminjams::route('/'),
            'create' => Pages\CreatePeminjam::route('/create'),
            'edit' => Pages\EditPeminjam::route('/{record}/edit'),
        ];
    }
}