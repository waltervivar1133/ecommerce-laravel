<div>
    <div class="bg-white rounded-lg shadow-lg mb-8">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>
            <div class="flex gap-2 items-center border border-gray-200 divide-x divide-gray-200">
                <i class="fas fa-th text-gray-500 cursor-pointer  p-3 {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-list text-gray-500 cursor-pointer  p-3 {{ $view == 'list' ? 'text-orange-500' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <aside>
            <x-jet-button class="mb-4" wire:click="limpiar">Eliminar Filtros</x-jet-button>
            <h2 class="font-semibold text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm"><a wire:click="$set('subcategoria', '{{ $subcategory->name }}')"
                            class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria === $subcategory->name ? 'text-orange-500 font-semibold' : '' }}">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm"><a wire:click="$set('marca', '{{ $brand->name }}')"
                            class="cursor-pointer hover:text-orange-500 capitalize  {{ $marca === $brand->name ? 'text-orange-500 font-semibold' : '' }}">{{ $brand->name }}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view === 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <x-product-grid :product="$product" />
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product="$product" />
                    @endforeach
                </ul>
            @endif

            <div class="my-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
