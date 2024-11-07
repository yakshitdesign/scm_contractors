@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <form action="{{ route('accounting.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <div class="flex flex-col gap-2">
                <label for="invoice_number" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Invoice Number</label>
                <input type="text" id="invoice_number" name="invoice_number" value="{{ $invoice->invoice_number }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="invoice_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Invoice Date</label>
                <input type="date" id="invoice_date" name="invoice_date" value="{{ $invoice->invoice_date->format('Y-m-d') }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="amount" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Amount</label>
                <input type="number" step="0.01" id="amount" name="amount" value="{{ $invoice->amount }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="due_date" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="{{ $invoice->due_date->format('Y-m-d') }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="project_id" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Project</label>
                <select id="project_id" name="project_id" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $invoice->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="balance_owed" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Balance Owed</label>
                <input type="number" step="0.01" id="balance_owed" name="balance_owed" value="{{ $invoice->balance_owed }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="status" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Status</label>
                <select id="status" name="status" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="Pending" {{ $invoice->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Overdue" {{ $invoice->status == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="type" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Type</label>
                <select id="type" name="type" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white" required>
                    <option value="Due on Receipt" {{ $invoice->type == 'Due on Receipt' ? 'selected' : '' }}>Due on Receipt</option>
                    <option value="Net 15" {{ $invoice->type == 'Net 15' ? 'selected' : '' }}>Net 15</option>
                    <option value="Net 30" {{ $invoice->type == 'Net 30' ? 'selected' : '' }}>Net 30</option>
                    <option value="Net 60" {{ $invoice->type == 'Net 60' ? 'selected' : '' }}>Net 60</option>
                    <option value="Date Set" {{ $invoice->type == 'Date Set' ? 'selected' : '' }}>Date Set</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="private_note" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Private Note</label>
                <textarea id="private_note" name="private_note" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">{{ $invoice->private_note }}</textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label for="custom_name" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Custom Name</label>
                <input type="text" id="custom_name" name="custom_name" value="{{ $invoice->custom_name }}" class="block w-full border border-neutral-200 dark:border-neutral-700 rounded-md px-[12px] py-[10px] placeholder:text-neutral-500 dark:bg-neutral-800 dark:text-white">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Update Invoice</button>
        </div>
    </form>
</div>
@endsection
