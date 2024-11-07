@extends('layouts.app')

@section('title', 'Edit Employee - ' . config('app.name'))

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
    
    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Buttons at the top -->
        <div class="flex p-[12px] justify-between items-center mb-4 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
            <a href="{{ route('employee') }}" class="rounded-md px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                        'text-white hover:bg-neutral-800 active:bg-neutral-700': isDark, 
                        'text-neutral-900 hover:bg-neutral-50 active:bg-neutral-100': !isDark 
                    }">Go Back</a>
            <div class="flex space-x-2">
                <button type="button" onclick="handleDelete()" class="rounded-md border px-[12px] py-[10px] cursor-pointer m-0 flex items-center gap-1.5 transition-colors duration-200 active:scale-95" :class="{ 
                            'bg-red-800 border-red-600 text-white hover:bg-red-700 active:bg-red-600': isDark, 
                            'bg-white border-red-300 text-red-900 hover:bg-red-100 active:bg-red-200': !isDark 
                        }">Delete</button>
                <button type="submit" class="rounded-[6px] p-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Save Details</button>
            </div>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px]">
            <!-- Basic Details -->
            <div class="col-span-2">
                <div class="flex flex-col gap-0 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                    <div class="p-[20px] border-b border-neutral-200 dark:border-neutral-700">
                        <h3 class="text-lg font-medium">Edit Employee</h3>
                    </div>
                    <div class="px-[20px] py-[8px] border-b bg-neutral-100 text-neutral-400 border-neutral-200 dark:bg-neutral-700 dark:text-neutral-500 dark:border-neutral-700">
                        <p class="text-sm font-medium uppercase tracking-wider">Basic Details</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] p-[20px]">
                        <div class="flex flex-col gap-2">
                            <label for="first_name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}" placeholder="Enter first name" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="last_name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}" placeholder="Enter last name" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="email" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Email</label>
                            <input type="email" name="email" id="email" value="{{ $employee->email }}" placeholder="Enter email address" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="phone" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ $employee->phone }}" placeholder="Enter phone number" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="dob" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Date of Birth</label>
                            <input type="date" name="dob" id="dob" value="{{ $employee->dob }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="hiring_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Hiring Date</label>
                            <input type="date" name="hiring_date" id="hiring_date" value="{{ $employee->hiring_date }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label for="experience" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Total Experience</label>
                            <input type="text" name="experience" id="experience" value="{{ $employee->experience }}" placeholder="Enter total experience" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                    </div>
                    <div class="px-[20px] py-[8px] border-b border-t bg-neutral-100 text-neutral-400 border-neutral-200 dark:bg-neutral-700 dark:text-neutral-500 dark:border-neutral-700">
                        <p class="text-sm font-medium uppercase tracking-wider">Address Details</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] p-[20px]">
                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Address</label>
                            <input type="text" name="address" id="address" value="{{ $employee->address }}" placeholder="Enter address" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="zip_code" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" value="{{ $employee->zip_code }}" placeholder="Enter zip code" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="city" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">City</label>
                            <input type="text" name="city" id="city" value="{{ $employee->city }}" placeholder="Enter city" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-span-1">
                <div class="flex flex-col gap-[12px]">
                    <!-- Image Upload -->
                    <div class="flex items-center p-[20px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                        <div class="flex flex-col flex-grow gap-[12px]">
                            <div>
                                <h3 class="text-lg font-semibold mb-1">Upload Image</h3>
                                <p class="text-sm text-neutral-500 dark:text-neutral-400">Supports .jpg, .jpeg, .png</p>
                            </div>
                            <input type="file" name="image" class="block w-full text-sm text-neutral-500 dark:text-neutral-400">
                        </div>
                    </div>

                    <!-- Employee Details -->
                    <div class="p-[20px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                        <div class="mb-[20px]">
                            <label for="role" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Employee Role</label>
                            <select name="role" id="role" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                                <option value="" disabled>Select role</option>
                                <option {{ $employee->role == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
                                <option {{ $employee->role == 'Foreman' ? 'selected' : '' }}>Foreman</option>
                                <option {{ $employee->role == 'Crew Lead' ? 'selected' : '' }}>Crew Lead</option>
                            </select>
                        </div>
                        <div class="mb-[20px]">
                            <label for="availability" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Availability</label>
                            <select name="availability" id="availability" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                                <option value="" disabled>Select availability</option>
                                <option {{ $employee->availability == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                <option {{ $employee->availability == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                <option {{ $employee->availability == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Status</label>
                            <select name="status" id="status" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                                <option value="" disabled>Select status</option>
                                <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Blocked" {{ $employee->status == 'Blocked' ? 'selected' : '' }}>Blocked</option>
                            </select>
                        </div>
                    </div>

                    <!-- Account Access -->
                    <div class="p-0 rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
                        <div class="p-[20px] border-b border-neutral-200 dark:border-neutral-700">
                            <h3 class="text-lg font-medium">Account Access</h3>
                        </div>
                        <div class="flex flex-col gap-[20px] p-[20px]">
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col gap-1">
                                    <h4 for="access" class="text-md font-medium text-neutral-900 dark:text-white">Employee access</h4>
                                    <p class="text-xs text-neutral-500 dark:text-neutral-400">Enable or disable employee access to the system</p>
                                </div>
                                <button type="button" 
                                        x-data="{ enabled: {{ $employee->access ? 'true' : 'false' }} }"
                                        x-on:click="enabled = !enabled"
                                        @click="$refs.accessInput.value = enabled"
                                        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
                                        :class="{ 'bg-blue-600': enabled, 'bg-neutral-200 dark:bg-neutral-700': !enabled }"
                                        role="switch"
                                        aria-checked="false">
                                    <span class="sr-only">Employee access</span>
                                    <span aria-hidden="true"
                                          class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                          :class="{ 'translate-x-5': enabled, 'translate-x-0': !enabled }">
                                    </span>
                                </button>
                                <input type="hidden" 
                                       name="access" 
                                       x-ref="accessInput"
                                       :value="enabled ? '1' : '0'">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="password" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Create Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter password" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="confirm_password" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-lg overflow-hidden max-w-md w-full">
            <div class="p-6">
                <h2 class="text-lg font-medium text-neutral-900 dark:text-white">Confirm Deletion</h2>
                <p class="mt-2 text-sm text-neutral-500 dark:text-neutral-400">Are you sure you want to delete this employee?</p>
            </div>
            <div class="flex justify-end p-6 space-x-4">
                <button onclick="toggleDeleteModal()" class="bg-gray-200 dark:bg-neutral-700 text-neutral-900 dark:text-white rounded-md px-4 py-2">Cancel</button>
                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white rounded-md px-4 py-2">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.toggle('hidden');
    }

    function handleDelete() {
        toggleDeleteModal();
    }
</script>
