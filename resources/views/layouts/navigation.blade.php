<!--　ナヴィゲーション・バ－　-->
<nav x-data="{ open: false }" id="top_nav" class="flex justify-between h-[70px] bg-darkGray fixed w-full z-10 max-[900px]:bg-transparent max-[900px]:flex max-[900px]:justify-center max-[900px]:content-center max-[900px]:flex-col max-[900px]:absolute">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
        <div class="flex h-16">
            <div class="flex">
                <!--ロゴとブランド名を含む-->
                <div class="shrink-0 flex justify-center">
                    <a href="{{ route('topPage') }}" class="flex px-[10px] w-[26rem] max-w-[100vw]">
                        <x-application-logo class="scale-105 max-w-full h-auto hover:scale-125 max-[960px]:scale-75 max-[900px]:filter-none max-[900px]:w-[25%] max-[900px]:h-auto max-[900px]:scale-[0.7]" />
                        <h1 class="text-white hover:text-greenCustom text-2xl leading-[70px] max-[900px]:text-darkGray max-[900px]:text-[1.8rem]">J.<span class="text-redCustom">O</span>.2 Bike Rental</h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('topPage')" :active="request()->routeIs('topPage')">
                        Home
                    </x-nav-link>

                    <x-nav-link :href="route('topPage')">
                        Routes
                    </x-nav-link>

                    <x-nav-link :href="route('topPage')">
                        Prices
                    </x-nav-link>

                    <x-nav-link :href="route('showMyRentals')" :active="request()->routeIs('showMyRentals')">
                        My Rentals
                    </x-nav-link>

                    @auth
                        @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('AdminShowRentals')" :active="request()->routeIs('AdminShowRentals')">
                            All Rentals
                        </x-nav-link>
                        @endif
                    @endauth

                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        My Profile
                    </x-nav-link>

                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf

                        @if(Auth::check())
                            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('login')">
                                Login
                            </x-nav-link>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::check() ? Auth::user()->name : '' }}</div>
                <div class="font-medium text-sm text-gray-500">{{Auth::check() ? Auth::user()->email: '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('topPage')">
                    Home
                </x-responsive-nav-link>

                <x-nav-link :href="route('topPage')" :active="request()->routeIs('topPage')">
                    Routes
                </x-nav-link>

                <x-responsive-nav-link :href="route('topPage')" :active="request()->routeIs('topPage')">
                    Prices
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('showMyRentals')">
                    My Rentals
                </x-responsive-nav-link>

                @auth
                    @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('AdminShowRentals')">
                        All Rentals
                    </x-responsive-nav-link>
                    @endif
                @endauth

                <x-responsive-nav-link :href="route('profile.edit')">
                    My Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}" class="flex">
                    @csrf
                    @if(Auth::check())
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    @else
                        <x-responsive-nav-link :href="route('login')">
                            Login
                        </x-responsive-nav-link>
                    @endif
                </form>
            </div>
        </div>
    </div>
</nav>
