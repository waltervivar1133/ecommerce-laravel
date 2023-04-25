<div class="flex-1 relative ">
    <form action="" class="flex justify-center items-center">
        <x-jet-input wire:model="search" type="text" class="  flex w-full border-0 rounded-r-none"
            placeholder="¿Estas buscando algun producto?" />
        <button class="bg-orange-600 w-100 py-1 px-3  rounded-r-md ">
            <x-search />
        </button>
    </form>
    <div class="absolute w-full  mt-1 hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow  ">
            <div class="px-4 py-3">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex my-1">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categoria: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
