<x-modal>
    <x-slot name="title">
        Description
    </x-slot>
    <x-slot name="content">
    <div class="flex">
        <textarea class="w-full rounded-md" wire:model="description" cols="30" rows="10"></textarea>
    </div>
    </x-slot>
    <x-slot name="buttons">
        <button wire:click="saveDescription()" class="bg-green-400 hover:bg-green-500 text-white rounded-md px-3 py-2">Save</button>     
    </x-slot>
</x-modal>