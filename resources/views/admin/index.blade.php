@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-[8px] border" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }">
        <div class="flex justify-between items-center p-[16px] border-b" :class="{ 'border-neutral-700': isDark, 'border-neutral-200': !isDark }">
            <h2 class="text-xl font-semibold m-0" :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">Admin Management</h2>
            <a href="{{ route('admin.create') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Add New Admin</a>
        </div>
        <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Select</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Admin Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Date Created</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Admin Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-neutral-200 dark:bg-neutral-800 dark:divide-neutral-700">
                @foreach($admins as $admin)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="form-checkbox">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $admin->created_at ? $admin->created_at->format('Y-m-d') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.edit', $admin) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.destroy', $admin) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
