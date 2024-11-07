@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <form id="adminForm" action="{{ route('admin.update', $admin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <div class="flex flex-col gap-2">
                <label for="name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Name</label>
                <input type="text" name="name" id="name" value="{{ $admin->name }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Email</label>
                <input type="email" name="email" id="email" value="{{ $admin->email }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="password" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Password</label>
                <input type="password" name="password" id="password" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
            </div>
            <div class="flex flex-col gap-2">
                <label for="password_confirmation" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
            </div>
            <div class="flex flex-col gap-2">
                <label for="role" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Role</label>
                <select name="role" id="role" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="super_admin" {{ $admin->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Update Admin</button>
        </div>
    </form>
</div>
@endsection
