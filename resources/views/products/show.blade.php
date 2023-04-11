<x-app-layout>
    <div class="container my-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold">{{ $product->name }}</h1>
                <div class="flex gap-4">
                    <p class="text-trueGray-700">Marca: <a href=""
                            class="uppercase hover:text-orange-500 ">{{ $product->brand->name }}</a></p>
                    <p>5 <i class="fas fa-star text-yellow-400"></i></p>
                    <a href="" class="text-orange-500 underline hover:text-orange-700">39 reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-trueGray-700 my-4">S/ {{ $product->price }}</p>

                <div class="bg-white rounded-lg shadow-lg mb-6 ">
                    <div class="p-4 flex items-center gap-4">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600 ">
                            <i class="fa fa-truck text-white"></i>
                        </span>
                        <div>
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envios a todo el Perú</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
