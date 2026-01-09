<header class="relative bg-white border-b-2 border-cyber-pink shadow-sm">
    <div class="flex items-center justify-between h-16 px-4 mx-auto w-full sm:px-6 lg:px-8">
        <div class="flex items-center">
            <a class="flex items-center flex-shrink-0"
               href="{{ url('/') }}"
               wire:navigate
            >
                <span class="sr-only">Home</span>

                <x-brand.logo class="w-auto h-6 text-gray-800" />
            </a>

            <nav class="hidden lg:gap-6 lg:flex lg:ml-8">
                @foreach ($this->collections as $collection)
                    <a class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors uppercase tracking-wide"
                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                       wire:navigate
                    >
                        {{ $collection->translateAttribute('name') }}
                    </a>
                @endforeach
            </nav>
        </div>

        <div class="flex items-center justify-between flex-1 ml-4 lg:justify-end">
            <x-header.search class="max-w-sm mr-4" />

            <div class="flex items-center -mr-4 sm:-mr-6 lg:mr-0">
                @livewire('components.cart')

                <div x-data="{ mobileMenu: false }">
                    <button x-on:click="mobileMenu = !mobileMenu"
                            class="grid flex-shrink-0 w-16 h-16 border-l border-gray-200 lg:hidden text-gray-700 hover:text-gray-900">
                        <span class="sr-only">Toggle Menu</span>

                        <span class="place-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </span>
                    </button>

                    <div x-cloak
                         x-transition
                         x-show="mobileMenu"
                         class="absolute right-0 top-auto z-50 w-screen p-4 sm:max-w-xs">
                        <ul x-on:click.away="mobileMenu = false"
                            class="p-6 space-y-4 bg-white border border-gray-200 shadow-xl rounded-lg">
                            @foreach ($this->collections as $collection)
                                <li>
                                    <a class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors uppercase tracking-wide"
                                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                                       wire:navigate
                                    >
                                        {{ $collection->translateAttribute('name') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
