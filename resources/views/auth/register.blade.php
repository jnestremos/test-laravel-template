@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="mx-auto flex max-w-md flex-col gap-6">
        <header>
            <h1 class="text-3xl font-black tracking-tight text-white">Create an account</h1>
            <p class="mt-3 text-sm text-slate-400">Registration signs you in and sends you back to the posts.</p>
        </header>

        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
            @csrf
            <x-field name="name" label="Name" autocomplete="name" required />
            <x-field name="email" label="Email" type="email" autocomplete="email" required />
            <x-field name="password" label="Password" type="password" autocomplete="new-password" required />
            <x-field name="password_confirmation" label="Confirm password" type="password" autocomplete="new-password" required />
            <button type="submit" class="rounded-lg bg-laravel px-4 py-2 text-sm font-semibold text-white hover:bg-laravel/90 focus-visible:ring-2 focus-visible:ring-laravel">Register</button>
        </form>

        <p class="text-sm text-slate-400">
            Already registered?
            <a href="{{ route('login') }}" class="font-semibold text-white hover:text-laravel">Log in</a>
        </p>
    </div>
@endsection
