<?php

namespace App\Orchid\Layouts\Blog;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;


class BlogEditLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = '';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            Input::make('blog.title')
            ->type('text')
            ->max(255)
            ->required()
            ->title(__('title'))
            ->placeholder(__('Title'))
            ->help(__('Title')),

        DropDown::make()
            ->icon('options-vertical')
            ->list([
                Link::make(__('Edit'))
                    ->route('platform.users.edit')
                    ->icon('pencil'),
                Button::make(__('Delete'))
                    ->method('remove')
                    ->icon('trash')
                    ->confirm(__('Are you sure you want to delete the user?'))
                    ->parameters(),
            ]),

        Input::make('role.slug')
            ->type('text')
            ->max(255)
            ->required()
            ->title(__('Slug'))
            ->placeholder(__('Slug'))
            ->help(__('Actual name in the system')),
        ];
    }
}
