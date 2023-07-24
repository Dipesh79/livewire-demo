<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contact;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ContactList extends DataTableComponent
{
    protected $model = Contact::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->hideIf(true),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Message", "message")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([

                    LinkColumn::make("Delete")
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => "#")
                        ->attributes(fn ($row) => [
                            'class' => 'btn btn-danger',
                            'alt' => "Delete " . $row->id,
                            'wire:click' => '$emitTo(\'home\', \'deletePrompt\', \'' .  $row->id . '\')',
                            'data-bs-toggle' => 'modal',
                            'data-bs-target' => '#deletePrompt'
                        ]),
                ]),
        ];
    }
}
