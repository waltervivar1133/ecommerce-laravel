@props(['color' => 'red'])

<a {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex justify-center items-center px-4 py-2 bg-$color-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$color-500 active:bg-$color-500 focus:outline-none focus:border-$color-500 focus:shadow-outline-$color disabled:opacity-25 transition cursor-pointer"]) }}>
    {{ $slot }}
</a>
