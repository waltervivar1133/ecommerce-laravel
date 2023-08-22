<div class="flex items-center justify-center" x-data>
    <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:click="decrement" wire:loading.attr="disabled"
        wire:target="decrement">-
    </x-jet-secondary-button>
    <span class="text-gray-700 mx-2">{{ $qty }}</span>
    <x-jet-secondary-button wire:click="increment" disabled x-bind:disabled="$wire.qty >= $wire.quantity"
        wire:loading.attr="disabled" wire:target="increment">+</x-jet-secondary-button>
</div>
