@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <div class="flex flex-col gap-2">
                <label for="transaction_type" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Transaction Type</label>
                <select id="transaction_type" name="transaction_type" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="fuel">Fuel</option>
                    <option value="material">Material</option>
                    <option value="payroll">Payroll</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="payment_type" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Payment Type</label>
                <select id="payment_type" name="payment_type" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="cash">Cash</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="check">Check</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Date</label>
                <input type="date" id="date" name="date" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="business" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Business</label>
                <input type="text" id="business" name="business" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="description" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Description</label>
                <textarea id="description" name="description" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white"></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label for="amount" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Amount</label>
                <input type="number" step="0.01" id="amount" name="amount" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="employee_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Employee</label>
                <select id="employee_id" name="employee_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="project_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Project</label>
                <select id="project_id" name="project_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Save Transaction</button>
        </div>
    </form>
</div>
@endsection
