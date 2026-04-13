<?php

namespace App\Filament\Admin\Resources\Pakets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

class PaketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section 1 - Pricing
                Section::make("Pricing")
                    ->description("Set the pricing details for this package")
                    ->icon('heroicon-o-currency-dollar')
                    ->columnSpan(2)
                    ->schema([
                        Group::make([
                            TextInput::make("price")
                                ->required()
                                ->numeric()
                                ->prefix('Rp')
                                ->maxValue(9999999999999.99)
                                ->step(0.01),
                            TextInput::make("fee")
                                ->required()
                                ->numeric()
                                ->prefix('Rp')
                                ->maxValue(9999999999999.99)
                                ->step(0.01),
                        ])->columns(2),
                    ]),

                // Section 2 - Additional
                Section::make("Additional")
                    ->description("Set additional information for this package")
                    ->icon('heroicon-o-cog')
                    ->columnSpan(1)
                    ->schema([
                        Group::make([
                            TextInput::make("point")
                                ->required()
                                ->numeric()
                                ->integer()
                                ->default(0)
                                ->minValue(0),
                            Toggle::make("most_popular")
                                ->label("Most Popular")
                                ->required()
                                ->inline(false)
                                ->default(false),
                        ])->columns(2),
                    ]),

                // Section 3 - Description
                Section::make("Description")
                    ->description("Provide a description for this package")
                    ->icon('heroicon-o-document-text')
                    ->columnSpan(3)
                    ->schema([
                        Textarea::make("desc")
                            ->label("Description")
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ])->columns(3);
    }
}
