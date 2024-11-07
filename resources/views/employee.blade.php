@extends('layouts.app')

@section('title', 'Employees - ' . config('app.name'))

@section('description', 'Manage your employees here.')

@section('content')
<div class="p-[32px]">
    <div class="rounded-[8px] border" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }">
        <div class="flex justify-between items-center p-[16px] border-b" :class="{ 'border-neutral-700': isDark, 'border-neutral-200': !isDark }">
            <div class="flex flex-col gap-1">
                <h2 class="text-xl font-semibold m-0" :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">Employee</h2>
                <p class="text-sm opacity-50 m-0" :class="{ 'text-gray-300': isDark, 'text-neutral-700': !isDark }">Manage your employees here.</p>
            </div>
            <div class="flex gap-3">
                <form action="{{ route('employee.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center m-0">
                    @csrf
                    <input type="file" name="file" accept=".xls,.xlsx" class="hidden" id="importFile" onchange="this.form.submit()">
                    <label for="importFile" class="rounded-md px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                        'text-white hover:bg-neutral-800 active:bg-neutral-700': isDark, 
                        'text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark 
                    }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="text-current" fill="none">
                            <path d="M3 14L5.44721 18.8944C5.786 19.572 6.47852 20 7.23607 20H16.7639C17.5215 20 18.214 19.572 18.5528 18.8944L21 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.5 6.5L12 4L14.5 6.5M12 14V4.60878" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>   
                        Import
                    </label>
                </form>
                <div class="relative">
                    <button class="rounded-md border px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                        'bg-neutral-800 border-neutral-600 text-white hover:bg-neutral-700 active:bg-neutral-600': isDark, 
                        'bg-white border-neutral-300 text-neutral-900 hover:bg-neutral-100 active:bg-neutral-200': !isDark 
                    }" onclick="toggleExportDropdown(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="text-current" fill="none">
                            <path d="M9.5 12L12 14.5L14.5 12M12 4.5V13.8912" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20 16.5L19.7785 17.8288C19.6178 18.7932 18.7834 19.5 17.8057 19.5H6.19425C5.21658 19.5 4.3822 18.7932 4.22147 17.8288L4 16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Export
                    </button>
                    <div class="export-dropdown hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                        <div class="py-1" role="menu" aria-orientation="vertical">
                            <a href="{{ route('employee.export.pdf') }}" class="block px-4 py-2 text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                    <path d="M4 12.9978L4.01994 3.99557C4.02238 2.89186 4.91845 1.99877 6.02216 2L12.9958 2.00776L20 8.99481L19.9922 12.9978M13 2.49778V6.99778C13 8.10235 13.8954 8.99778 15 8.99778H19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M19.5 16.75C19.9142 16.75 20.25 16.4142 20.25 16C20.25 15.5858 19.9142 15.25 19.5 15.25V16.75ZM16 16V15.25C15.5858 15.25 15.25 15.5858 15.25 16H16ZM15.25 22C15.25 22.4142 15.5858 22.75 16 22.75C16.4142 22.75 16.75 22.4142 16.75 22H15.25ZM19 19.75C19.4142 19.75 19.75 19.4142 19.75 19C19.75 18.5858 19.4142 18.25 19 18.25V19.75ZM4 16V15.25C3.58579 15.25 3.25 15.5858 3.25 16H4ZM3.25 22C3.25 22.4142 3.58579 22.75 4 22.75C4.41421 22.75 4.75 22.4142 4.75 22H3.25ZM10 16V15.25C9.58579 15.25 9.25 15.5858 9.25 16H10ZM10 22H9.25C9.25 22.4142 9.58579 22.75 10 22.75V22ZM19.5 15.25H16V16.75H19.5V15.25ZM15.25 16V19H16.75V16H15.25ZM15.25 19V22H16.75V19H15.25ZM16 19.75H19V18.25H16V19.75ZM4 16.75H5.75V15.25H4V16.75ZM4.75 22V19.5H3.25V22H4.75ZM4.75 19.5V16H3.25V19.5H4.75ZM5.75 18.75H4V20.25H5.75V18.75ZM6.75 17.75C6.75 18.3023 6.30228 18.75 5.75 18.75V20.25C7.13071 20.25 8.25 19.1307 8.25 17.75H6.75ZM5.75 16.75C6.30228 16.75 6.75 17.1977 6.75 17.75H8.25C8.25 16.3693 7.13071 15.25 5.75 15.25V16.75ZM10 16.75H11.5V15.25H10V16.75ZM12.75 18V20H14.25V18H12.75ZM11.5 21.25H10V22.75H11.5V21.25ZM10.75 22V16H9.25V22H10.75ZM12.75 20C12.75 20.6904 12.1904 21.25 11.5 21.25V22.75C13.0188 22.75 14.25 21.5188 14.25 20H12.75ZM11.5 16.75C12.1904 16.75 12.75 17.3096 12.75 18H14.25C14.25 16.4812 13.0188 15.25 11.5 15.25V16.75Z" fill="currentColor" />
                                </svg>
                                Export as .pdf
                            </a>
                            <a href="{{ route('employee.export.xls') }}" class="block px-4 py-2 text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                    <path d="M20 16H17V19H20V22H17M4 16L6 19M6 19L8 22M6 19L8 16M6 19L4 22M14.5 22H11.5V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4 12.9978L4.01994 3.99557C4.02238 2.89186 4.91845 1.99877 6.02216 2L12.9958 2.00776L20 8.99481L19.9922 12.9978M13 2.49778V6.99778C13 8.10235 13.8954 8.99778 15 8.99778H19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Export as .xls
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('employee.create') }}" class="rounded-[6px] p-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">+ Add Employee</a>
            </div>
        </div>
        <div class="flex justify-between items-center p-[16px] border-b" :class="{ 'border-neutral-700': isDark, 'border-neutral-100': !isDark }">
            <div class="flex gap-2">
                <form method="GET" action="{{ route('employee') }}" class="flex gap-2 m-0">
                    <select name="status" class="border rounded-md" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }" onchange="this.form.submit()">
                        <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>All</option>
                        <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="Blocked" {{ request('status') == 'Blocked' ? 'selected' : '' }}>Blocked</option>
                    </select>
                    <select name="sort" class="border rounded-md" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }" onchange="this.form.submit()">
                        <option value="Latest" {{ request('sort') == 'Latest' ? 'selected' : '' }}>Latest</option>
                        <option value="Oldest" {{ request('sort') == 'Oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </form>
            </div>
            <div class="flex gap-2 items-center">
                <form method="GET" action="{{ route('employee') }}" class="flex gap-2 relative m-0">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="border h-[100%] rounded-md px-2 py-1 pr-8" :class="{ 'bg-neutral-700 border-neutral-600 text-white': isDark, 'bg-neutral-50 border-neutral-200 text-neutral-900': !isDark }">
                        @if(request('search'))
                            <span class="absolute right-2 top-1.5 bottom-auto cursor-pointer" onclick="resetSearch()">
                                &times;
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="rounded-md px-4 py-2" :class="{ 'bg-white border-neutral-700 text-neutral-900': isDark, 'bg-neutral-900 border-neutral-200 text-white': !isDark }">Filter</button>
                </form>
            </div>
        </div>
        <div>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">
                            <div x-data="{ isChecked: false, isDark: localStorage.getItem('theme') === 'dark' }">
                                <input type="checkbox" id="selectAll" @click="isChecked = !isChecked" 
                                       class="rounded-[3px] cursor-pointer border-none shadow-[0px_2px_2px_0px_rgba(27,28,29,0.12),0px_0px_0px_1.5px_#E5E7EB]" 
                                       :class="{ 'bg-neutral-800 border-neutral-600 hover:bg-neutral-700': isDark, 'bg-white hover:bg-neutral-500': !isDark }" 
                                       :checked="isChecked">
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Name
                                <button onclick="sortTable('name')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Role
                                <button onclick="sortTable('role')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Availability
                                <button onclick="sortTable('availability')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Location
                                <button onclick="sortTable('location')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Amount
                                <button onclick="sortTable('amount')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-2">
                                Status
                                <button onclick="sortTable('status')" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="{ 'text-neutral-400': isDark, 'text-neutral-600': !isDark }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th class="px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }" id="row-{{ $employee->id }}">
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <input type="checkbox" name="selected_employees[]" value="{{ $employee->id }}" onclick="toggleRowSelection(this, {{ $employee->id }})">
                        </td>
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="flex items-center gap-3">
                                @if($employee->photo)
                                <img src="{{ $employee->photo ? asset('storage/' . $employee->photo) : asset('img/misc/default-avatar.png') }}" alt="{{ $employee->first_name }}" class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-600 text-sm">{{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <span>{{ $employee->first_name }} {{ $employee->last_name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $employee->role }}</td>
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $employee->availability }}</td>
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $employee->city }}</td>
                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">${{ number_format($employee->amount, 2) }}</td>
                        <td class="px-4 py-3 bg-transparent w-1 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                $employee->status == 'Active' ? 'bg-green-100 text-green-800' : 
                                ($employee->status == 'Blocked' ? 'bg-red-100 text-red-800' : 
                                'bg-gray-100 text-gray-800') 
                            }}" :class="{
                                'bg-opacity-10': isDark
                            }">
                                <span class="mr-1.5 flex-shrink-0 w-1.5 h-1.5 rounded-full {{ 
                                    $employee->status == 'Active' ? 'bg-green-500' : 
                                    ($employee->status == 'Blocked' ? 'bg-red-500' : 
                                    'bg-gray-500') 
                                }}"></span>
                                {{ $employee->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 w-1 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                            <div class="relative">
                                <button onclick="toggleOptionsDropdown(event, {{ $employee->id }})" class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                        <path d="M11.9922 12H12.0012" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.992 12H18.001" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div id="options-dropdown-{{ $employee->id }}" class="options-dropdown hidden absolute right-0 mt-3 p-[6px] w-32 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                                    <a href="{{ route('employee.show', $employee->id) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M22 14C22 13.6845 21.848 13.4713 21.544 13.045C20.1779 11.1294 16.6892 7 12 7C7.31078 7 3.8221 11.1294 2.45604 13.045C2.15201 13.4713 2 13.6845 2 14C2 14.3155 2.15201 14.5287 2.45604 14.955C3.8221 16.8706 7.31078 21 12 21C16.6892 21 20.1779 16.8706 21.544 14.955C21.848 14.5287 22 14.3155 22 14ZM12 11C13.6569 11 15 12.3431 15 14C15 15.6569 13.6569 17 12 17C10.3431 17 9 15.6569 9 14C9 12.3431 10.3431 11 12 11Z" fill="currentColor" />
                                            <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('employee.edit', $employee->id) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                            <path opacity="0.4" d="M3.26538 21.9613L3.54536 21.9686C5.6032 22.0224 6.63212 22.0493 7.56806 21.6837C8.504 21.3182 9.25287 20.5969 10.7506 19.1543L10.7506 19.1543L19.655 10.5779L13.5 4.5L4.78943 13.9445C3.57944 15.2555 2.97444 15.9109 2.62371 16.7182C2.27297 17.5255 2.20301 18.4235 2.06308 20.2197L2.03608 20.5662C1.98636 21.2043 1.9615 21.5234 2.14359 21.73C2.32567 21.9367 2.63891 21.9449 3.26538 21.9613Z" fill="currentColor" />
                                            <path d="M14.0737 3.88545C14.8189 3.07808 15.1915 2.6744 15.5874 2.43893C16.5427 1.87076 17.7191 1.85309 18.6904 2.39232C19.0929 2.6158 19.4769 3.00812 20.245 3.79276C21.0131 4.5774 21.3972 4.96972 21.6159 5.38093C22.1438 6.37312 22.1265 7.57479 21.5703 8.5507C21.3398 8.95516 20.9446 9.33578 20.1543 10.097L10.7506 19.1543C9.25288 20.5969 8.504 21.3182 7.56806 21.6837C6.63212 22.0493 5.6032 22.0224 3.54536 21.9686L3.26538 21.9613C2.63891 21.9449 2.32567 21.9367 2.14359 21.73C1.9615 21.5234 1.98636 21.2043 2.03608 20.5662L2.06308 20.2197C2.20301 18.4235 2.27297 17.5255 2.62371 16.7182C2.97444 15.9109 3.57944 15.2555 4.78943 13.9445L14.0737 3.88545Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                            <path d="M13 4L20 11" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                            <path d="M14 22L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Edit
                                    </a>
                                    <div class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700" style="margin-block: 2px;"></div>
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="block mb-0" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2 text-red-500" :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-red-50': !isDark }">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                                <path opacity="0.4" d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5H19.5Z" fill="currentColor" />
                                                <path d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M21 5.5H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M16.0575 5.5L15.3748 4.09173C14.9213 3.15626 14.6946 2.68852 14.3035 2.39681C14.2167 2.3321 14.1249 2.27454 14.0288 2.2247C13.5957 2 13.0759 2 12.0363 2C10.9706 2 10.4377 2 9.99745 2.23412C9.89986 2.28601 9.80675 2.3459 9.71906 2.41317C9.3234 2.7167 9.10239 3.20155 8.66037 4.17126L8.05469 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4 flex text-sm items-center">
                <div class="w-1/3">
                    <span :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">
                        Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} results
                    </span>
                </div>

                <div class="w-1/3 flex justify-center">
                    {{ $employees->appends(request()->except('page'))->links('vendor.pagination.tailwind') }}
                </div>

                <div class="w-1/3 flex justify-end">
                    <form method="GET" action="{{ route('employee') }}" class="flex items-center mb-0">
                        @foreach(request()->except(['per_page', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <select name="per_page" class="border rounded-md text-sm py-1" :class="{ 'bg-neutral-800 border-neutral-700 text-white hover:bg-neutral-700': isDark, 'bg-white border-neutral-200 text-neutral-900 hover:bg-neutral-50': !isDark }" onchange="this.form.submit()">
                            <option value="9" {{ request('per_page', 12) == 9 ? 'selected' : '' }}>9</option>
                            <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                            <option value="24" {{ request('per_page', 12) == 24 ? 'selected' : '' }}>24</option>
                            <option value="50" {{ request('per_page', 12) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 12) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function toggleRowSelection(checkbox, id) {
        const row = document.getElementById(`row-${id}`);
        if (checkbox.checked) {
            row.classList.add('dark:bg-neutral-700', 'bg-neutral-100');
        } else {
            row.classList.remove('dark:bg-neutral-700', 'bg-neutral-100');
        }
    }

    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('input[name="selected_employees[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
            toggleRowSelection(checkbox, checkbox.value);
        });
    }

    function resetSearch() {
        const searchInput = document.querySelector('input[name="search"]');
        searchInput.value = '';
        searchInput.form.submit();
    }

    function toggleExportDropdown(event) {
        event.stopPropagation();
        let dropdown = event.currentTarget.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }

    function sortTable(column) {
        let currentUrl = new URL(window.location.href);
        let searchParams = currentUrl.searchParams;
        
        // Get current sort direction
        let currentSort = searchParams.get('sort_' + column);
        let newSort = currentSort === 'asc' ? 'desc' : 'asc';
        
        // Update sort parameter
        searchParams.set('sort_' + column, newSort);
        
        // Redirect with new sort parameter
        window.location.href = currentUrl.toString();
    }

    function toggleOptionsDropdown(event, id) {
        event.stopPropagation();
        
        // Close all other dropdowns
        const dropdowns = document.querySelectorAll('.options-dropdown');
        dropdowns.forEach(dropdown => {
            if (dropdown.id !== `options-dropdown-${id}`) {
                dropdown.classList.add('hidden');
            }
        });

        // Toggle the clicked dropdown
        const dropdown = document.getElementById(`options-dropdown-${id}`);
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const dropdowns = document.querySelectorAll('.options-dropdown');
        dropdowns.forEach(dropdown => {
            if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                this.blur(); // Remove focus immediately after click
            });
        });
    });
</script>

<style>
    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        background-color: transparent;
        width: 16px;
        height: 16px;
        cursor: pointer;
        border-radius: 3px;
        transition: background-color 0.2s, box-shadow 0.2s;
        position: relative;
    }

    /* Light mode styles */
    :root:not(.dark) input[type="checkbox"] {
        border: 1px solid #E5E7EB;
        box-shadow: 0px 2px 2px 0px rgba(27,28,29,0.12), 0px 0px 0px 1.5px #E5E7EB;
    }

    :root:not(.dark) input[type="checkbox"]:hover {
        background-color: #F3F4F6;
    }

    :root:not(.dark) input[type="checkbox"]:checked {
        background-color: #1f2937;
        box-shadow: none;
    }

    :root:not(.dark) input[type="checkbox"]:checked::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 2px;
        width: 5px;
        height: 9px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    :root:not(.dark) input[type="checkbox"]:focus {
        outline: none;
        box-shadow: 0 0 0 2px #1f2937;
    }

    /* Dark mode styles */
    .dark input[type="checkbox"] {
        box-shadow: 0px 0px 0px 2px #4B5563;
    }

    .dark input[type="checkbox"]:hover {
        background-color: #374151;
    }

    .dark input[type="checkbox"]:checked {
        background-color: #ffffff;
        box-shadow: none;
    }

    .dark input[type="checkbox"]:checked::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 2px;
        width: 5px;
        height: 9px;
        border: solid black;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .dark input[type="checkbox"]:focus {
        outline: none;
        box-shadow: 0 0 0 2px #ffffff;
    }

    input[type="checkbox"]:checked:hover {
        opacity: 0.9;
    }

    input[type="checkbox"]:checked:focus {
        opacity: 0.9;
    }
</style>
