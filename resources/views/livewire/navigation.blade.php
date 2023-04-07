<script>
    const dropdown = () => {
        return {
            open: false,
            show() {
                if (this.open) {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = "auto"

                } else {
                    this.open = true;
                    document.getElementsByTagName("html")[0].style.overflow = "hidden";
                }
            },
            close() {
                this.open = false;
                document.getElementsByTagName('html')[0].style.overflow = "auto"
            }
        }
    }
</script>


<header class="bg-trueGray-700 sticky top-0 z-50" x-data="dropdown()" @keydown.escape.window="open=false">
    <div class="container flex items-center justify-between h-16 gap-5">
        <a @click="show()"
            class="flex flex-col justify-center items-center bg-white px-6 md:px-4 bg-opacity-25 text-white cursor-pointer font-semibold h-full order-last md:order-first"
            :class="{ 'bg-white bg-opacity-100 text-orange-500': open, 'bg-white bg-opacity-25 text-white': !open }">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block"
                :class="{ 'text-orange-500': open, 'text-white': !open }">Categorias</span>
        </a>

        <a href="/">
            <x-jet-application-mark class="block h-9 w-auto text-orange-600" />
        </a>

        <div class="flex-1 hidden md:flex">
            @livewire('search')
        </div>

        <x-account-button />

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
    </div>
    <nav id="navigation-menu" x-show="open" class="bg-trueGray-700 bg-opacity-25 absolute w-full hidden "
        :class="{ 'block': open, 'hidden': !open }">
        {{-- Menu destokp --}}
        <div class="container h-full hidden md:block">
            <div class="grid grid-cols-4 h-full relative" @click.outside="close()">

                <ul class="col-span-1 bg-white ">
                    @foreach ($categories as $category)
                        {{-- Categories --}}
                        <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white navigation-link">
                            <a href="{{route('categories.show', $category)}}" class=" py-2 px-4 text-base flex items-center">
                                <span class="flex justify-center w-9"> {!! $category->icon !!}</span>
                                {{ $category->name }}</a>
                            {{-- Subcategories hover --}}
                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 top-0 right-0 h-full hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>

                        </li>
                    @endforeach
                </ul>
                {{-- Subcategories --}}
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>

        {{-- Menu mobile --}}

        <div class="bg-white h-full overflow-y-auto">
            <div class="container p-2 bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white">
                        <a href="{{route('categories.show', $category)}}" class=" py-2 px-4 text-base flex items-center">
                            <span class="flex justify-center w-9"> {!! $category->icon !!}</span>
                            {{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>


            <p class="text-trueGray-500 px-4 py-2 text-uppercase"> Usuarios</p>

            @livewire('cart-mobil')
            @auth
                <a href="{{ route('profile.show') }}"
                    class=" py-2 px-4 text-base flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9"> <i
                            class="fas fa-user-circle text-gray-600 text-3xl cursor-pointer"></i> </span>
                    perfil</a>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href=""
                    class=" py-2 px-4 text-base flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9"> <i class="fa fa-sign-out-alt text-gray-600 text-2xl"></i>
                    </span>
                    Cerrar sesion</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            @else
                <a href="{{ route('login') }}"
                    class=" py-2 px-4 text-base flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-8"> <i
                            class="fas fa-user-circle text-gray-600 text-3xl cursor-pointer"></i> </span>
                    Iniciar Sesión</a>

                <a href="{{ route('register') }}"
                    class=" py-2 px-4 text-base flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-8"> <i
                            class="fas fa-user-circle text-gray-600 text-3xl cursor-pointer"></i> </span>
                    Registrarte</a>

            @endauth

        </div>
    </nav>
</header>
