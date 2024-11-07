@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <form action="{{ route('accounting.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <div class="flex flex-col gap-2">
                <label for="invoice_number" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Invoice Number</label>
                <input type="text" id="invoice_number" name="invoice_number" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="invoice_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Invoice Date</label>
                <input type="date" id="invoice_date" name="invoice_date" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="amount" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Amount</label>
                <input type="number" step="0.01" id="amount" name="amount" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="due_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Due Date</label>
                <input type="date" id="due_date" name="due_date" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="project_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Project</label>
                <select id="project_id" name="project_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="balance_owed" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Balance Owed</label>
                <input type="number" step="0.01" id="balance_owed" name="balance_owed" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="status" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Status</label>
                <select id="status" name="status" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                    <option value="Overdue">Overdue</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="type" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Type</label>
                <select id="type" name="type" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="Due on Receipt">Due on Receipt</option>
                    <option value="Net 15">Net 15</option>
                    <option value="Net 30">Net 30</option>
                    <option value="Net 60">Net 60</option>
                    <option value="Date Set">Date Set</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="private_note" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Private Note</label>
                <textarea id="private_note" name="private_note" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white"></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label for="custom_name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Custom Name</label>
                <input type="text" id="custom_name" name="custom_name" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Create Invoice</button>
        </div>
    </form>
</div>
@endsection
