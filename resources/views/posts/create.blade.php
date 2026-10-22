@extends('layouts.app')

@section('title', 'New post')

@section('content')
    <div class="flex flex-col gap-6">
        <header>
            <p class="font-mono text-xs font-bold tracking-widest text-laravel uppercase">@@csrf · @@error</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-white">New post</h1>
            <p class="mt-3 text-sm text-slate-400">The form posts to the store action. Validation errors come back through the error bag.</p>
        </header>

        <x-post-form />
    </div>
@endsection
