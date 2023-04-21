<div x-data>
    <div>
        <p class="text-xl text-gray-700">Talla : </p>

        <select class="form-control w-full" wire:model="size_id">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="my-4">
        <p class="text-xl text-gray-700">Color : </p>

        <select class="form-control w-full" wire:model="color_id">
            <option value="" selected disabled>Seleccione un color</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ __($color->name) }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex gap-4">
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
            x-bind:disabled=" !$wire.quantity"
            >Agregar al carrito de compras
            </x-jet-button>
        </div>
    </div>

</div>
