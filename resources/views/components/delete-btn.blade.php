@props(['id'])

<button title="Remove" wire:click="deleteTodo({{$id}})">
  <svg class=" w-5 h-5 text-gray-600 fill-current" fill="none" stroke-linecap="round"
      stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
      <path d="M6 18L18 6M6 6l12 12"></path>
  </svg>
</button>