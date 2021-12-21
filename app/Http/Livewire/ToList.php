<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TodoList;

class ToList extends Component
{

    public $todos = [];
    public $newTask;
    public $currentStatus = '';

    public $listeners = [
        'modalStatus' => 'changeStatus',
        'modalDescription' => 'changeDescription',
    ];

    protected $rules = [
        'newTask' => 'required|min:3|max:60|unique:todo_lists,task',
    ];

    protected $messages = [
        'newTask.required' => 'Please enter a task. 😋',
        'newTask.min' => 'A task needs to be at least 3 letters long. 😉',
        'newTask.unique' => 'Opps! You have already added this task. 😅',
    ];

    public function render()
    { 
        $this->getTodos();
        return view('livewire.to-list');
    }

    public function addTask()
    {
        $this->validate();
        $option = new TodoList();
        $option->task = $this->newTask;
        $option->user_id = Auth::user()->id;
        $option->save();
        $this->newTask = '';
    }

    public function deleteTodo($todo_id)
    {
        $option = TodoList::find($todo_id);
        if($option){
            $option->delete();
        }
    }

    public function markAsCompleted($todo_id)
    {
        $option = TodoList::find($todo_id);
        $option->completed_at = ($option->completed_at == '')  ? now() : null;
        $option->save();
    }

    public function changeStatus($array)
    {
        $option = TodoList::find($array['todo_id']);
        $option->status = $array['status'];
        $option->save();
    }

    public function changeDescription($array)
    {
        $option = TodoList::find($array['todo_id']);
        $option->description = $array['description'];
        $option->save();
    }

    public function getTodos()
    {
        if($this->currentStatus != ''){
            $todos = TodoList::where('user_id', Auth::user()->id)->where('status', $this->currentStatus)->latest()->get();
        }else{
            $todos = TodoList::where('user_id', Auth::user()->id)->latest()->get();
        }
        $this->todos = $todos;
    }

}
