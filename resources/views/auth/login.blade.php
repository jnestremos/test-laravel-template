@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="mx-auto flex max-w-md flex-col gap-6">
        <header>
            <h1 class="text-3xl font-black tracking-tight text-white">Log in</h1>
            <p class="mt-3 text-sm leading-relaxed text-slate-400">Classroom account: <span class="font-mono text-slate-200">alex@studio.test</span> / <span class="font-mono text-slate-200">password</span></p>
        </header>

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
            @csrf
            <x-field name="email" label="Email" type="email" autocomplete="username" required />
            <x-field name="password" label="Password" type="password" autocomplete="current-password" required />
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="remember" value="1" class="rounded border-slate-600 bg-slate-950 text-laravel">
                Remember me
            </label>
            <button type="submit" class="rounded-lg bg-laravel px-4 py-2 text-sm font-semibold text-white hover:bg-laravel/90 focus-visible:ring-2 focus-visible:ring-laravel">Log in</button>
        </form>

        <p class="text-sm text-slate-400">
            New here?
            <a href="{{ route('register') }}" class="font-semibold text-white hover:text-laravel">Create an account</a>
        </p>
    </div>
@endsection
