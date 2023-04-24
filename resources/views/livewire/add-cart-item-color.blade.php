<div x-data>
    <p class="text-xl text-gray-700">Color: </p>

    <select wire:model="color_id" name="" id="" class="form-control w-full">
        <option value="" selected disabled>Seleccionar un color</option>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{ __($color->name) }}</option>
        @endforeach
    </select>
    <p class="text-gray-700"> <span class="font-semibold text-lg">Stock disponible: </span>
        {{ $quantity ? $quantity : $product->stock }}</p>
    <div class="flex gap-4 my-4">
        <div class="flex gap-3 items-center">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:click="decrement"
                wire:loading.attr="disabled" wire:target="decrement">-
            </x-jet-secondary-button>
            <span class="text-gray-700">{{ $qty }}</span>
            <x-jet-secondary-button wire:click="increment" disabled x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment">+</x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-jet-button class="w-full bg-orange-600 hover:bg-orange-500 justify-center "
                x-bind:disabled="$wire.qty > $wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                wire:target="addItem">Agregar al carrito de compras
            </x-jet-button>
        </div>
    </div>
</div>
