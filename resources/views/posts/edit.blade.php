@extends('layouts.app')

@section('title', 'Edit post')

@section('content')
    <div class="flex flex-col gap-6">
        <header>
            <p class="font-mono text-xs font-bold tracking-widest text-laravel uppercase">@@method('PUT')</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-white">Edit post</h1>
            <p class="mt-3 text-sm text-slate-400">The same form component fills in the saved title and body. Only the author can open this page.</p>
        </header>

        <x-post-form :post="$post" />
    </div>
@endsection
