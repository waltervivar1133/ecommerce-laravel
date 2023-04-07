<x-app-layout>
    <div class="container py-5">
        <figure class="my-3">
            <img src="{{ Storage::url($category->image) }}" class="w-full h-80 object-cover object-center" alt="">
        </figure>
        @livewire('category-filter', ['category' => $category])
    </div>


</x-app-layout>
