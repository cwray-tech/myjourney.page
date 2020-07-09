<navbar-component inline-template>
    <nav class="border-b  border-gray-300 py-6">
        <div class="container px-4 mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex items-center sm:hidden mr-3">
                    <!-- Mobile menu button-->
                    <button @click="toggleNav"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
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
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex">
                            <a href="/"
                               class="px-3 py-2 rounded-md font-medium text-grey-900 leading-5 focus:outline-none transition duration-150 ease-in-out">Home</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Journeys</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">About</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Pricing</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-0 sm:pr-0">

                    <div class="relative">
                        <input type="text"
                               class="pl-8 border focus:outline-none focus:shadow-outline md:w-64 rounded-full px-3 py-1"
                               placeholder="Search...">
                        <div class="absolute top-0 flex items-center h-full ml-2">
                            <svg id="Layer_1" class="fill-current text-gray-400 w-4" enable-background="new 0 0 128 128"
                                 viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                                <path id="Search"
                                      d="m118.828 113.172-29.036-29.037c6.366-7.633 10.208-17.441 10.208-28.135 0-24.262-19.738-44-44-44s-44 19.738-44 44 19.738 44 44 44c10.694 0 20.502-3.842 28.135-10.208l29.037 29.037c.781.781 1.805 1.172 2.828 1.172s2.047-.391 2.828-1.172c1.563-1.563 1.563-4.095 0-5.657zm-98.828-57.172c0-19.85 16.148-36 36-36s36 16.15 36 36-16.148 36-36 36-36-16.15-36-36z"/>
                            </svg>
                        </div>
                    </div>
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
                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Sign out</a>
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
        <div :class="navOpen ? 'block': 'hidden'" class="sm:hidden">
            <div class=" flex flex-col items-stretch px-2 pt-2 pb-3">
                <a href="/"
                   class="px-3 py-2 rounded-md font-medium text-grey-900 leading-5 focus:outline-none transition duration-150 ease-in-out">Home</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Journeys</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">About</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Pricing</a>
                <a href="#"
                   class="px-3 py-2 rounded-md font-medium leading-5 text-grey-600 focus:text-grey-900 focus:outline-none  transition duration-150 ease-in-out">Contact</a>
            </div>
        </div>
    </nav>
</navbar-component>
