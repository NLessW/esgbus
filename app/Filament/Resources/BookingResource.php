<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookingResource\RelationManagers;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    // protected static ?string $navigationGroup = "온라인신청";
    protected static ?string $navigationLabel = "체험예약관리";
    protected static ?string $modelLabel = "체험예약";
    protected static ?string $recordTitleAttribute = "name";
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('booking_date')
                    ->label('예약일')
                    ->required(),
                Forms\Components\TextInput::make('number_adult')
                    ->label('어른')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('number_teenager')
                    ->label('청소년')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('number_child')
                    ->label('어린이')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('name')
                    ->label('예약자명')
                    ->required()
                    ->maxLength(64),
                Forms\Components\TextInput::make('contact')
                    ->label('연락처')
                    ->required()
                    ->maxLength(32),
                Forms\Components\TextInput::make('email')
                    ->label('이메일')
                    ->email()
                    ->required()
                    ->maxLength(64),
                Forms\Components\Select::make('active')
                    ->label('상태')
                    ->options(config('site.booking.status'))
                    ->required(),
                Forms\Components\Textarea::make('memo')
                    ->label('관리자메모')
                    ->rows(5)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_date')
                    ->label('예약일')
                    ->date('Y-m-d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_adult')
                    ->label('어른')
                    ->numeric(),
                Tables\Columns\TextColumn::make('number_teenager')
                    ->label('청소년')
                    ->numeric(),
                Tables\Columns\TextColumn::make('number_child')
                    ->label('어린이')
                    ->numeric(),
                Tables\Columns\TextColumn::make('name')
                    ->label('예약자명')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact')
                    ->label('연락처')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('이메일')
                    ->searchable(),
                Tables\Columns\TextColumn::make('active')
                    ->label('상태')
                    ->badge()
                    ->state(function (Booking $record): string {
                        return config('site.booking.status')[$record->active];
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '신청중(입금대기)' => 'gray',
                        '완료' => 'success',
                        '신청취소' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('신청일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('수정일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('deleted_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBookings::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
