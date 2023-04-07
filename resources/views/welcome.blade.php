<x-app-layout>

    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex items-center gap-3 ">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">{{ $category->name }}</h1>
                    <a href="{{ route('categories.show', $category) }}"
                        class="text-orange-500 hover:underline cursor-pointer font-semibold hover:text-orange-400">Ver
                        más</a>
                </div>
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>


    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 5.5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next',
                    },
                    responsive: [{
                        // screens greater than >= 775px
                        breakpoint: 775,
                        settings: {
                            // Set to `auto` and provide item width to adjust to viewport
                            slidesToShow: 'auto',
                            slidesToScroll: 'auto',
                            itemWidth: 150,
                            duration: 0.25
                        }
                    }, {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5.5,
                            slidesToScroll: 5,
                            itemWidth: 150,
                            duration: 0.25
                        }
                    }]
                });
            })
        </script>
    @endpush

</x-app-layout>
