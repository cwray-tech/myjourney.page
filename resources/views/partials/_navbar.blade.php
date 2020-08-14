<navbar-component inline-template>
    <nav v-cloak class="py-2 fixed z-50 w-full bg-white top-0 transition ease-in-out duration-200">
        <!-- Nav closer -->
        <div @click="toggleNav" :class="navOpen ? 'block' : 'hidden'" class="fixed top-0 bottom-0 right-0 left-0"></div>
        <div class="container px-2 w-full mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex items-center md:hidden mr-3">
                    <!-- Mobile menu button-->
                    <button @click="toggleNav"
                            class="inline-flex items-center justify-center p-2 rounded-md text-black focus:outline-none transition duration-150 ease-in-out"
                            aria-label="Main menu" aria-expanded="false">
                        <!-- Icon when menu is closed. -->
                        <svg v-if="!navOpen" class="block h-10 w-10" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Icon when menu is open. -->
                        <svg v-else v-cloak class="block h-10 w-10" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-start">
                    <a href="/" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="/images/devjourney.svg"
                             alt="{{ config('app.name', 'DevJourney') }}"/>
                    </a>
                    <div class="hidden md:block md:ml-6">
                        <div class="flex">
                            <a href="/"
                               class="navlink">Home</a>
                            <a href="/journeys"
                               class="navlink">Journeys</a>
                            <a href="/about"
                               class="navlink">About</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-0 md:pr-0">
                @include('.partials.user_buttons')
                @auth()
                    <!-- Profile dropdown -->
                        <dropdown-component>
                            <template v-slot:toggle>
                                <button
                                    class="flex text-sm border-transparent rounded-full focus:outline-none"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true">
                                    <img class="h-10 w-10 rounded-full" src="/images/user.svg" alt=""/>
                                </button>
                            </template>
                            <template>

                                <a href="/dashboard"
                                   class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                   role="menuitem">Dashboard</a>
                                <a href="/dashboard/journeys"
                                   class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                   role="menuitem">Your Journeys</a>
                                <a href="/dashboard/info"
                                   class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                   role="menuitem">Your Info</a>

                                <a href="/dashboard/info"
                                   class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                   role="menuitem">Your Info</a>
                                <form method="POST" class="w-full" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="block px-4 py-2 text-sm w-full leading-5 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                            role="menuitem">Sign out
                                    </button>
                                </form>


                            </template>
                        </dropdown-component>
                    @else
                        <a href="/login"
                           class="navlink"
                           role="menuitem">Login</a>
                        <a href="/register"
                           class="navlink pr-0"
                           role="menuitem">Register</a>
                    @endauth
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Menu open: "block", Menu closed: "hidden"
        -->
        <div :class="navOpen ? 'block': 'hidden'" v-cloak
             class="origin-bottom-left absolute ml-4 mt-2 bg-white w-1/2 lg:hidden rounded-md">

            <div class=" flex flex-col items-stretch pl-4 pt-2 pb-3 border border-black shadow-md rounded-md">
                <a href="/"
                   class="px-3 py-2 rounded-md font-medium  leading-5 focus:outline-none transition duration-150 ease-in-out">Home</a>
                <a href="/journeys"
                   class="px-3 py-2 rounded-md font-medium leading-5  focus:outline-none  transition duration-150 ease-in-out">Public
                    Journeys</a>
                <a href="/dashboard/journeys"
                   class="px-3 py-2 rounded-md font-medium leading-5  focus:outline-none  transition duration-150 ease-in-out">Your
                    Journeys</a>
                <a href="/about"
                   class="px-3 py-2 rounded-md font-medium leading-5  focus:outline-none  transition duration-150 ease-in-out">About</a>
                @guest
                    <a href="/login"
                       class="px-3 py-2 rounded-md font-medium leading-5  focus:outline-none  transition duration-150 ease-in-out">Login</a>
                    <a href="/register"
                       class="px-3 py-2 rounded-md font-medium leading-5  focus:outline-none  transition duration-150 ease-in-out">Register</a>
                @endguest
            </div>
        </div>
    </nav>
</navbar-component>
