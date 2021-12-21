<label for="status">Filter</label>
<select id="status" wire:model="currentStatus" class="border border-gray-300 text-gray-600 h-10 pl-4 bg-white hover:border-gray-400 focus:outline-none appearance-none cursor-pointer w-full rounded-md">
    <option value="">All</option>
    <option value="in_progress">In progress</option>
    <option value="review">Review</option>
    <option value="open">Open</option>
    <option value="closed">Closed</option>
    <option value="todo">Todo</option>
</select>
