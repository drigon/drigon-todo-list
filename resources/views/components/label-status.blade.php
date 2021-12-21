@props(['status'])

@php
$classes = match ($status) {
    'in_progress' => 'bg-green-300',
    'review' => 'bg-yellow-300',
    'open' => 'bg-gray-300',
    'closed' => 'bg-red-300',
    'todo' => 'bg-blue-300',
};

$statusName = [
    'in_progress' => 'In progress',
    'review' => 'Review',
    'open' => 'Open',
    'closed' => 'Closed',
    'todo' => 'Todo',
];
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $statusName[$status] }}
</button>
