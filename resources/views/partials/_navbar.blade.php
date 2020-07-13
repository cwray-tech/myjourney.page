<navbar-component inline-template>
    <nav class="py-6 fixed w-full bg-white top-0">
        <!-- Nav closer -->
        <div @click="toggleNav" :class="navOpen ? 'block' : 'hidden'" class="fixed top-0 bottom-0 right-0 left-0"></div>
        <div class="container px-4 mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex items-center md:hidden mr-3">
                    <!-- Mobile menu button-->
                    <button @click="toggleNav"
                            class="inline-flex items-center justify-center p-2 rounded-md text-black focus:outline-none transition duration-150 ease-in-out"
                            aria-label="Main menu" aria-expanded="false">
                        <!-- Icon when menu is closed. -->
                        <svg v-if="!navOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Icon when menu is open. -->
                        <svg v-else class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-start">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-auto" src="/images/devjourney.svg" alt="{{ config('app.name', 'DevJourney') }}"/>
                    </div>
                    <div class="hidden md:block md:ml-6">
                        <div class="flex">
                            <a href="/"
                               class="px-3 py-2 rounded-md font-medium text-grey-900 leading-5 focus:outline-none transition duration-150 ease-in-out">Home</a>
                            <a href="/journeys"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Journeys</a>
                            <a href="/about"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">About</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-0 md:pr-0">

                    <!-- Profile dropdown -->
                    <dropdown-component>
                        <template v-slot:toggle>
                            <button
                                class="flex ml-3 text-sm border-2 border-transparent rounded-full focus:outline-none transition duration-150 ease-in-out"
                                id="user-menu" aria-label="User menu" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full" src="/images/user.svg" alt=""/>
                            </button>
                        </template>
                        @auth()
                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Your Profile</a>
                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Settings</a>
                            <form method="POST"  class="w-full" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                   class="block px-4 py-2 text-sm w-full leading-5 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                        role="menuitem">Sign out</button>
                            </form>

                        @else
                            <a href="/login"
                               class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Login</a>
                            <a href="/register"
                               class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Register</a>
                        @endauth
                    </dropdown-component>
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Menu open: "block", Menu closed: "hidden"
        -->
        <div :class="navOpen ? 'block': 'hidden'" class="origin-bottom-left absolute ml-4 mt-2 bg-white w-1/2 lg:hidden rounded-md shadow-lg">

            <div class=" flex flex-col items-stretch pl-4 pt-2 pb-3 shadow-xs rounded-md">
                <a href="/"
                   class="px-3 py-2 rounded-md font-medium text-grey-900 leading-5 focus:outline-none transition duration-150 ease-in-out">Home</a>
                <a href="/journeys"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Journeys</a>
                <a href="/about"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">About</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Pricing</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Contact</a>
            </div>
        </div>
    </nav>
</navbar-component>
