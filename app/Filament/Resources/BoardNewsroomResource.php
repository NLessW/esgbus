<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Board;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BoardNewsroom;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BoardNewsroomResource\Pages;
use App\Filament\Resources\BoardNewsroomResource\RelationManagers;

class BoardNewsroomResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationGroup = "커뮤니티";
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = "뉴스룸관리";
    protected static ?string $modelLabel = "뉴스룸";
    protected static ?string $recordTitleAttribute = "title";
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('type')->default('newsroom'),
                Forms\Components\Hidden::make('name')->default(config('app.name')),
                Forms\Components\TextInput::make('title')
                    ->label('제목')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->toolbarButtons([
                        'attachFiles',
                        // 'blockquote',
                        'bold',
                        // 'bulletList',
                        // 'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        // 'link',
                        // 'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->label('내용')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('default')
                    ->label('대표이미지'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('default')
                    ->label('대표이미지')
                    ->collection('default')
                    ->conversion('thumb'),
                Tables\Columns\TextColumn::make('title')
                    ->label('제목')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('등록일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('수정일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageBoardNewsrooms::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', 'newsroom')
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
