<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Board;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BoardNotice;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BoardNoticeResource\Pages;
use App\Filament\Resources\BoardNoticeResource\RelationManagers;

class BoardNoticeResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationGroup = "커뮤니티";
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = "공지사항관리";
    protected static ?string $modelLabel = "공지사항";
    protected static ?string $recordTitleAttribute = "title";
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('type')
                //     ->required()
                //     ->maxLength(8),
                // Forms\Components\TextInput::make('category_id')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                // Forms\Components\TextInput::make('name')
                //     ->label('등록자명')
                //     ->required()
                //     ->maxLength(64),
                // Forms\Components\TextInput::make('password')
                //     ->password()
                //     ->maxLength(255),
                Forms\Components\Hidden::make('type')->default('notice'),
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
                // Forms\Components\Textarea::make('comment')
                //     ->rows(5)
                //     ->columnSpanFull(),
                // Forms\Components\TextInput::make('hit')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                // Forms\Components\DateTimePicker::make('commented_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                // Tables\Columns\TextColumn::make('type')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('category_id')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('name')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('제목')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('hit')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('등록일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                // ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('수정일')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('commented_at')
                //     ->dateTime()
                //     ->sortable(),
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
            'index' => Pages\ManageBoardNotices::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', 'notice')
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
