<header {{ $attributes->merge(['class' => 'border-b border-slate-800 bg-slate-900']) }}>
    <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6">
        <a href="{{ route('posts.index') }}" class="flex items-center gap-3 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-laravel">
            <span class="grid h-10 w-10 place-items-center rounded-lg border border-laravel/30 bg-laravel/10 text-sm font-black text-laravel">Sn</span>
            <span>
                <span class="block text-sm font-extrabold text-white">Studio Notes</span>
                <span class="block text-xs text-slate-400">Test Laravel Project</span>
            </span>
        </a>

        <nav aria-label="Account" class="flex items-center gap-3">
            @auth
                <span class="text-sm text-slate-300">{{ auth()->user()->name }}</span>
                <a href="{{ route('posts.create') }}" class="rounded-lg bg-laravel px-3 py-1.5 text-xs font-semibold text-white hover:bg-laravel/90 focus-visible:ring-2 focus-visible:ring-laravel">New post</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:border-slate-500 hover:text-white focus-visible:ring-2 focus-visible:ring-laravel">Log out</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:border-slate-500 hover:text-white focus-visible:ring-2 focus-visible:ring-laravel">Log in</a>
                <a href="{{ route('register') }}" class="rounded-lg bg-laravel px-3 py-1.5 text-xs font-semibold text-white hover:bg-laravel/90 focus-visible:ring-2 focus-visible:ring-laravel">Register</a>
            @endguest
        </nav>
    </div>
</header>
