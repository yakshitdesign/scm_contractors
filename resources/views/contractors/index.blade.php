@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-[8px] border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
        <div class="flex justify-between items-center p-[16px] border-b border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-col gap-1">
                <h2 class="text-xl font-semibold m-0 text-neutral-900 dark:text-white">Contractors</h2>
                <p class="text-sm opacity-50 m-0 text-neutral-700 dark:text-gray-300">Manage your contractors here.</p>
            </div>
            <div class="flex gap-2">
                <!-- Icon buttons for view toggle -->
                <button id="gridViewButton" class="rounded-md border px-[10px] py-[8px] transition-colors duration-200 active:scale-95" :class="{ 
                    'bg-neutral-900 border-neutral-900 text-white hover:bg-neutral-700': isGridView, 
                    'bg-white border-neutral-300 text-neutral-900 hover:bg-neutral-200': !isGridView
                }" onclick="toggleView('grid')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                        <path d="M10 4V9C10 9.55228 9.55228 10 9 10H4C3.44772 10 3 9.55228 3 9V4C3 3.44772 3.44772 3 4 3H9C9.55228 3 10 3.44772 10 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        <path d="M21 4V9C21 9.55228 20.5523 10 20 10H15C14.4477 10 14 9.55228 14 9V4C14 3.44772 14.4477 3 15 3H20C20.5523 3 21 3.44772 21 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        <path d="M21 15V20C21 20.5523 20.5523 21 20 21H15C14.4477 21 14 20.5523 14 20V15C14 14.4477 14.4477 14 15 14H20C20.5523 14 21 14.4477 21 15Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        <path d="M10 15V20C10 20.5523 9.55228 21 9 21H4C3.44772 21 3 20.5523 3 20V15C3 14.4477 3.44772 14 4 14H9C9.55228 14 10 14.4477 10 15Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                </button>
                <button id="listViewButton" class="rounded-md border px-[10px] py-[8px] transition-colors duration-200 active:scale-95" :class="{ 
                    'bg-neutral-900 border-neutral-900 text-white hover:bg-neutral-700': !isGridView, 
                    'bg-white border-neutral-300 text-neutral-900 hover:bg-neutral-200': isGridView
                }" onclick="toggleView('list')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current" fill="none">
                        <path d="M4 5L20 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 19L20 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <!-- Add Contractor button -->
                <a href="{{ route('contractors.create') }}" class="rounded-[6px] p-[10px] transition-colors duration-200 active:scale-95 bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-200 dark:active:bg-neutral-300">+ Add Contractor</a>
            </div>
        </div>

        <!-- Grid View -->
        <div id="grid-view" class="grid grid-cols-1 md:grid-cols-3 gap-[20px] p-[20px]">
            @foreach($contractors as $contractor)
            <div class="rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white p-[16px]">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('storage/' . $contractor->logo) }}" alt="{{ $contractor->name }}" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h3 class="text-lg font-medium">{{ $contractor->name }}</h3>
                        <p class="text-sm opacity-50">{{ $contractor->address }}, {{ $contractor->city }}, {{ $contractor->state }} {{ $contractor->zip }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                            $contractor->status == 'Active' ? 'bg-green-100 text-green-800' : 
                            ($contractor->status == 'Blocked' ? 'bg-red-100 text-red-800' : 
                            'bg-gray-100 text-gray-800') 
                        }}">
                            {{ $contractor->status }}
                        </span>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <div class="relative">
                        <button onclick="toggleOptionsDropdown(event, {{ $contractor->id }})" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                <path d="M11.9922 12H12.0012" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.992 12H18.001" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div id="options-dropdown-{{ $contractor->id }}" class="options-dropdown hidden absolute right-0 mt-3 p-[6px] w-32 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                            <a href="{{ route('contractors.show', $contractor) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                    <!-- SVG path for view icon -->
                                </svg>
                                View
                            </a>
                            <a href="{{ route('contractors.edit', $contractor) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                    <!-- SVG path for edit icon -->
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('contractors.destroy', $contractor) }}" method="POST" class="block mb-0" onsubmit="return confirm('Are you sure you want to delete this contractor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2 text-red-500" :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-red-50': !isDark }">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                        <!-- SVG path for delete icon -->
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- List View -->
        <div id="list-view" class="hidden p-[20px]">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left bg-neutral-50 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-100 border-neutral-100 dark:border-neutral-700">Logo</th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left bg-neutral-50 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-100 border-neutral-100 dark:border-neutral-700">Name</th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left bg-neutral-50 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-100 border-neutral-100 dark:border-neutral-700">Address</th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left bg-neutral-50 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-100 border-neutral-100 dark:border-neutral-700">Status</th>
                        <th class="px-4 py-2 border-b text-sm font-medium text-left bg-neutral-50 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-100 border-neutral-100 dark:border-neutral-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contractors as $contractor)
                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700 text-neutral-900 dark:text-white">
                        <td class="px-4 py-3 border-b border-r bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border-neutral-100 dark:border-neutral-700">
                            <img src="{{ asset('storage/' . $contractor->logo) }}" alt="{{ $contractor->name }}" class="w-8 h-8 rounded-full object-cover">
                        </td>
                        <td class="px-4 py-3 border-b border-r bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border-neutral-100 dark:border-neutral-700">{{ $contractor->name }}</td>
                        <td class="px-4 py-3 border-b border-r bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border-neutral-100 dark:border-neutral-700">{{ $contractor->address }}, {{ $contractor->city }}, {{ $contractor->state }} {{ $contractor->zip }}</td>
                        <td class="px-4 py-3 border-b border-r bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border-neutral-100 dark:border-neutral-700">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                $contractor->status == 'Active' ? 'bg-green-100 text-green-800' : 
                                ($contractor->status == 'Blocked' ? 'bg-red-100 text-red-800' : 
                                'bg-gray-100 text-gray-800') 
                            }}">
                                {{ $contractor->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border-b bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border-neutral-100 dark:border-neutral-700">
                            <div class="relative">
                                <button onclick="toggleOptionsDropdown(event, {{ $contractor->id }})" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                        <path d="M11.9922 12H12.0012" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.992 12H18.001" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div id="options-dropdown-{{ $contractor->id }}" class="options-dropdown hidden absolute right-0 mt-3 p-[6px] w-32 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                                    <a href="{{ route('contractors.show', $contractor) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                            <!-- SVG path for view icon -->
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('contractors.edit', $contractor) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                            <!-- SVG path for edit icon -->
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('contractors.destroy', $contractor) }}" method="POST" class="block mb-0" onsubmit="return confirm('Are you sure you want to delete this contractor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2 text-red-500" :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-red-50': !isDark }">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                                <!-- SVG path for delete icon -->
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let isGridView = true;

    function toggleView(view) {
        isGridView = view === 'grid';
        document.getElementById('grid-view').classList.toggle('hidden', !isGridView);
        document.getElementById('list-view').classList.toggle('hidden', isGridView);
        updateButtonStyles();
    }

    function updateButtonStyles() {
        const gridViewButton = document.getElementById('gridViewButton');
        const listViewButton = document.getElementById('listViewButton');

        if (isGridView) {
            gridViewButton.classList.add('bg-neutral-900', 'border-neutral-900', 'text-white');
            gridViewButton.classList.remove('bg-white', 'border-neutral-300', 'text-neutral-900');
            listViewButton.classList.remove('bg-neutral-900', 'border-neutral-900', 'text-white');
            listViewButton.classList.add('bg-white', 'border-neutral-300', 'text-neutral-900');
        } else {
            listViewButton.classList.add('bg-neutral-900', 'border-neutral-900', 'text-white');
            listViewButton.classList.remove('bg-white', 'border-neutral-300', 'text-neutral-900');
            gridViewButton.classList.remove('bg-neutral-900', 'border-neutral-900', 'text-white');
            gridViewButton.classList.add('bg-white', 'border-neutral-300', 'text-neutral-900');
        }
    }

    function toggleOptionsDropdown(event, id) {
        event.stopPropagation();
        const dropdown = document.getElementById(`options-dropdown-${id}`);
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateButtonStyles();
    });

    document.addEventListener('click', function() {
        document.querySelectorAll('.options-dropdown').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    });
</script>
@endsection
