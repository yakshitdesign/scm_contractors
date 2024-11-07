@extends('layouts.app')

@section('title', 'Login - ' . config('app.name'))

@section('content')
<div class="flex flex-col gap-8 justify-center items-center min-h-screen bg-neutral-100 dark:bg-neutral-900">
    <div class="rounded-full">
        <a href="#">
            <img src="{{ asset('img/brand/logo-full-dark.svg') }}" alt="Logo" class="w-[180px]">
        </a>
    </div>
    <div class="w-full max-w-md p-[32px] rounded-lg border bg-white dark:bg-neutral-800 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white">
        <div class="flex flex-col mb-8">
            <h2 class="text-2xl font-medium text-neutral-900 dark:text-white mb-1">Welcome back!</h2>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Please enter your credentials to sign in!</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Email</label>
                <input type="email" name="email" id="email" required autofocus
                       class="mt-1 block w-full px-[12px] py-[10px] border border-neutral-200 dark:border-neutral-700 rounded-md dark:bg-neutral-800 dark:text-white">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400">Password</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-[12px] py-[10px] border border-neutral-200 dark:border-neutral-700 rounded-md dark:bg-neutral-800 dark:text-white">
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                           class="h-4 w-4 border-neutral-200 dark:border-neutral-700 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-neutral-500 dark:text-neutral-400">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300">Forgot Password?</a>
                </div>
            </div>
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-[10px] px-[16px] rounded-md text-sm font-medium text-white bg-neutral-900 hover:bg-neutral-800 active:bg-neutral-700 transition-colors duration-200">
                    Sign in
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Don't have an account yet? <a href="{{ route('register') }}" class="font-medium text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300">Sign up</a></p>
        </div>
    </div>
</div>
@endsection
