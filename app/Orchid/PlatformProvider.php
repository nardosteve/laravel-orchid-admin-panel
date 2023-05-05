<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Dashboard')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(fn () => 6),

            //Access rights
            Menu::make('Users')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title('Access rights'),

            Menu::make('Authorization')
                ->icon('code')
                ->list([
                    Menu::make('Roles')->icon('lock')->route('platform.systems.roles')->permission('platform.systems.roles'),
                    Menu::make('Permissions')->icon('options'),
                ]),
            // Menu::make('Roles')
            //     ->icon('lock')
            //     ->route('platform.systems.roles')
            //     ->permission('platform.systems.roles'),

            // Menu::make('Permissions')
            //     ->icon('options')
            //     ->route('platform.systems.roles')
            //     ->permission('platform.systems.roles'),
             //Access rights

            //Content Creation
            Menu::make('Blogs')->icon('book-open')->route('platform.example.charts')->title('Content')->divider(),
            //Content Creatioon

            // Menu::make(__('Blogs'))
            //     ->icon('book-open')
            //     ->route('platform.systems.roles')
            //     ->permission('platform.systems.roles'),

            // Menu::make('Blogs')
            //     ->title('Manage Blogs')
            //     ->icon('book-open')
            //     ->route('platform.example.layouts'),

            Menu::make('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            Menu::make('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            Menu::make('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            Menu::make('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            Menu::make('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
