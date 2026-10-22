@props(['post'])

<article {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-800 bg-slate-900 p-5']) }}>
    <h2 class="text-xl font-bold tracking-tight text-white">
        <a href="{{ route('posts.show', $post) }}" class="hover:text-laravel focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-laravel">{{ $post->title }}</a>
    </h2>
    <p class="mt-2 text-sm text-slate-400">{{ $post->user->name }} · {{ $post->created_at->format('M j, Y') }}</p>
    <p class="mt-3 text-sm leading-relaxed text-slate-300">{{ str($post->body)->limit(180) }}</p>
</article>
