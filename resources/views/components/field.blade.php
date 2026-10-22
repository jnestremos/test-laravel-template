@props(['label', 'name', 'type' => 'text', 'value' => null])

<div class="flex flex-col gap-2">
    <label for="{{ $name }}" class="text-sm font-medium text-slate-200">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @if ($type !== 'password') value="{{ old($name, $value) }}" @endif
        {{ $attributes->merge(['class' => 'w-full rounded-lg border border-slate-700 bg-slate-950 px-3 py-2 text-sm text-white outline-none focus:border-laravel']) }}
    >
    @error($name)
        <p class="text-sm text-rose-300">{{ $message }}</p>
    @enderror
</div>
