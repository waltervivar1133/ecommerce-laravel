@props(['product'])

<li class="bg-white rounded-lg shadow mb-4">
    <article class="flex">
        <figure>
            <img class="h-48 w-56 object-cover object-center"
                src="{{ Storage::url($product->images->first()->url) }}" alt="">
        </figure>
        <div class="flex-1 py-4 px-6 flex flex-col justify-between">
            <div class="flex justify-between">
                <div>
                    <a href="{{ route('products.show', $product) }}">
                        <h1 class="font-semibold text-gray-700 text-lg">{{ $product->name }}
                        </h1>
                    </a>
                    <p class="font-bold text-gray-700">S/ {{ $product->price }}</p>
                </div>
                <div class="flex gap-1 ">
                    <ul class="flex gap-1 text-yellow-500">
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                    </ul>
                    <div>
                        <span>(24)</span>
                    </div>
                </div>
            </div>
            <div>
                <x-jet-danger-button> <a href="{{ route('products.show', $product) }}">Mas
                        informacion</a> </x-jet-danger-button>
            </div>
        </div>
    </article>
</li>
