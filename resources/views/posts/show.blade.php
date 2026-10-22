@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="mx-auto flex max-w-2xl flex-col gap-6">
        <a href="{{ route('posts.index') }}" class="text-sm font-semibold text-slate-400 hover:text-white">All posts</a>

        <header>
            <h1 class="text-3xl font-black tracking-tight text-white">{{ $post->title }}</h1>
            <p class="mt-2 text-sm text-slate-400">{{ $post->user->name }} · {{ $post->created_at->format('M j, Y') }}</p>
        </header>

        <div class="text-sm leading-relaxed whitespace-pre-wrap text-slate-200">{{ $post->body }}</div>

        @can('update', $post)
            <div class="flex flex-wrap gap-3 border-t border-slate-800 pt-6">
                <a href="{{ route('posts.edit', $post) }}" class="rounded-lg border border-slate-700 px-4 py-2 text-sm font-semibold text-slate-200 hover:border-slate-500 focus-visible:ring-2 focus-visible:ring-laravel">Edit</a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg border border-rose-500/40 px-4 py-2 text-sm font-semibold text-rose-300 hover:bg-rose-500/10 focus-visible:ring-2 focus-visible:ring-rose-400">Delete</button>
                </form>
            </div>
        @endcan
    </article>
@endsection
