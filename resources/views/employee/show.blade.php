@extends('layouts.app')

@section('title', 'View Employee - ' . config('app.name'))

@section('content')
<div class="p-[32px]">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Profile Card -->
        <div class="flex flex-col gap-[12px]">
            <div class="flex flex-col p-[4px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                <div class="top-profile-card">
                    <div class="w-full h-[120px] rounded-[8px] overflow-hidden">
                        <img src="{{ asset('img/covers/cover-1.png') }}" alt="Cover Image" class="w-full h-full object-cover">
                    </div>
                    <div class="flex justify-between items-baseline px-[16px]" style="margin-top: -24px;">
                        <img src="{{ $employee->photo ? asset('storage/' . $employee->photo) : asset('img/misc/default-avatar.png') }}" alt="{{ $employee->first_name }}" class="w-20 h-20 rounded-full object-cover">
                        <a href="{{ route('employee.edit', $employee->id) }}" class="rounded-md px-2 py-1 border transition-colors duration-200 flex items-center gap-1.5" :class="{
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
                <div class="flex flex-col p-[16px] gap-[12px]">
                    <div class="flex items-center gap-3">
                        <h2 class="text-[24px] font-medium">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                $employee->status == 'Active' ? 'bg-green-100 dark:bg-green-100/10 text-green-800 dark:text-green-500' : 
                                ($employee->status == 'Blocked' ? 'bg-red-100 dark:bg-red-100/10 text-red-800 dark:text-red-500' : 
                                'bg-gray-100 dark:bg-gray-100/10 text-gray-800 dark:text-gray-300') 
                            }}">
                                <span class="mr-1.5 flex-shrink-0 w-1.5 h-1.5 rounded-full {{ 
                                    $employee->status == 'Active' ? 'bg-green-500' : 
                                    ($employee->status == 'Blocked' ? 'bg-red-500' : 
                                    'bg-gray-500') 
                                }}"></span>
                                {{ $employee->status }}
                        </span>
                    </div>
                    <div class="flex gap-[12px]">
                        <div class="flex flex-col gap-[4px] w-full">
                            <h3 class="text-sm font-normal opacity-60">Role</h3>
                            <div class="px-[12px] py-[8px] rounded-md text-md font-medium bg-blue-50 dark:bg-blue-900/10 text-blue-900 dark:text-blue-500">
                                {{ $employee->role }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-[4px] w-full">
                            <h3 class="text-sm font-normal opacity-60">Availability</h3>
                            <div class="px-[12px] py-[8px] rounded-md text-md font-medium bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-neutral-300">
                                {{ $employee->availability }}
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-[12px]">
                        <div class="flex flex-col gap-[4px] w-full">
                            <h3 class="text-sm font-normal opacity-60">Invoiced Amt.</h3>
                            <div class="px-[12px] py-[8px] rounded-md text-md font-medium bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-neutral-300">
                                ${{ number_format($employee->invoiced_amount, 2) }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-[4px] w-full">
                            <h3 class="text-sm font-normal opacity-60">Experience</h3>
                            <div class="px-[12px] py-[8px] rounded-md text-md font-medium bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-neutral-300">
                                {{ $employee->experience }} Yrs
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col p-[4px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                <div class="flex flex-col p-[16px] gap-[12px]">
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Email</h4>
                        <p class="text-md font-normal">{{ $employee->email }}</p>
                    </div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Phone no</h4>
                        <p class="text-md font-normal">{{ $employee->phone }}</p>
                    </div>
                    <div class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700"></div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Hiring Date</h4>
                        <p class="text-md font-normal">
                            {{ $employee->hiring_date }} 
                            ({{ \Carbon\Carbon::parse($employee->hiring_date)->diff(\Carbon\Carbon::now())->format('%yy, %mm') }})
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Date of Birth</h4>
                        <p class="text-md font-normal">
                            {{ $employee->dob }}
                            ({{ \Carbon\Carbon::parse($employee->dob)->diff(\Carbon\Carbon::now())->format('%yy') }})
                        </p>
                    </div>
                    <div class="menu-item-divider border-t border-neutral-200 dark:border-neutral-700"></div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Address</h4>
                        <p class="text-md font-normal text-right">
                            {{ $employee->address }}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">City</h4>
                        <p class="text-md font-normal">
                            {{ $employee->city }}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <h4 class="text-md font-normal opacity-60">Zip</h4>
                        <p class="text-md font-normal">
                            {{ $employee->zip_code }}
                        </p>
                    </div>
                </div>
            </div>
            <div x-data="{ showModal: false }">
                <!-- Delete Button -->
                <button @click="showModal = true" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white dark:hover:bg-red-500/10 rounded-lg px-4 py-2 transition-colors duration-200">
                    Delete Account
                </button>

                <!-- Delete Confirmation Modal -->
                <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Confirm Deletion</h2>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-300">Are you sure you want to delete this employee? This action cannot be undone.</p>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button @click="showModal = false" class="px-4 py-2 bg-gray-200 dark:bg-neutral-700 text-neutral-900 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-neutral-600">Cancel</button>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <div class="flex flex-col gap-[12px]">
            <!-- Assigned Projects -->
            <div class="flex flex-col rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                <h3 class="p-[16px] text-lg font-medium border-b border-neutral-200 dark:border-neutral-700">Assigned Projects</h3>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Project Name
                            </th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Contractor
                            </th>
                            <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                End Date
                            </th>
                            <th class="px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Dummy Project 1
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Contractor A
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Jan 1, 2024
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                <span class="text-sm text-orange-600 dark:text-orange-400">In Progress</span>
                            </td>
                        </tr>
                        <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Dummy Project 2
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Contractor B
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                Feb 15, 2024
                            </td>
                            <td class="px-4 py-3 bg-transparent border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                                <span class="text-sm text-green-600 dark:text-green-400">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Recent Activity -->
            <div class="flex flex-col rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                <h3 class="p-[16px] text-lg font-medium border-b border-neutral-200 dark:border-neutral-700">Recent Activity</h3>
                <ul class="px-[16px] py-[20px] space-y-[24px]">
                    <li class="flex justify-between">
                        <div class="flex items-center gap-[12px]">
                            <div class="flex items-center justify-center h-[48px] w-[48px] rounded-full bg-blue-100 text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-current" fill="none">
                                    <path opacity="0.4" d="M2 18.6458V8.05426C2 5.20025 2 3.77325 2.87868 2.88663C3.75736 2 5.17157 2 8 2H20C19.3333 2.20284 18 3.69767 18 8.05426V18.6458C18 20.1575 18 20.9133 17.538 21.2108C16.7831 21.6971 15.6161 20.6774 15.0291 20.3073C14.5441 20.0014 14.3017 19.8485 14.0325 19.8397C13.7417 19.8301 13.4949 19.9768 12.9709 20.3073L11.06 21.5124C10.5445 21.8374 10.2868 22 10 22C9.71321 22 9.45546 21.8375 8.94002 21.5124L8.94 21.5124L7.02913 20.3073C6.54415 20.0014 6.30166 19.8485 6.03253 19.8397C5.74172 19.8301 5.49493 19.9768 4.97087 20.3073C4.38395 20.6774 3.21687 21.6971 2.46195 21.2108C2 20.9133 2 20.1575 2 18.6458Z" fill="currentColor" />
                                    <path d="M20.016 2C18.9026 2 18 4.68629 18 8H20.016C20.9876 8 21.4734 8 21.7741 7.66455C22.0749 7.32909 22.0225 6.88733 21.9178 6.00381C21.6414 3.67143 20.8943 2 20.016 2Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M18 8.05426V18.6458C18 20.1575 18 20.9133 17.538 21.2108C16.7831 21.6971 15.6161 20.6774 15.0291 20.3073C14.5441 20.0014 14.3017 19.8485 14.0325 19.8397C13.7417 19.8301 13.4949 19.9768 12.9709 20.3073L11.06 21.5124C10.5445 21.8374 10.2868 22 10 22C9.71321 22 9.45546 21.8374 8.94 21.5124L7.02913 20.3073C6.54415 20.0014 6.30166 19.8485 6.03253 19.8397C5.74172 19.8301 5.49493 19.9768 4.97087 20.3073C4.38395 20.6774 3.21687 21.6971 2.46195 21.2108C2 20.9133 2 20.1575 2 18.6458V8.05426C2 5.20025 2 3.77325 2.87868 2.88663C3.75736 2 5.17157 2 8 2H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6 6H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 10H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 10.875C11.6716 10.875 11 11.4626 11 12.1875C11 12.9124 11.6716 13.5 12.5 13.5C13.3284 13.5 14 14.0876 14 14.8125C14 15.5374 13.3284 16.125 12.5 16.125M12.5 10.875C13.1531 10.875 13.7087 11.2402 13.9146 11.75M12.5 10.875V10M12.5 16.125C11.8469 16.125 11.2913 15.7598 11.0854 15.25M12.5 16.125V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="space-y-[4px]">
                                <h4 class="font-medium">Invoice for Vista Ridge Mall</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">An invoice has been created for $2870.80</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-400 dark:text-gray-500">2 days ago</span>
                    </li>
                    <li class="flex justify-between">
                        <div class="flex items-center gap-[12px]">
                            <div class="flex items-center justify-center h-[48px] w-[48px] rounded-full bg-blue-100 text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-current" fill="none">
                                    <path opacity="0.4" d="M2 18.6458V8.05426C2 5.20025 2 3.77325 2.87868 2.88663C3.75736 2 5.17157 2 8 2H20C19.3333 2.20284 18 3.69767 18 8.05426V18.6458C18 20.1575 18 20.9133 17.538 21.2108C16.7831 21.6971 15.6161 20.6774 15.0291 20.3073C14.5441 20.0014 14.3017 19.8485 14.0325 19.8397C13.7417 19.8301 13.4949 19.9768 12.9709 20.3073L11.06 21.5124C10.5445 21.8374 10.2868 22 10 22C9.71321 22 9.45546 21.8375 8.94002 21.5124L8.94 21.5124L7.02913 20.3073C6.54415 20.0014 6.30166 19.8485 6.03253 19.8397C5.74172 19.8301 5.49493 19.9768 4.97087 20.3073C4.38395 20.6774 3.21687 21.6971 2.46195 21.2108C2 20.9133 2 20.1575 2 18.6458Z" fill="currentColor" />
                                    <path d="M20.016 2C18.9026 2 18 4.68629 18 8H20.016C20.9876 8 21.4734 8 21.7741 7.66455C22.0749 7.32909 22.0225 6.88733 21.9178 6.00381C21.6414 3.67143 20.8943 2 20.016 2Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M18 8.05426V18.6458C18 20.1575 18 20.9133 17.538 21.2108C16.7831 21.6971 15.6161 20.6774 15.0291 20.3073C14.5441 20.0014 14.3017 19.8485 14.0325 19.8397C13.7417 19.8301 13.4949 19.9768 12.9709 20.3073L11.06 21.5124C10.5445 21.8374 10.2868 22 10 22C9.71321 22 9.45546 21.8374 8.94 21.5124L7.02913 20.3073C6.54415 20.0014 6.30166 19.8485 6.03253 19.8397C5.74172 19.8301 5.49493 19.9768 4.97087 20.3073C4.38395 20.6774 3.21687 21.6971 2.46195 21.2108C2 20.9133 2 20.1575 2 18.6458V8.05426C2 5.20025 2 3.77325 2.87868 2.88663C3.75736 2 5.17157 2 8 2H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6 6H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 10H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 10.875C11.6716 10.875 11 11.4626 11 12.1875C11 12.9124 11.6716 13.5 12.5 13.5C13.3284 13.5 14 14.0876 14 14.8125C14 15.5374 13.3284 16.125 12.5 16.125M12.5 10.875C13.1531 10.875 13.7087 11.2402 13.9146 11.75M12.5 10.875V10M12.5 16.125C11.8469 16.125 11.2913 15.7598 11.0854 15.25M12.5 16.125V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="space-y-[4px]">
                                <h4 class="font-medium">Invoice for Vista Ridge Mall</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">An invoice has been created for $2870.80</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-400 dark:text-gray-500">2 days ago</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
