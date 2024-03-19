<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text" placeholder="Ingrese el nombre de la persona que recibira el producto"
                    class="w-full" />
            </div>

            <div>
                <x-jet-label value="telefono de contacto" />
                <x-jet-input type="text" placeholder="Ingrese un numero de telefono de contacto" class="w-full" />
            </div>
        </div>

        <div>
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envios</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center">
                <input type="radio" name="envio" class="text-gray-600 ">
                <span class="ml-2 text-gray-700">
                    Recojo en tienda ( Calle False 123)
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>
            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mt-5">
                <input type="radio" name="envio" class="text-gray-600 ">
                <span class="ml-2 text-gray-700">
                    Envio a domicilio
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>
        </div>
        <div>
            <x-jet-button class="mt-6 mb-4 ">Continuar con la compra</x-jet-button>

            <hr>

            <p class="text-sm text-gray-600 my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab ea
                molestiae placeat quis mollitia numquam quidem totam praesentium est, pariatur itaque minima accusamus
                saepe at repellendus quo cum architecto quos. <a class="text-orange-600 font-semibold" href="">Politicas
                    de privacidad</a>.</p>
        </div>
    </div>
    <div class="col-span-2">
    <div class="bg-white rounded-lg shadow p-4">
        <ul>
            @forelse(Cart::content() as$item)
            <li class="flex px-2 py-2 border-b border-trueGray-200">
                <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                <article class="flex-1">
                    <h1 class="font-bold">{{ $item->name }}</h1>
                    <div class="flex gap-1">
                        <p>Cant:{{ $item->qty }}</p>
                        @isset($item->options['color'])
                        <p> - Color:{{ __($item->options['color']) }}</p>
                        @endisset
                        @isset($item->options['size'])
                        <p> - {{ __($item->options['size']) }}</p>
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

        <hr class="mt-4 mb-3 ">

        <div class="text-gray-700">
            <p class="flex justify-between items-center">Subtotal
                <span class="font-semibold">{{ Cart::subtotal() }} soles</span>
            </p>

            <p class="flex justify-between items-center">Envio
                <span class="font-semibold">Gratis</span>
            </p>

        <hr class="mt-4 mb-3 ">


        <p class="flex justify-between items-center font-semibold">
            <span class="text-lg">Total</span>
            <span class="font-semibold">{{ Cart::subtotal() }}</span>
        </p>
        </div>

    </div>

    </div>
</div>
