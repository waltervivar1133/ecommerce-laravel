<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-xl  shadow {{ $loop->last ? '' : 'mr-4' }} ">
                        <article>
                            <figure>
                                <img src="{{ Storage::url($product->images->first()->url) }}" alt="" class="rounded-xl h-48 w-56 object-cover object-center">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="">{{ Str::limit($product->name, 15) }}</a>
                                </h1>
                                <p class="font-bold text-trueGray-700">{{ $product->price }}</p>
                            </div>
                        </article>

                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        @include('components.loader')
    @endif
</div>
