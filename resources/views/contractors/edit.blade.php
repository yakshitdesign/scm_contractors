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

    <form action="{{ route('contractors.update', $contractor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Buttons at the top -->
        <div class="flex p-[12px] justify-between items-center mb-4 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
            <a href="{{ route('contractors.index') }}" class="rounded-md px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                        'text-white hover:bg-neutral-800 active:bg-neutral-700': isDark, 
                        'text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark 
                    }">Go Back</a>
            <button type="submit" class="rounded-[6px] p-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Update Contractor</button>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <!-- Contractor Details -->
            <div class="col-span-2">
                <div class="flex flex-col gap-0 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <div class="p-[20px] border-b border-neutral-200 dark:border-neutral-700">
                        <h3 class="text-lg font-medium">Edit Contractor</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] p-[20px]">
                        <div class="flex flex-col gap-2">
                            <label for="name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Contractor Name</label>
                            <input type="text" id="name" name="name" value="{{ $contractor->name }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="phone" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ $contractor->phone }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="address" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Address</label>
                            <input type="text" id="address" name="address" value="{{ $contractor->address }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="city" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">City</label>
                            <input type="text" id="city" name="city" value="{{ $contractor->city }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="state" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">State</label>
                            <input type="text" id="state" name="state" value="{{ $contractor->state }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="zip" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Zip Code</label>
                            <input type="text" id="zip" name="zip" value="{{ $contractor->zip }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="logo" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Contractor Logo</label>
                            <input type="file" id="logo" name="logo" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] dark:bg-neutral-800 dark:text-white">
                            @if($contractor->logo)
                                <img src="{{ asset('storage/' . $contractor->logo) }}" alt="{{ $contractor->name }}" class="mt-2 w-24 h-24 rounded-full object-cover">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
