@extends('layouts.app')

@section('content')
<div class="p-[32px]">
    <div class="rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white p-[20px]">
        <h2 class="text-xl font-semibold mb-4">Transaction Details</h2>
        <div class="flex flex-col gap-4">
            <div>
                <strong>Transaction Type:</strong> {{ $transaction->transaction_type }}
            </div>
            <div>
                <strong>Payment Type:</strong> {{ $transaction->payment_type }}
            </div>
            <div>
                <strong>Date:</strong> {{ $transaction->date->format('F j, Y') }}
            </div>
            <div>
                <strong>Business:</strong> {{ $transaction->business }}
            </div>
            <div>
                <strong>Description:</strong> {{ $transaction->description }}
            </div>
            <div>
                <strong>Amount:</strong> ${{ number_format($transaction->amount, 2) }}
            </div>
            <div>
                <strong>Employee:</strong> {{ $transaction->employee->first_name }} {{ $transaction->employee->last_name }}
            </div>
            <div>
                <strong>Project:</strong> {{ $transaction->project->name }}
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('transactions.edit', $transaction->id) }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Edit</a>
            <a href="{{ route('transactions.index') }}" class="rounded-md px-[12px] py-[10px] transition-colors duration-200 active:scale-95" :class="{ 'bg-white text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300': isDark, 'bg-neutral-900 text-white hover:bg-neutral-800 active:bg-neutral-700': !isDark }">Back to List</a>
        </div>
    </div>
</div>
@endsection
