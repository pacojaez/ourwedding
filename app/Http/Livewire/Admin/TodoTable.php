<?php

namespace App\Http\Livewire\Admin;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class TodoTable extends Component
{
    public ?Collection $todos;

    // public bool $done;

    /**
     * a single todo
     *
     * @var
     */
    public Todo $todo;

    /**
     * A variable needed to show the modal and add a todo
     *
     * @var boolean
     */
    public bool $confirmingTodoAdd = false;

    /**
     * counts the number of tasks not doing yet
     *
     * @var integer|null
     */
    public ?int $count;

    /**
     * Rules for validate the todo form for a new Presupuesto
     *
     * @var array
     */
    protected $rules = [
        'todo.title' => 'required|string|min:4|unique:todos,title',
        'todo.description' => 'nullable',
        'todo.priority' => 'nullable',
        'todo.done' => 'nullable',
    ];

    public function mount()
    {
        $this->todo = new Todo();

    }

    public function render()
    {
        $this->todos = Todo::all();
        $this->count = Todo::where('done', false)->count();

        return view('livewire.admin.todo-table', [
            'todos' => $this->todos,
            'count' => $this->count
        ]);
    }

    /**
     * Shows the modal for adding a new presupuesto
     *
     * @return void
     */
    public function confirmTodoAdd()
    {
        $this->confirmingTodoAdd = true;
    }

    /**
     * Confirm the modal to edit a presupuesto
     */

    public function confirmTodoEdit( Todo $todo )
    {
        $this->resetErrorBag();
        $this->todo = $todo;
        $this->confirmingTodoAdd = true;
    }

    public function saveTodo ()
    {
        if( isset( $this->todo->id)) {

            $this->rules['todo.title'] = 'string|min:4';

            $this->validate();

            $this->todo->save();

            $this->count = Todo::where('done', false)->count();
            session()->flash('message', 'Tarea modificada correctamente');

            $this->rules['todo.title'] = 'required|string|min:4|unique:todos,title';

        } else {

            $this->validate();

            $todo = new Todo();
            $todo->title = $this->todo['title'];
            $todo->description = $this->todo['description'];
            $todo->done = $this->todo['done'] ? 1 : 0;
            $todo->priority = $this->todo['priority'];

            if($todo->save()){
                session()->flash('message', 'Tarea añadida correctamente');
            }else{
                session()->flash('message', 'No se pudo añadir la tarea');
            }

            $this->count = Todo::where('done', false)->count();
        }

        $this->confirmingTodoAdd = false;

        return redirect(request()->header('Referer'));
    }
}
