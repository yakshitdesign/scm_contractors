@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <h2 class="text-xl font-semibold mb-4">Notifications</h2>
    <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-md p-4">
        @foreach($notifications as $notification)
            <div class="border-b border-neutral-200 dark:border-neutral-700 py-2">
                <p class="text-sm text-neutral-700 dark:text-neutral-300">{{ $notification->message }}</p>
                <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $notification->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
