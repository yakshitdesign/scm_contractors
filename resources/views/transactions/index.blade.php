@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-[8px] border" :class="{ 'bg-neutral-800 border-neutral-700 text-white': isDark, 'bg-white border-neutral-200 text-neutral-900': !isDark }">
        <div class="flex justify-between items-center p-[16px] border-b" :class="{ 'border-neutral-700': isDark, 'border-neutral-200': !isDark }">
            <h2 class="text-xl font-semibold m-0" :class="{ 'text-white': isDark, 'text-neutral-900': !isDark }">Transactions</h2>
            <a href="{{ route('transactions.create') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Create Transaction</a>
        </div>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">ID</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Transaction Type</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Payment</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Date</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Business</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Description</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Amount</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Employee</th>
                    <th class="px-4 py-2 border-b border-r text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Project</th>
                    <th class="px-4 py-2 border-b text-sm font-medium text-left" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-100': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-800': !isDark }">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr :class="{ 'hover:bg-neutral-700 text-white': isDark, 'hover:bg-neutral-50 text-neutral-900': !isDark }">
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->id }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->transaction_type }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->payment_type }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->date->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->business }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->description }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">${{ number_format($transaction->amount, 2) }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->employee->first_name }} {{ $transaction->employee->last_name }}</td>
                    <td class="px-4 py-3 border-b border-r" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">{{ $transaction->project->name }}</td>
                    <td class="px-4 py-3 border-b" :class="{ 'border-neutral-700 bg-neutral-800 text-neutral-200': isDark, 'border-neutral-100 bg-neutral-50 text-neutral-700': !isDark }">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endsection
