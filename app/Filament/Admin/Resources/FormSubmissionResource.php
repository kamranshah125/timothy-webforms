<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FormSubmissionResource\Pages;
use App\Filament\Admin\Resources\FormSubmissionResource\RelationManagers;
use App\Models\FormSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;

class FormSubmissionResource extends Resource
{
    protected static ?string $model = FormSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationLabel = 'Form Submissions';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('User Info')
                    ->schema([
                        TextEntry::make('user.name')->label('User Name'),
                        TextEntry::make('user.email')->label('User Email'),
                    ])
                    ->columns(2),

                Section::make('Submission Info')
                    ->schema([
                        TextEntry::make('form_type')
                            ->label('Form Type')
                            ->formatStateUsing(fn($state) => ucwords(str_replace('-', ' ', $state)))
                            ->badge(),

                        TextEntry::make('status')
                            ->badge()
                            ->colors([
                                'warning' => 'draft',
                                'success' => 'completed',
                            ]),

                        TextEntry::make('current_step')
                            ->label('Current Step'),
                    ])
                    ->columns(3),

               Section::make('Form Responses')
    ->schema(function ($record) {

        $rows = [];

        foreach ($record->form_data ?? [] as $page => $fields) {

            // Page Heading
            $rows[] = TextEntry::make($page . '_title')
                ->label('')
                ->state(fn() => strtoupper(str_replace('_', ' ', $page)))
                ->extraAttributes([
                    'class' => 'text-lg font-semibold text-gray-700 border-b border-gray-200 pt-4 pb-1 mt-4'
                ])
                ->columnSpanFull();

            // Fields
            foreach ($fields as $key => $value) {
                $rows[] = TextEntry::make($page . '_' . $key)
                    ->label(ucfirst(str_replace('_', ' ', $key)))
                    ->state(is_array($value) ? implode(', ', $value) : (string)$value)
                    ->extraAttributes([
                        'class' => 'text-gray-800'
                    ])
                    ->hintIcon('heroicon-o-arrow-right')
                    ->columnSpan(2);
            }
        }

        // SCORES SECTION
        if (!empty($record->section_scores)) {

            $rows[] = TextEntry::make('scores_title')
                ->label('')
                ->state('SECTION SCORES')
                ->extraAttributes([
                    'class' => 'text-lg font-semibold text-gray-700 border-b border-gray-300 pt-6 pb-1 mt-6'
                ])
                ->columnSpanFull();

            foreach ($record->section_scores as $section => $score) {
                $rows[] = TextEntry::make('score_' . $section)
                    ->label(ucfirst(str_replace('_', ' ', $section)))
                    ->state($score)
                    ->extraAttributes([
                        'class' => 'font-medium text-gray-900'
                    ])
                    ->columnSpan(2);
            }

            // TOTAL SCORE HIGHLIGHT
            $rows[] = TextEntry::make('total_score')
                ->label('Total Score')
                ->state(array_sum($record->section_scores))
                ->extraAttributes([
                    'class' => 'text-blue-600 font-bold text-lg'
                ])
                ->columnSpan(2);
        }

        return $rows;
    })
    ->columns(2)
    ->columnSpanFull(),
                Section::make('PDF')
                    ->schema([
                        TextEntry::make('pdf_path')
                            ->label('Download PDF')
                            ->formatStateUsing(fn($state) => $state ? 'Click to download' : 'Not generated yet')
                            ->url(fn($record) => $record->pdf_path ? asset($record->pdf_path) : null, true),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // User Name
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                // Form Type
                TextColumn::make('form_type')
                    ->label('Form')
                    ->formatStateUsing(fn($state) => ucwords(str_replace('-', ' ', $state)))
                    ->badge()
                    ->color('info')
                    ->sortable(),

                // Status
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'completed',
                    ])
                    ->sortable(),

                // Current Step
                TextColumn::make('current_step')
                    ->label('Progress')
                    ->sortable(),

                // Created At
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                // PDF download link
                // TextColumn::make('pdf_path')
                //     ->label('PDF')
                //     ->formatStateUsing(fn($state) => $state ? 'Download' : 'Not generated yet')
                //     ->url(fn($record) => $record->pdf_path ? asset($record->pdf_path) : null, true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFormSubmissions::route('/'),
            'view' => Pages\ViewFormSubmission::route('/{record}'),
            // 'view'  => Pages\ViewFormSubmission::route('/{record}'),
        ];
    }
}
