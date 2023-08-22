@props(['product'])

<li class="bg-white rounded-xl shadow  ">
    <article>
        <figure>
            <img src="{{ Storage::url($product->images->first()->url) }}" alt=""
                class="rounded-xl md:h-48 md:w-56 object-cover object-center">
        </figure>
        <div class="py-4 px-6">
            <h1 class="text-lg font-semibold">
                <a
                    href="{{ route('products.show', $product) }}">{{ Str::limit($product->name, 15) }}</a>
            </h1>
            <p class="font-bold text-trueGray-700">{{ $product->price }}</p>
        </div>
    </article>

</li>
