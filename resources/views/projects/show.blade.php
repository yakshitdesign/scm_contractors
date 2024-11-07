@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="flex flex-col gap-[20px]">
        <div class="flex flex-col rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
            <div class="flex justify-between items-center p-[20px] gap-[12px] border-b border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col gap-[8px]">
                    <span class="text-sm text-neutral-500"><a href="{{ route('projects.index') }}" class="hover:text-neutral-700 dark:hover:text-neutral-300">Project</a>/{{ $project->name }}</span>
                    <h1 class="text-3xl font-medium">{{ $project->name }}</h1>
                </div>
                <a href="{{ route('projects.edit', $project->id) }}" class="rounded-md px-[12px] py-[10px] border transition-colors duration-200 flex items-center gap-1.5" :class="{
                    'bg-white border-neutral-200 text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark,
                    'bg-neutral-800 border-neutral-700 text-white hover:bg-neutral-700 active:bg-neutral-600': isDark
                }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="text-current" fill="none">
                    <path d="M15.7071 5.29289L17.5 3.5C17.8905 3.10948 18.5237 3.10948 18.9142 3.5L20.5 5.08579C20.8905 5.47631 20.8905 6.10947 20.5 6.5L18.7071 8.29289M15.7071 5.29289L9.59886 11.4012C9.34255 11.6575 9.16071 11.9787 9.07279 12.3303L8.20715 15.7929L11.6697 14.9272C12.0214 14.8393 12.3425 14.6575 12.5989 14.4012L18.7071 8.29289M15.7071 5.29289L18.7071 8.29289" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M10.7071 4.79289H5.20715C4.10258 4.79289 3.20715 5.68832 3.20715 6.79289V18.7929C3.20715 19.8975 4.10258 20.7929 5.20715 20.7929H17.2071C18.3117 20.7929 19.2071 19.8975 19.2071 18.7929V13.2929" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                    Edit
                </a>
            </div>
            <div class="flex flex-col gap-[20px] px-[20px] pt-[20px] mb-[-1px]">
                <div class="border-b border-neutral-200 dark:border-neutral-700">
                    <nav class="flex gap-[32px]">
                        <a href="#home" class="tab-link active border-b-2 border-neutral-900 dark:border-white pb-[12px] px-[4px] text-neutral-900 dark:text-white">
                            Home
                        </a>
                        <a href="#transactions" class="tab-link border-b-2 border-transparent pb-[12px] px-[4px] text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition-colors duration-200">
                            Transactions
                        </a>
                        <a href="#calendar" class="tab-link border-b-2 border-transparent pb-[12px] px-[4px] text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition-colors duration-200">
                            Calendar
                        </a>
                        <a href="#logs" class="tab-link border-b-2 border-transparent pb-[12px] px-[4px] text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition-colors duration-200">
                            Logs
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Home Tab -->
        <div id="home" class="tab-content flex flex-col gap-[20px]">
            <!-- Project Details -->
            <div class="grid grid-cols-4 gap-[20px]">
                <div class="flex flex-col gap-[10px] p-[20px] space-y-[8px] rounded-lg border bg-neutral-900 dark:bg-white border-neutral-600 dark:border-neutral-200 text-white dark:text-neutral-900">
                    <div class="flex flex-col gap-[10px]">
                        <div class="flex justify-between items-center gap-[8px]">
                            <h2 class="text-md font-normal text-white dark:text-neutral-900">Project Status</h2>
                            <span class="text-md text-white dark:text-neutral-900">80%</span>
                        </div>
                        <div class="w-full bg-neutral-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->progress ?? 0 }}%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-[8px]">
                        <p class="text-sm font-normal text-white dark:text-neutral-900">Due Date</p>
                        <span class="text-sm text-white dark:text-neutral-900">{{ $project->due_date ? $project->due_date->format('F j, Y') : 'N/A' }}</span>
                    </div>
                </div>
                <div class="flex flex-col justify-between gap-[8px] p-[20px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <h2 class="text-lg font-normal text-neutral-500 dark:text-neutral-400">Budget</h2>
                    <p class="text-3xl font-medium text-neutral-900 dark:text-white">${{ number_format($project->budget ?? 0, 2) }}</p>
                </div>
                <div class="flex flex-col justify-between gap-[8px] p-[20px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <h2 class="text-lg font-normal text-neutral-500 dark:text-neutral-400">Recorded Expenses</h2>
                    <p class="text-3xl font-medium text-neutral-900 dark:text-white">${{ number_format($project->recorded_expenses ?? 0, 2) }}</p>
                </div>
                <div class="flex flex-col justify-between gap-[8px] p-[20px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <h2 class="text-lg font-normal text-neutral-500 dark:text-neutral-400">Outstanding Invoices</h2>
                    <p class="text-3xl font-medium text-neutral-900 dark:text-white">${{ number_format($project->outstanding_invoices ?? 0, 2) }}</p>
                </div>
            </div>

            <!-- Project Profile -->
            <div class="grid grid-cols-3 gap-[20px]">
                <div class="col-span-1">
                    <div class="flex flex-col gap-[12px] h-full">
                        <div class="flex flex-col p-[4px] h-full rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                            <div class="top-profile-card">
                                <div class="flex=grow w-full rounded-[4px] overflow-hidden">
                                    <img src="{{ asset('img/covers/cover-1.png') }}" alt="Cover Image" class="w-full h-full object-cover">
                                </div>
                                <div class="flex justify-between items-end px-[16px]" style="margin-top: -24px;">
                                    <img src="{{ $project->contractor->logo ? asset('storage/' . $project->contractor->logo) : asset('img/misc/company-avatar.png') }}" alt="{{ $project->contractor->name }}" class="w-20 h-20 rounded-full object-cover">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="rounded-md px-2 py-1 border transition-colors duration-200 flex items-center gap-1.5" :class="{
                                        'bg-white border-neutral-200 text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark,
                                        'bg-neutral-800 border-neutral-700 text-white hover:bg-neutral-700 active:bg-neutral-600': isDark
                                    }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                            <path d="M14 7L5.39171 15.6083C5.1354 15.8646 4.95356 16.1858 4.86564 16.5374L4 20L7.46257 19.1344C7.81424 19.0464 8.1354 18.8646 8.39171 18.6083L17 10M14 7L16.2929 4.70711C16.6834 4.31658 17.3166 4.31658 17.7071 4.70711L19.2929 6.29289C19.6834 6.68342 19.6834 7.31658 19.2929 7.70711L17 10M14 7L17 10" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                            <path d="M11.5 20H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Edit
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-col p-[16px] gap-[8px]">
                                <div class="space-y-1">
                                    <h2 class="text-[24px] font-medium">{{ $project->contractor->name }}</h2>
                                    <div class="text-md text-neutral-500 dark:text-neutral-400">{{ $project->contractor->address }}, {{ $project->contractor->city }}, {{ $project->contractor->state }} {{ $project->contractor->zip }}</div>
                                </div>
                                <div class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700"></div>
                                <div class="flex flex-col gap-[16px]">
                                    <!-- Project Manager -->
                                    <div class="flex items-center gap-2 justify-between">
                                        <div class="space-y-2">
                                            <h3 class="text-sm font-normal text-neutral-500 dark:text-neutral-400">Project Manager</h3>
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $project->manager && $project->manager->photo ? asset('storage/' . $project->manager->photo) : asset('img/misc/default-avatar.png') }}" alt="Manager" class="w-[24px] h-[24px] rounded-full">
                                                <span>{{ $project->manager ? $project->manager->first_name . ' ' . $project->manager->last_name : 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="inline-flex rounded-md border border-neutral-400 dark:border-neutral-700 overflow-hidden" role="group">
                                            @if($project->manager && $project->manager->phone)
                                                <a href="tel:{{ $project->manager->phone }}" type="button" class="border-r border-neutral-400 dark:border-neutral-700 inline-flex items-center px-2 py-1 text-sm font-medium text-neutral-700 bg-white hover:bg-neutral-200 focus:z-10 focus:ring-2 focus:ring-neutral-500 focus:bg-neutral-900 focus:text-white dark:bg-transparent dark:border-neutral-600 dark:text-white dark:hover:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                                    Call
                                                </a>
                                                <button onclick="copyToClipboard('{{ $project->manager->phone }}')"  type="button" class="inline-flex items-center px-2 py-1 text-sm font-medium text-neutral-700 hover:bg-neutral-200 focus:z-10 focus:ring-2 focus:ring-neutral-500 focus:bg-neutral-900 focus:text-white dark:bg-transparent dark:text-white dark:hover:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                                        <path d="M11 22C9.89543 22 9 21.1046 9 20L9 11.0014C9 9.89629 9.89629 9.00063 11.0014 9.00141L20.0014 9.00776C21.1054 9.00854 22 9.90374 22 11.0078L22 20C22 21.1046 21.1046 22 20 22H11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M17 8.42857V4.00907C17 2.90504 16.1054 2.00984 15.0014 2.00907L4.0014 2.0014C2.89628 2.00063 2 2.89628 2 4.0014L2 15C2 16.1046 2.89543 17 4 17H8.42857" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            @else
                                                <span class="text-neutral-500">No phone available</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700"></div>
                                <div class="space-y-1">
                                    <h3 class="text-sm font-normal text-neutral-500 dark:text-neutral-400">Timeline</h3>
                                    <div class="flex gap-2 items-center text-neutral-700 dark:text-neutral-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="text-current" fill="none">
                                            <path opacity="0.4" d="M21.5 12.7568V12.2432C21.5 10.5138 21.5 9.12764 21.4217 8H2.57828C2.5 9.12764 2.5 10.5138 2.5 12.2432V12.7568C2.5 17.1141 2.5 19.2927 3.75212 20.6464C5.00424 22 7.01949 22 11.05 22H12.95C16.9805 22 18.9958 22 20.2479 20.6464C21.5 19.2927 21.5 17.1141 21.5 12.7568Z" fill="currentColor" />
                                            <path d="M18 2V4M6 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2.5 12.2432C2.5 7.88594 2.5 5.70728 3.75212 4.35364C5.00424 3 7.01949 3 11.05 3H12.95C16.9805 3 18.9958 3 20.2479 4.35364C21.5 5.70728 21.5 7.88594 21.5 12.2432V12.7568C21.5 17.1141 21.5 19.2927 20.2479 20.6464C18.9958 22 16.9805 22 12.95 22H11.05C7.01949 22 5.00424 22 3.75212 20.6464C2.5 19.2927 2.5 17.1141 2.5 12.7568V12.2432Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3 8H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $project->start_date ? $project->start_date->format('m/d/Y') : 'N/A' }} • {{ $project->end_date ? $project->end_date->format('m/d/Y') : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex h-full flex-col gap-[12px]">
                        <div class="p-[20px] gap-[10px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                            <h2 class="text-md font-medium mb-4">Project Status</h2>
                            <div class="flex gap-[16px]">
                                <select name="project_status" class="w-full rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-white px-3 py-2">
                                    <option value="planning" {{ $project->status === 'planning' ? 'selected' : '' }}>Planning</option>
                                    <option value="in_progress" {{ $project->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="on_hold" {{ $project->status === 'on_hold' ? 'selected' : '' }}>On Hold</option>
                                    <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $project->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <button type="button" class="px-4 py-2 bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 rounded-md hover:bg-neutral-800 dark:hover:bg-neutral-900 transition-colors">
                                    Save
                                </button>
                            </div>
                        </div>
                        <!-- Documents -->
                        <div class="flex-grow rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                            <div class="flex justify-between items-center p-[16px] gap-[16px] border-b border-neutral-100 dark:border-neutral-700">
                                <div class="flex items-center gap-[8px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current opacity-80" fill="none">
                                        <path d="M20.4999 10.5V10C20.4999 6.22876 20.4999 4.34315 19.3284 3.17157C18.1568 2 16.2712 2 12.4999 2H11.5C7.72883 2 5.84323 2 4.67166 3.17156C3.50009 4.34312 3.50007 6.22872 3.50004 9.99993L3.5 14.5C3.49997 17.7874 3.49996 19.4312 4.40788 20.5375C4.57412 20.7401 4.75986 20.9258 4.96242 21.0921C6.06877 22 7.71249 22 10.9999 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 7H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 12H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20.5 20L20.5 17C20.5 15.5706 19.1569 14 17.5 14C15.8431 14 14.5 15.5706 14.5 17L14.5 20.5C14.5 21.3284 15.1716 22 16 22C16.8284 22 17.5 21.3284 17.5 20.5V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M3.5 14.5L3.50004 9.99993C3.50007 6.22872 3.50009 4.34312 4.67166 3.17156C5.84323 2 7.72883 2 11.5 2H12.4999C16.2712 2 18.1568 2 19.3284 3.17157C20.4999 4.34315 20.4999 6.22876 20.4999 10V14C20.4999 15.02 20.4999 15.902 20.4768 16.6693C20.2921 15.3389 19.0298 14 17.5 14C15.8431 14 14.5 15.5706 14.5 17V21.9913C13.8992 22 13.2355 22 12.4999 22H10.9999C7.71249 22 6.06877 22 4.96243 21.0921C4.75986 20.9258 4.57412 20.7401 4.40788 20.5375C3.49996 19.4312 3.49997 17.7874 3.5 14.5Z" fill="currentColor" />
                                    </svg>
                                    <h2 class="font-medium">Documents</h2>
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit" class="px-[10px] py-[6px] rounded-md bg-white dark:bg-neutral-800 text-neutral-900 dark:text-white border border-neutral-200 dark:border-neutral-700 transition-colors duration-200 active:scale-95">
                                        Download
                                    </button>
                                    <form id="uploadForm" action="{{ route('documents.store', $project) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="files[]" id="fileInput" class="hidden" multiple onchange="document.getElementById('uploadForm').submit()">
                                        <button type="button" onclick="document.getElementById('fileInput').click()" class="px-[10px] py-[6px] rounded-md bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 border border-neutral-900 dark:border-white transition-colors duration-200 active:scale-95">
                                            + Add Files
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="w-1 px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                            <input type="checkbox" id="selectAll" @click="toggleSelectAll(this)" class="rounded-[3px] cursor-pointer border-none shadow-[0px_2px_2px_0px_rgba(27,28,29,0.12),0px_0px_0px_1.5px_#E5E7EB]" :class="{ 'bg-neutral-800 border-neutral-600 hover:bg-neutral-700': isDark, 'bg-white hover:bg-neutral-500': !isDark }">
                                        </th>
                                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Type</th>
                                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">File Name</th>
                                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Date</th>
                                        <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Size</th>
                                        <th class="w-1 px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $document)
                                    <tr id="row-{{ $document->id }}" :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                            <input type="checkbox" name="selected_documents[]" value="{{ $document->id }}" onclick="toggleRowSelection(this, {{ $document->id }})" class="rounded-[3px] cursor-pointer border-none shadow-[0px_2px_2px_0px_rgba(27,28,29,0.12),0px_0px_0px_1.5px_#E5E7EB]" :class="{ 'bg-neutral-800 border-neutral-600 hover:bg-neutral-700': isDark, 'bg-white hover:bg-neutral-500': !isDark }">
                                        </td>
                                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $document->type }}</td>
                                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ basename($document->path) }}</td>
                                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $document->date ? \Carbon\Carbon::parse($document->date)->format('M d, Y') : 'N/A' }}</td>
                                        <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $document->size }}kb</td>
                                        <td class="flex items-center justify-center px-4 py-3 gap-[8px] bg-transparent border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                            <div class="relative">
                                                <button onclick="toggleOptionsDropdown(event, {{ $document->id }})" class="focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                                        <path d="M11.9922 12H12.0012" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M17.992 12H18.001" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                                <div id="options-dropdown-{{ $document->id }}" class="options-dropdown hidden absolute right-0 mt-3 p-[6px] w-32 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                                                    <a href="{{ asset('storage/' . $document->path) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }" download>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                                            <path opacity="0.4" d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" fill="currentColor" />
                                                            <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" />
                                                            <path d="M12 16L12 8M12 16C11.2998 16 9.99153 14.0057 9.5 13.5M12 16C12.7002 16 14.0085 14.0057 14.5 13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>    
                                                        Download</a>
                                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="block mb-0" onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full text-left p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2 text-red-500" :class="{ 'hover:bg-neutral-700': isDark, 'hover:bg-red-50': !isDark }">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                                                <path opacity="0.4" d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5H19.5Z" fill="currentColor" />
                                                                <path d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5H19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
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
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-3 text-center" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">No documents available.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="flex justify-between items-center px-4 py-3 border-t border-neutral-200 dark:border-neutral-700">
                                <div class="text-sm text-neutral-700 dark:text-neutral-300">
                                    Showing {{ $documents->firstItem() }} to {{ $documents->lastItem() }} of {{ $documents->total() }} {{ Str::plural('Entry', $documents->total()) }}
                                </div>
                                <div>
                                    {{ $documents->links('vendor.pagination.tailwind') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Goals -->
            <div class="flex flex-col pb-3 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                <div class="flex justify-between items-center p-[16px] gap-[16px] border-b border-neutral-100 dark:border-neutral-700">    
                    <div class="flex items-center gap-[8px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="text-current opacity-80" fill="none">
                            <path d="M20.4999 10.5V10C20.4999 6.22876 20.4999 4.34315 19.3284 3.17157C18.1568 2 16.2712 2 12.4999 2H11.5C7.72883 2 5.84323 2 4.67166 3.17156C3.50009 4.34312 3.50007 6.22872 3.50004 9.99993L3.5 14.5C3.49997 17.7874 3.49996 19.4312 4.40788 20.5375C4.57412 20.7401 4.75986 20.9258 4.96242 21.0921C6.06877 22 7.71249 22 10.9999 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.5 7H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.5 12H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.5 20L20.5 17C20.5 15.5706 19.1569 14 17.5 14C15.8431 14 14.5 15.5706 14.5 17L14.5 20.5C14.5 21.3284 15.1716 22 16 22C16.8284 22 17.5 21.3284 17.5 20.5V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.4" d="M3.5 14.5L3.50004 9.99993C3.50007 6.22872 3.50009 4.34312 4.67166 3.17156C5.84323 2 7.72883 2 11.5 2H12.4999C16.2712 2 18.1568 2 19.3284 3.17157C20.4999 4.34315 20.4999 6.22876 20.4999 10V14C20.4999 15.02 20.4999 15.902 20.4768 16.6693C20.2921 15.3389 19.0298 14 17.5 14C15.8431 14 14.5 15.5706 14.5 17V21.9913C13.8992 22 13.2355 22 12.4999 22H10.9999C7.71249 22 6.06877 22 4.96243 21.0921C4.75986 20.9258 4.57412 20.7401 4.40788 20.5375C3.49996 19.4312 3.49997 17.7874 3.5 14.5Z" fill="currentColor" />
                        </svg>
                        <h2 class="font-medium">Project Goals</h2>
                    </div>
                    <div class="flex gap-2">
                        <form id="uploadForm" action="{{ route('documents.store', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="files[]" id="fileInput" class="hidden" multiple onchange="document.getElementById('uploadForm').submit()">
                            <button type="button" onclick="document.getElementById('fileInput').click()" class="px-[10px] py-[6px] rounded-md bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 border border-neutral-900 dark:border-white transition-colors duration-200 active:scale-95">
                                + Add Files
                            </button>
                        </form>
                    </div>
                </div>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Name</th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Employee</th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Start Date</th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">End Date</th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Finished</th>
                            <th class="px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->goals as $goal)
                        <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->name }}</td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->employee }}</td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->start_date ? $goal->start_date->format('F j, Y') : 'N/A' }}</td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->end_date ? $goal->end_date->format('F j, Y') : 'N/A' }}</td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->finished ? 'Yes' : 'No' }}</td>
                            <td class="px-4 py-3 bg-transparent border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $goal->description }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">No goals available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Transactions Tab -->
        <div id="transactions" class="tab-content hidden">
            <p>Transactions content goes here.</p>
        </div>
        <div id="calendar" class="tab-content hidden">
            <p>Calendar content goes here.</p>
        </div>
        <div id="logs" class="tab-content hidden">
            <p>Logs content goes here.</p>
        </div>
    </div>
</div>

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
        const checkboxes = document.querySelectorAll('input[name="selected_documents[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
            toggleRowSelection(checkbox, checkbox.value);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                this.blur(); // Remove focus immediately after click
            });
        });
    });

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

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.options-dropdown').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    });

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Text copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy text: ', err);
        });
    }
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

    .dropdown-button {
        cursor: pointer;
        transition: color 0.2s;
    }

    .dropdown-button:hover {
        color: #1f2937; /* Adjust color for hover */
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        z-index: 50; /* Ensure the dropdown is above other elements */
        min-width: 12rem;
        background-color: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-menu a,
    .dropdown-menu button {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        text-align: left;
        color: #374151;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .dropdown-menu a:hover,
    .dropdown-menu button:hover {
        background-color: #f3f4f6;
    }
</style>
@endsection
