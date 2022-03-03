<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TodoCheckbox extends Component
{

    public $done;
    public $todo;

    public function mount( $todo )
    {
        $this->done = $todo->done;
        $this->todo = $todo;

    }

    public function render()
    {
        return view('livewire.admin.todo-checkbox', [
            'todo' => $this->todo,
            'done' => $this->done
        ]);
    }
}
