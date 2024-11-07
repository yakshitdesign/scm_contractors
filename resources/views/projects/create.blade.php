@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Buttons at the top -->
        <div class="flex p-[12px] justify-between items-center mb-4 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
            <a href="{{ route('projects.index') }}" class="rounded-md px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                        'text-white hover:bg-neutral-800 active:bg-neutral-700': isDark, 
                        'text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark 
                    }">Go Back</a>
            <button type="submit" class="rounded-[6px] p-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Add Project</button>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <!-- Project Details -->
            <div class="col-span-2">
                <div class="flex flex-col gap-0 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <div class="p-[20px] border-b border-neutral-200 dark:border-neutral-700">
                        <h3 class="text-lg font-medium">Add Project</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] p-[20px]">
                        <div class="flex flex-col gap-2">
                            <label for="name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Project Name</label>
                            <input type="text" id="name" name="name" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="contractor_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Contractor</label>
                            <select id="contractor_id" name="contractor_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] dark:bg-neutral-800 dark:text-white" required>
                                @foreach($contractors as $contractor)
                                    <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="project_manager_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Project Manager</label>
                            <select id="project_manager_id" name="project_manager_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] dark:bg-neutral-800 dark:text-white" required>
                                @forelse($projectManagers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                                @empty
                                    <option value="">No project managers available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="foreman" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Foreman</label>
                            <input type="text" id="foreman" name="foreman" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="start_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="end_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="amount" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Amount</label>
                            <input type="number" id="amount" name="amount" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="status" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Status</label>
                            <select id="status" name="status" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] dark:bg-neutral-800 dark:text-white" required>
                                <option value="Active">Active</option>
                                <option value="Completed">Completed</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
