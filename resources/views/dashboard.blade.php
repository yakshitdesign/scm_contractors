@extends('layouts.app')

@section('title', 'Dashboard - ' . config('app.name'))

@section('description', 'This is the dashboard where you can manage your employees, projects, and more.')

@section('content')
<div class="dashboard grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    <!-- Left Column -->
    <div class="col-span-1 md:col-span-2 grid grid-rows-3 gap-4">
        <!-- Row 1: Welcome and Total Sales -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-neutral-900 text-white p-4 rounded-lg">
                <h2>Welcome to SCM</h2>
                <p>Sales revenue increased 30% in 1 Week</p>
                <div class="flex justify-between items-center mt-4">
                    <span>10 : 21 : 06</span>
                    <span>Oct 23, 2024</span>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3>Total Sales</h3>
                <p class="text-2xl font-bold">$567,552.24 <span class="text-green-500">+5%</span></p>
                <!-- Add chart here -->
            </div>
        </div>

        <!-- Row 2: Financial Summary -->
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h4>Recorded Expenses</h4>
                <p class="text-xl">$51,624.32 <span class="text-red-500">-7%</span></p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4>Outstanding Invoices</h4>
                <p class="text-xl">$1,254.54</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4>Pending Payments</h4>
                <p class="text-xl">$8,924.76</p>
            </div>
        </div>

        <!-- Row 3: Active Projects -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h3>Active Projects</h3>
            <!-- Add projects table here -->
        </div>
    </div>

    <!-- Right Column: Events -->
    <div class="bg-white p-4 rounded-lg shadow flex flex-col justify-between">
        <div>
            <h3>Upcoming Events</h3>
            <!-- Add calendar here -->
        </div>
        <div class="mt-4">
            <h4>Events</h4>
            <!-- Add events list here -->
        </div>
    </div>
</div>
@endsection
