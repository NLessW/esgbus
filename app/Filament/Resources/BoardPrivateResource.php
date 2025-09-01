<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Board;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BoardPrivate;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BoardPrivateResource\Pages;
use App\Filament\Resources\BoardPrivateResource\RelationManagers;

class BoardPrivateResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationGroup = "커뮤니티";
    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationLabel = "1:1문의관리";
    protected static ?string $modelLabel = "1:1문의";
    protected static ?string $recordTitleAttribute = "title";
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('type')->default('private'),
                Forms\Components\Hidden::make('name')->default(config('app.name')),
                Forms\Components\TextInput::make('title')
                    ->label('제목')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->rows(5)
                    ->label('내용')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('comment')
                    ->rows(5)
                    ->label('관리자 답변')
                    ->columnSpanFull(),
                // Forms\Components\SpatieMediaLibraryFileUpload::make('default')
                //     ->multiple()
                //     ->reorderable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('제목')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('이름')
                    ->searchable(),
                Tables\Columns\IconColumn::make('commented_at')
                    ->label('답변여부')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-check'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('등록일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('수정일')
                    ->dateTime('Y-m-d H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    // 저장 전 폼정의
                    // ->mutateRecordDataUsing(function (array $data): array {
                    //     $data['commented'] = auth()->id();
                    //     return $data;
                    // })


                    // 저장 후 업데이트(모달방식)
                    // https://filamentphp.com/docs/3.x/actions/prebuilt-actions/edit#customizing-data-before-saving
                    ->mutateFormDataUsing(function (array $data): array {
                        // 답변이 있을 때 코멘트 날짜 업데이트
                        if (!empty($data['comment'])) {
                            $data['commented_at'] = \Carbon\Carbon::now();
                            return $data;
                        }
                        return $data;
                    }),
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
            'index' => Pages\ManageBoardPrivates::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', 'private')
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
