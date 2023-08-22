<div class="container py-8">

    <section class="bg-white rounded-lg shadow-lg p-4 text-gray-700">
        <h1 class="text-lg font-semibold mb-6">CARRO DE COMPRAS</h1>
        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex my-1 ">
                                    <img src="{{ $item->options->image }}" class="h-15 w-20 object-cover mr-4"
                                        alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span class="">Color: {{ __($item->options->color) }}</span>
                                        @endif
                                        @if ($item->options->size)
                                            <span> - Size: {{ __($item->options->size) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span>S/{{ $item->price }}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600" wire:click="delete('{{ $item->rowId}}')" wire:loading.class="text-red-600 bg-opacity-25"
                                    wire:target="delete('{{ $item->rowId}}')" >
                                    <i class="fas fa-trash "></i>
                                </a>
                            </td>
                            <td>
                                @if ($item->options->size)
                                    @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                @elseif($item->options->color)
                                    @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                @else
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                @endif
                            </td>
                            <td class="text-center">
                                USD {{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline text-orange-600 mt-3 inline-block" wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar carrito de compras</a>
        @else
            <div class="flex flex-col justify-center items-center">
                <i class="fas fa-shopping-cart text-2xl text-orange-600"></i>
                <p class="text-2xl text-gray-700 mt-2">Tu carro de compras esta vacio</p>

                <x-button-enlace href="{{ route('home') }}" color="orange" class="max-w-md mx-0 p-2 mt-2">Ir al
                    inicio
                </x-button-enlace>
            </div>
        @endif
    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700 ">
                        <span class="font-bold text-lg"> Total: </span>
                        USD {{ Cart::subTotal() }}
                    </p>
                </div>
                <div>
                    <x-button-enlace href="{{ route('home') }}" color="orange" class="max-w-md mx-0 p-2 mt-2">Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif
</div>
