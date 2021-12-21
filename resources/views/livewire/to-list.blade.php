<div class="bg-gray-100 text-gray-800 flex justify-center pb-20">
    <!-- todo container -->
    <div class="container px-3 max-w-md mx-auto mt-10">
        <!-- todo wrapper -->
        <div class="bg-white rounded shadow px-4 py-4">
            <div class="title font-bold text-lg">Todo List Application</div>
            <div class="relative mt-4 mb-2" x-data="{ 
            count: 0,
            clear() {
              this.count = 0;
              $refs.countme.value = '';
              $wire.newTask = '';
            }
          }"> <button style="display: none;" x-show="count" title="clear" x-on:click="clear"
                    class="absolute left-0 top-0 mt-2 ml-1">
                    <svg class="w-6 h-6 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <input wire:model="newTask" wire:keydown.enter="addTask" type="text"
                    placeholder="What do you need to get done today?" maxlength="60"
                    class="w-full bg-white h-10 pl-7 pr-10 rounded-md text-sm focus:outline-none" x-ref="countme"
                    x-on:keyup="count = $refs.countme.value.length">
                <button title="Add New Task" wire:click="addTask" class="absolute right-0 top-0 mt-2 mr-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
                <div class="text-sm mt-2 flex justify-between">
                    <div>
                        @error('newTask') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
                    </div>
                </div>
            </div>
            <!-- todo list -->
            <div class="mb-6">
                <x-select-filter />
            </div>

            <ul class="todo-list mt-4">
                @forelse ($todos as $todo)
                <li class="flex justify-between items-center mt-3 border-b pb-2">
                    <div class="flex items-center">
                        <input type="checkbox" title="Mark as completed" wire:click="markAsCompleted({{$todo->id}})"
                            @if($todo->completed_at != '') checked @endif>
                        <div class="capitalize break-all cursor-pointer ml-3 mr-2 text-sm font-semibold @if($todo->completed_at != '') line-through @endif"
                            onclick="Livewire.emit('openModal', 'description', {{ json_encode(['todo_id' => $todo->id]) }})">
                            {{ $todo->task }} @if($todo->description != '') <button
                                class="text-xs ml-2 text-gray-600 hover:text-blue-400">[See More]</button> @endif
                        </div>
                    </div>
                    <div class="flex">
                        <x-label-status
                            onclick="Livewire.emit('openModal', 'status', {{ json_encode(['todo_id' => $todo->id]) }})"
                            :status="$todo->status" class="text-white rounded-full py-1 px-2 text-xs mr-2" />

                        <x-delete-btn :id="$todo->id" />
                    </div>
                </li>
                @empty
                <li class="text-center text-gray-600 text-sm">You don't have any task for now. 😊</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
