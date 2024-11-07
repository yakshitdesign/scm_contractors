@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white p-[20px]">
        <h2 class="text-xl font-semibold mb-4">{{ $invoice->invoice_number }}</h2>
        <div class="flex flex-col gap-4">
            <div>
                <strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('F j, Y') }}
            </div>
            <div>
                <strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}
            </div>
            <div>
                <strong>Due Date:</strong> {{ $invoice->due_date->format('F j, Y') }}
            </div>
            <div>
                <strong>Project:</strong> {{ $invoice->project->name }}
            </div>
            <div>
                <strong>Balance Owed:</strong> ${{ number_format($invoice->balance_owed, 2) }}
            </div>
            <div>
                <strong>Status:</strong> {{ $invoice->status }}
            </div>
            <div>
                <strong>Type:</strong> {{ $invoice->type }}
            </div>
            <div>
                <strong>Private Note:</strong> {{ $invoice->private_note }}
            </div>
            <div>
                <strong>Custom Name:</strong> {{ $invoice->custom_name }}
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('accounting.edit', $invoice->id) }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Edit</a>
            <a href="{{ route('accounting.index') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Back to List</a>
        </div>
    </div>
</div>
@endsection
