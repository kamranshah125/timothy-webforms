<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\User;
use App\Models\FormSubmission;
// use Filament\Widgets\StatsOverviewWidget\Card;

class FormStats extends BaseWidget
{
      
    protected function getStats(): array
    {
        $totalUsers = User::where('is_admin', false)->count();
        $totalForms = FormSubmission::count();
        $completed  = FormSubmission::where('status', 'completed')->count();
        $drafts     = FormSubmission::where('status', 'draft')->count();

        return [
            Stat::make('Total Users', $totalUsers)
                ->description('Registered users filling forms')
                ->icon('heroicon-o-users')
                ->color('info'),

            Stat::make('Total Forms', $totalForms)
                ->description('All submissions')
                ->icon('heroicon-o-clipboard-document')
                ->color('gray'),

            Stat::make('Completed Forms', $completed)
                ->description('Finished forms')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('In Progress', $drafts)
                ->description('Still in progress')
                ->icon('heroicon-o-clock')
                ->color('warning'),
        ];
    }
}
