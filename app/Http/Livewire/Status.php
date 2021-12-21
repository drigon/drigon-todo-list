<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class Status extends ModalComponent
{

    public $todo_id;

    public function mount($todo_id)
    {
        $this->todo_id = $todo_id;
    }

    public function render()
    {
        return view('livewire.status');
    }

    public function closeAndUpdateStatus($status)
    {
        $this->closeModalWithEvents([
            ToList::getName() => ['modalStatus', [['todo_id' => $this->todo_id, 'status' => $status]]
        ]]);
    }
}
