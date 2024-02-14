<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Models\Comment;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CommentStatswidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Comments',Comment::count())
        ];
    }
}
