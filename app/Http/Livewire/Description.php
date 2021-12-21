<?php

namespace App\Http\Livewire;

use App\Models\TodoList;
use LivewireUI\Modal\ModalComponent;

class Description extends ModalComponent
{
    public $todo_id;
    public $description;

    public function mount($todo_id)
    {
        $this->todo_id = $todo_id;
        $this->description = TodoList::find($todo_id)->description;
    }

    public function render()
    {
        return view('livewire.description');
    }

    public function saveDescription()
    {
        $this->closeModalWithEvents([
            ToList::getName() => ['modalDescription', [['todo_id' => $this->todo_id, 'description' => $this->description]]
        ]]);
    }
}
