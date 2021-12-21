<x-modal>
    <x-slot name="title">
        Change Status
    </x-slot>
    <x-slot name="content">
        <button wire:click="closeAndUpdateStatus('in_progress')" class="bg-green-300 text-white rounded-full h-6 px-3 mr-2">In progress</button>
        <button wire:click="closeAndUpdateStatus('review')" class="bg-yellow-300 text-white rounded-full h-6 px-3 mr-2">Review</button>
        <button wire:click="closeAndUpdateStatus('open')" class="bg-gray-300 text-white rounded-full h-6 px-3 mr-2">Open</button>
        <button wire:click="closeAndUpdateStatus('closed')" class="bg-red-300 text-white rounded-full h-6 px-3 mr-2">Closed</button>
        <button wire:click="closeAndUpdateStatus('todo')" class="bg-blue-300 text-white rounded-full h-6 px-3 mr-2">Todo</button>
    </x-slot>
    <x-slot name="buttons">
    </x-slot>
</x-modal>