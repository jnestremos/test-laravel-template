@props(['post' => null])

<form method="POST" action="{{ $post ? route('posts.update', $post) : route('posts.store') }}" class="flex max-w-2xl flex-col gap-5">
    @csrf

    @if ($post)
        @method('PUT')
    @endif

    <x-field name="title" label="Title" :value="$post?->title" required />

    <div class="flex flex-col gap-2">
        <label for="body" class="text-sm font-medium text-slate-200">Body</label>
        <textarea id="body" name="body" rows="12" required class="w-full rounded-lg border border-slate-700 bg-slate-950 px-3 py-2 text-sm leading-relaxed text-white outline-none focus:border-laravel">{{ old('body', $post?->body) }}</textarea>
        @error('body')
            <p class="text-sm text-rose-300">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-wrap gap-3">
        <button type="submit" class="rounded-lg bg-laravel px-4 py-2 text-sm font-semibold text-white hover:bg-laravel/90 focus-visible:ring-2 focus-visible:ring-laravel">
            {{ $post ? 'Update post' : 'Publish post' }}
        </button>
        <a href="{{ $post ? route('posts.show', $post) : route('posts.index') }}" class="rounded-lg border border-slate-700 px-4 py-2 text-sm font-semibold text-slate-300 hover:border-slate-500 hover:text-white focus-visible:ring-2 focus-visible:ring-laravel">Cancel</a>
    </div>
</form>
