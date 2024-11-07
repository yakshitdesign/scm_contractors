@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-[8px] border" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }">
        <div class="flex justify-between items-center p-[16px] border-b" :class="{ 'border-neutral-700': isDark, 'border-neutral-200': !isDark }">
            <h2 class="text-xl font-semibold m-0" :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">Invoices</h2>
            <a href="{{ route('accounting.create') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Create Invoice</a>
        </div>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">ID</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Invoice Number</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Invoice Date</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Amount</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Due Date</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Project</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Balance Owed</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Status</th>
                    <th class="px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->id }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->invoice_number }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->invoice_date->format('F j, Y') }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">${{ number_format($invoice->amount, 2) }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->due_date->format('F j, Y') }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->project->name }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">${{ number_format($invoice->balance_owed, 2) }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $invoice->status }}</td>
                    <td class="px-4 py-3 border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                        <div class="relative">
                            <button onclick="toggleOptionsDropdown(event, {{ $invoice->id }})" class="focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current" fill="none">
                                    <path d="M11.9922 12H12.0012" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.992 12H18.001" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div id="options-dropdown-{{ $invoice->id }}" class="options-dropdown hidden absolute right-0 mt-3 p-[6px] w-32 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50" :class="{ 'bg-neutral-800': isDark, 'bg-white': !isDark }">
                                <a href="{{ route('accounting.edit', $invoice->id) }}" class="block p-[8px] rounded-md text-sm transition-colors duration-150 flex items-center gap-2" :class="{ 'text-gray-300 hover:bg-neutral-700': isDark, 'text-gray-700 hover:bg-gray-100': !isDark }">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-current opacity-70" fill="none">
                                        <!-- SVG path for edit icon -->
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('accounting.destroy', $invoice->id) }}" method="POST" class="block mb-0" onsubmit="return confirm('Are you sure you want to delete this invoice?');">
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
        <div class="p-4 flex text-sm items-center">
            <div class="w-1/3">
                <span :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">
                    Page {{ $invoices->currentPage() }} of {{ $invoices->lastPage() }}
                </span>
            </div>
            <div class="w-1/3 flex justify-center">
                {{ $invoices->links() }}
            </div>
            <div class="w-1/3 flex justify-end">
                <form method="GET" action="{{ route('accounting.index') }}" class="flex items-center mb-0">
                    @foreach(request()->except(['per_page', 'page']) as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                    <select name="per_page" class="border rounded-md text-sm py-1" :class="{ 'bg-neutral-800 border-neutral-700 text-white hover:bg-neutral-700': isDark, 'bg-white border-neutral-200 text-neutral-900 hover:bg-neutral-50': !isDark }" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page', 10) == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleOptionsDropdown(event, id) {
        event.stopPropagation();
        const dropdown = document.getElementById(`options-dropdown-${id}`);
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function() {
        document.querySelectorAll('.options-dropdown').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    });
</script>
@endsection
