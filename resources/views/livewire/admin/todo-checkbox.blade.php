<div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
    HECHO
    <div class="text-grey-darker mt-2 ml-2 flex justify-between items-start">
        <span class="text-xs flex items-center">
            <div>
                <input type="checkbox" id="{{ $todo->id }}" name="{{ $todo->title }}" value="{{ $todo->done }}" wire:model="done"/> DONE
              </div>
        </span>
    </div>
</div>
