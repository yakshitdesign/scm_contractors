@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="flex p-[12px] justify-between items-center mb-4 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
        <h1 class="text-xl font-semibold">{{ $contractor->name }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('contractors.edit', $contractor) }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Edit</a>
            <form action="{{ route('contractors.destroy', $contractor) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this contractor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95 text-red-500" :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-red-50': !isDark }">Delete</button>
            </form>
            <a href="{{ route('contractors.index') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Back to List</a>
        </div>
    </div>

    <div class="rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white p-[20px]">
        <div class="flex items-center gap-4 mb-4">
            <img src="{{ asset('storage/' . $contractor->logo) }}" alt="{{ $contractor->name }}" class="w-24 h-24 rounded-full object-cover">
            <div>
                <p class="text-sm"><strong>Phone:</strong> {{ $contractor->phone }}</p>
                <p class="text-sm"><strong>Address:</strong> {{ $contractor->address }}, {{ $contractor->city }}, {{ $contractor->state }} {{ $contractor->zip }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
