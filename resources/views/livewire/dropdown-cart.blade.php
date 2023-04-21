<div>
    <x-jet-dropdown align="right" width="96">
        <x-slot name="trigger">
            <x-cart-button />
        </x-slot>
        <x-slot name="content" class="p-2">

            <ul>
                @forelse(Cart::content() as$item)
                    <li class="flex px-2 py-2 border-b border-trueGray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div class="flex gap-1">
                                <p>Cant:{{ $item->qty }}</p>
                               @isset($item->options['color'])
                                  <p> - Color:{{__($item->options['color'])}}</p>
                               @endisset
                            </div>
                            <p>Precio: {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <x-jet-dropdown-link>
                        <div class="p-3">
                            <p class="text-center text-gray-700">
                                No hay nada agregado en tu carrito de compras
                            </p>
                        </div>
                    </x-jet-dropdown-link>
                @endforelse
            </ul>


            @if (Cart::count())
                <div class="p-2 ">
                    <p class="text-lg text-red-600 font-extrabold mb-3"> <span class="font-bold text-gray-800">Total: </span>
                        S/ {{ Cart::subtotal() }}</p>
                    <x-button-enlace color="orange" class="w-full mx-0 p-2">Ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
