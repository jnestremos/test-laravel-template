@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="flex flex-col gap-8">
        <div>
            <p class="font-mono text-xs font-bold tracking-widest text-laravel uppercase">Week 9 · Student blog</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Studio Notes</h1>
            <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-400">Read the posts, then sign in to publish one. The list, the empty state, and the header all come from Blade directives.</p>
            <p class="mt-3 font-mono text-xs text-slate-500">@@forelse · @@auth · @@guest · @{{ }}</p>
        </div>

        <div class="flex flex-col gap-4">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <p class="rounded-2xl border border-dashed border-slate-700 px-5 py-10 text-sm text-slate-400">No posts yet.</p>
            @endforelse
        </div>
    </div>
@endsection
