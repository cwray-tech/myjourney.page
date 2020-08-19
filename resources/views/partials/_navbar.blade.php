<navbar-component inline-template>
    <nav class="bg-white shadow z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="toggleNav"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                aria-label="Main menu" aria-expanded="false">
                            <!-- Icon when menu is closed. -->
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg v-if="!navOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <!-- Icon when menu is open. -->
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg v-if="navOpen" v-cloak class=" h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <svg class="h-8 w-auto sm:h-10 text-yellow-600 fill-current" viewBox="0 0 512.016 512.016"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M453.47 1.565a27.282 27.282 0 00-9.035-1.549c-15.123 0-27.427 12.361-27.427 27.555v52.451H206.292c-7.346 0-14.252 2.861-19.445 8.055l-20 20c-4.873 4.875-12.805 4.875-17.678 0l-20-19.999c-5.193-5.194-12.1-8.056-19.445-8.056H95.008V27.571a27.615 27.615 0 00-11.63-22.488c-7.33-5.197-16.383-6.481-24.831-3.517C23.534 13.843.008 47.034.008 84.157v340.359c0 48.248 39.252 87.5 87.5 87.5h204.591c7.346 0 14.251-2.86 19.445-8.054l20-20c4.873-4.875 12.805-4.875 17.678 0l20 20c5.194 5.193 12.1 8.054 19.445 8.054h35.841c18.216 0 35.678-5.545 50.499-16.034a7.5 7.5 0 00-8.666-12.244c-12.273 8.687-26.738 13.278-41.833 13.278h-35.841c-3.339 0-6.478-1.3-8.838-3.661l-20-20c-10.723-10.721-28.17-10.721-38.893 0l-20 20a12.414 12.414 0 01-8.838 3.661H87.508c-39.977 0-72.5-32.523-72.5-72.5 0-34.293 24.343-64.164 57.88-71.027 12.817-2.622 22.12-13.9 22.12-26.816v-50.989c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v50.989c0 5.917-4.164 10.901-10.127 12.121-22.984 4.703-42.39 18.354-54.873 36.85V84.157c0-30.762 19.491-58.264 48.502-68.437 3.801-1.331 7.88-.749 11.192 1.599 3.372 2.391 5.306 6.128 5.306 10.252v218.112c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5V95.022h14.716c3.339 0 6.478 1.3 8.838 3.662l20 20c5.361 5.361 12.404 8.041 19.446 8.041s14.085-2.68 19.446-8.041l20-20.001a12.414 12.414 0 018.838-3.661h210.716v97.218c0 7.346 2.86 14.251 8.054 19.445l20 20a12.417 12.417 0 013.662 8.839c0 3.338-1.301 6.478-3.662 8.838l-20 20.001c-5.193 5.194-8.054 12.101-8.054 19.445v37.864c0 12.916 9.303 24.194 22.119 26.816 33.538 6.863 57.881 36.734 57.881 71.027 0 14.622-4.33 28.711-12.522 40.744a7.503 7.503 0 006.193 11.722 7.494 7.494 0 006.207-3.28c9.893-14.532 15.122-31.541 15.122-49.186V84.157c0-37.122-23.524-70.314-58.538-82.592zm-11.336 337.229c-5.962-1.22-10.126-6.204-10.126-12.121v-37.864c0-3.339 1.3-6.479 3.661-8.839l20-20c10.722-10.723 10.722-28.169 0-38.892l-20-20a12.583 12.583 0 01-3.661-8.838V27.571c0-6.923 5.574-12.555 12.427-12.555 1.368 0 2.738.237 4.072.704 29.01 10.173 48.501 37.676 48.501 68.437v291.486c-12.483-18.496-31.889-32.146-54.874-36.849z"/>
                            <path
                                d="M207.508 183.062c0-20.678-16.822-37.5-37.5-37.5s-37.5 16.822-37.5 37.5 16.822 37.5 37.5 37.5 37.5-16.822 37.5-37.5zm-37.5 22.5c-12.406 0-22.5-10.094-22.5-22.5s10.094-22.5 22.5-22.5 22.5 10.094 22.5 22.5-10.094 22.5-22.5 22.5zM377.312 319.584a7.502 7.502 0 00-10.607 0l-14.696 14.696-14.696-14.696a7.5 7.5 0 00-10.607 10.607l14.696 14.696-14.696 14.696a7.5 7.5 0 1010.608 10.607l14.696-14.696 14.696 14.696c1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196a7.5 7.5 0 000-10.607l-14.696-14.696 14.696-14.696a7.502 7.502 0 00-.002-10.607zM240.008 190.562h7.5c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-7.5c-4.143 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5zM355.587 231.255a7.502 7.502 0 007.863-7.119c.038-.771.058-1.547.058-2.327a46.17 46.17 0 00-2.479-14.971 7.5 7.5 0 10-14.193 4.853 31.189 31.189 0 011.633 11.7 7.5 7.5 0 007.118 7.864zM299.207 183.062c0-4.143-3.357-7.5-7.5-7.5h-14.733c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h14.733c4.143 0 7.5-3.357 7.5-7.5zM310.027 260.554c0-4.143-3.357-7.5-7.5-7.5h-14.732c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h14.732a7.5 7.5 0 007.5-7.5zM335.187 194.953a7.5 7.5 0 003.48-14.148 45.872 45.872 0 00-16.756-5.011 7.5 7.5 0 00-1.492 14.926 30.892 30.892 0 0111.299 3.378 7.483 7.483 0 003.469.855zM331.641 265.302a7.48 7.48 0 002.782-.538 46.077 46.077 0 0014.704-9.438 7.501 7.501 0 00-10.336-10.872 31.134 31.134 0 01-9.937 6.382 7.5 7.5 0 00-4.18 9.748 7.505 7.505 0 006.967 4.718zM209.038 444.763a7.52 7.52 0 002.021-.278 53.68 53.68 0 0015.482-7.132 7.5 7.5 0 002.054-10.405c-2.308-3.441-6.968-4.361-10.405-2.054a38.725 38.725 0 01-11.164 5.144 7.5 7.5 0 002.012 14.725zM199.396 268.054h14.732c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-14.732c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5zM162.664 434.552a53.851 53.851 0 0014.788 8.46 7.505 7.505 0 002.646.484 7.5 7.5 0 002.649-14.519 38.908 38.908 0 01-10.677-6.108 7.5 7.5 0 00-9.406 11.683zM237.68 415.375a7.48 7.48 0 002.555.451 7.504 7.504 0 007.052-4.946 53.785 53.785 0 003.195-16.732 7.499 7.499 0 00-7.5-7.73 7.5 7.5 0 00-7.492 7.271 38.86 38.86 0 01-2.305 12.08 7.499 7.499 0 004.495 9.606zM150.008 323.673c4.143 0 7.5-3.357 7.5-7.5V301.44c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v14.733a7.5 7.5 0 007.5 7.5zM142.508 360.372c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-14.733c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5zM164.953 279.054a31.23 31.23 0 019.218-7.397 7.5 7.5 0 00-7.012-13.26 46.203 46.203 0 00-13.626 10.931 7.5 7.5 0 005.706 12.363 7.481 7.481 0 005.714-2.637zM142.508 392.47c0 4.703.606 9.375 1.804 13.886a7.504 7.504 0 007.244 5.578 7.5 7.5 0 007.254-9.426 39.19 39.19 0 01-1.302-10.038v-2.633c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5zM258.328 253.054h-14.732c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h14.732c4.143 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM254.246 368.798a31.276 31.276 0 017.483-9.151 7.498 7.498 0 00.943-10.564 7.497 7.497 0 00-10.564-.943 46.227 46.227 0 00-11.056 13.522 7.5 7.5 0 1013.194 7.136zM284.508 352.387h7.5c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-7.5c-4.143 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"/>
                        </svg>
                    </a>
                    <div class="hidden md:ml-6 md:flex">
                        @guest
                        <a href="/"
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-yellow-500 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-yellow-700 transition duration-150 ease-in-out">
                            Home
                        </a>
                        <a href="{{ route('journeys.index') }}"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Public Journeys
                        </a>
                        <a href="{{ route('dashboard') }}"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                        <a href="{{ route('user-journeys') }}"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Your Journeys
                        </a>
                            @else
                            <a href="{{ route('dashboard') }}"
                               class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Dashboard
                            </a>
                            <a href="{{ route('user-journeys') }}"
                               class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Your Journeys
                            </a>
                            <a href="{{ route('journeys.index') }}"
                               class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Public Journeys
                            </a>
                            @endguest

                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                           class="whitespace-no-wrap mr-6 text-base font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
                            Sign in
                        </a>
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('register') }}"
                                class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-orange active:bg-yellow-700 transition ease-in-out duration-150">
                            Sign up
                            </a>
                        </span>
                    @else
                    <div class="flex-shrink-0">
                        <a href="{{ route('journeys.create') }}"
                                class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-yellow-600 shadow-sm hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-orange active:bg-yellow-700 transition ease-in-out duration-150">
                            <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>New Journey</span>
                        </a>
                    </div>
                    <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                            <dropdown-component>
                                <template v-slot:toggle>
                                    <svg class="h-10 w-10 text-yellow-500  fill-current rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 480">
                                        <path d="M240 0C107.664 0 0 107.664 0 240c0 57.96 20.656 111.184 54.992 152.704.088.12.096.272.192.384 24.792 29.896 55.928 52.816 90.624 67.624.4.168.792.352 1.192.52 2.808 1.184 5.648 2.28 8.496 3.352 1.12.424 2.24.856 3.376 1.264 2.456.88 4.928 1.712 7.416 2.512 1.592.512 3.184 1.016 4.792 1.496 2.2.656 4.408 1.288 6.632 1.888 1.952.528 3.92 1.016 5.888 1.488 1.992.48 3.992.96 6 1.384 2.24.48 4.504.904 6.776 1.32 1.824.336 3.64.688 5.48.984 2.52.408 5.056.728 7.6 1.056 1.64.208 3.272.448 4.92.624 2.88.304 5.784.52 8.696.72 1.352.096 2.696.24 4.056.312 4.248.24 8.544.368 12.872.368s8.624-.128 12.888-.352c1.36-.072 2.704-.216 4.056-.312 2.912-.208 5.816-.416 8.696-.72 1.648-.176 3.28-.416 4.92-.624 2.544-.328 5.08-.648 7.6-1.056 1.832-.296 3.656-.648 5.48-.984 2.264-.416 4.528-.84 6.776-1.32 2.008-.432 4-.904 6-1.384 1.968-.48 3.936-.968 5.888-1.488a232.661 232.661 0 0011.424-3.384c2.488-.8 4.96-1.632 7.416-2.512 1.128-.408 2.248-.84 3.376-1.264a243.168 243.168 0 008.496-3.352c.4-.168.792-.352 1.192-.52a239.997 239.997 0 0090.624-67.624c.096-.112.104-.272.192-.384C459.344 351.184 480 297.96 480 240 480 107.664 372.336 0 240 0zm97.256 441.76c-.12.056-.232.12-.352.176-2.856 1.376-5.76 2.672-8.688 3.936-.664.28-1.32.568-1.984.848a217.023 217.023 0 01-7.76 3.064 159.85 159.85 0 01-3.272 1.192 230.572 230.572 0 01-6.976 2.368c-1.456.464-2.92.904-4.384 1.336a202.08 202.08 0 01-6.28 1.784c-1.776.472-3.568.904-5.36 1.328-1.88.448-3.752.904-5.648 1.304-2.072.44-4.16.816-6.24 1.192-1.688.312-3.368.64-5.072.912-2.344.368-4.712.664-7.072.96-1.496.192-2.984.416-4.496.576-2.696.288-5.416.472-8.128.664-1.208.08-2.408.216-3.632.28-3.96.208-7.928.32-11.912.32s-7.952-.112-11.904-.32c-1.216-.064-2.416-.192-3.632-.28-2.72-.184-5.432-.376-8.128-.664-1.512-.16-3-.384-4.496-.576-2.36-.296-4.728-.592-7.072-.96-1.704-.272-3.384-.6-5.072-.912-2.088-.376-4.176-.76-6.24-1.192-1.896-.4-3.776-.856-5.648-1.304-1.792-.432-3.584-.856-5.36-1.328-2.104-.56-4.2-1.168-6.28-1.784a212.543 212.543 0 01-4.384-1.336 223.256 223.256 0 01-6.976-2.368 217.023 217.023 0 01-11.032-4.256c-.664-.272-1.312-.56-1.976-.84a223.812 223.812 0 01-8.696-3.936 7.216 7.216 0 01-.352-.176c-27.912-13.504-52.568-32.672-72.576-55.952 15.464-56.944 59.24-102.848 115.56-121.112 1.112.68 2.272 1.288 3.416 1.928.672.376 1.336.776 2.016 1.136a99.592 99.592 0 007.272 3.512c1.896.832 3.856 1.536 5.808 2.256.384.136.768.288 1.152.424 10.848 3.84 22.456 6.04 34.6 6.04s23.752-2.2 34.592-6.04c.384-.136.768-.288 1.152-.424 1.952-.72 3.912-1.424 5.808-2.256a99.592 99.592 0 007.272-3.512c.68-.368 1.344-.76 2.016-1.136 1.144-.64 2.312-1.248 3.432-1.936 56.32 18.272 100.088 64.176 115.56 121.112-20.008 23.272-44.664 42.44-72.576 55.952zM152 176c0-48.52 39.48-88 88-88s88 39.48 88 88c0 30.864-16.008 58.024-40.128 73.736a84.742 84.742 0 01-9.8 5.48c-.4.192-.792.392-1.192.576-23.168 10.536-50.592 10.536-73.76 0-.4-.184-.8-.384-1.192-.576a84.083 84.083 0 01-9.8-5.48C168.008 234.024 152 206.864 152 176zm269.832 194.584c-18.136-53.552-59.512-96.832-112.376-117.392C330.6 234.144 344 206.64 344 176c0-57.344-46.656-104-104-104s-104 46.656-104 104c0 30.64 13.4 58.144 34.552 77.192-52.864 20.568-94.24 63.84-112.376 117.392C31.672 333.792 16 288.704 16 240 16 116.488 116.488 16 240 16s224 100.488 224 224c0 48.704-15.672 93.792-42.168 130.584z"/>
                                    </svg>
                                </template>
                                <template>
                                    <a href="{{ route('info') }}"
                                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                       role="menuitem">Your Info</a>
                                    <a href="{{ route('user-journeys') }}"
                                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                       role="menuitem">Your Journeys</a>
                                    <form method="POST" class="w-full" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                role="menuitem">Sign out
                                        </button>
                                    </form>
                                </template>
                            </dropdown-component>

                    </div>
                    @endguest
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Menu open: "block", Menu closed: "hidden"
        -->
        <div v-if="navOpen" v-cloak class="md:hidden">
            <div class="pt-2 pb-3">
                <a href="/"
                   class="block pl-3 pr-4 py-2 border-l-4 border-yellow-500 text-base font-medium text-yellow-700 bg-yellow-50 focus:outline-none focus:text-yellow-800 focus:bg-yellow-100 focus:border-yellow-700 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">Home</a>
                <a href="{{route('journeys.index')}}"
                   class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">Public
                    Journeys</a>
                <a href="{{ route('dashboard') }}"
                   class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">Dashboard</a>
                <a href="{{ route('user-journeys') }}"
                   class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">Your
                    Journeys</a>
            </div>
            @auth
            <div class="pt-4 pb-3 border-t border-gray-200">

                    <div class="flex items-center px-4 sm:px-6">
                        <div class="flex-shrink-0">
                            <svg class="h-10 w-10 rounded-full" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 480 480">
                                <path
                                    d="M240 0C107.664 0 0 107.664 0 240c0 57.96 20.656 111.184 54.992 152.704.088.12.096.272.192.384 24.792 29.896 55.928 52.816 90.624 67.624.4.168.792.352 1.192.52 2.808 1.184 5.648 2.28 8.496 3.352 1.12.424 2.24.856 3.376 1.264 2.456.88 4.928 1.712 7.416 2.512 1.592.512 3.184 1.016 4.792 1.496 2.2.656 4.408 1.288 6.632 1.888 1.952.528 3.92 1.016 5.888 1.488 1.992.48 3.992.96 6 1.384 2.24.48 4.504.904 6.776 1.32 1.824.336 3.64.688 5.48.984 2.52.408 5.056.728 7.6 1.056 1.64.208 3.272.448 4.92.624 2.88.304 5.784.52 8.696.72 1.352.096 2.696.24 4.056.312 4.248.24 8.544.368 12.872.368s8.624-.128 12.888-.352c1.36-.072 2.704-.216 4.056-.312 2.912-.208 5.816-.416 8.696-.72 1.648-.176 3.28-.416 4.92-.624 2.544-.328 5.08-.648 7.6-1.056 1.832-.296 3.656-.648 5.48-.984 2.264-.416 4.528-.84 6.776-1.32 2.008-.432 4-.904 6-1.384 1.968-.48 3.936-.968 5.888-1.488a232.661 232.661 0 0011.424-3.384c2.488-.8 4.96-1.632 7.416-2.512 1.128-.408 2.248-.84 3.376-1.264a243.168 243.168 0 008.496-3.352c.4-.168.792-.352 1.192-.52a239.997 239.997 0 0090.624-67.624c.096-.112.104-.272.192-.384C459.344 351.184 480 297.96 480 240 480 107.664 372.336 0 240 0zm97.256 441.76c-.12.056-.232.12-.352.176-2.856 1.376-5.76 2.672-8.688 3.936-.664.28-1.32.568-1.984.848a217.023 217.023 0 01-7.76 3.064 159.85 159.85 0 01-3.272 1.192 230.572 230.572 0 01-6.976 2.368c-1.456.464-2.92.904-4.384 1.336a202.08 202.08 0 01-6.28 1.784c-1.776.472-3.568.904-5.36 1.328-1.88.448-3.752.904-5.648 1.304-2.072.44-4.16.816-6.24 1.192-1.688.312-3.368.64-5.072.912-2.344.368-4.712.664-7.072.96-1.496.192-2.984.416-4.496.576-2.696.288-5.416.472-8.128.664-1.208.08-2.408.216-3.632.28-3.96.208-7.928.32-11.912.32s-7.952-.112-11.904-.32c-1.216-.064-2.416-.192-3.632-.28-2.72-.184-5.432-.376-8.128-.664-1.512-.16-3-.384-4.496-.576-2.36-.296-4.728-.592-7.072-.96-1.704-.272-3.384-.6-5.072-.912-2.088-.376-4.176-.76-6.24-1.192-1.896-.4-3.776-.856-5.648-1.304-1.792-.432-3.584-.856-5.36-1.328-2.104-.56-4.2-1.168-6.28-1.784a212.543 212.543 0 01-4.384-1.336 223.256 223.256 0 01-6.976-2.368 217.023 217.023 0 01-11.032-4.256c-.664-.272-1.312-.56-1.976-.84a223.812 223.812 0 01-8.696-3.936 7.216 7.216 0 01-.352-.176c-27.912-13.504-52.568-32.672-72.576-55.952 15.464-56.944 59.24-102.848 115.56-121.112 1.112.68 2.272 1.288 3.416 1.928.672.376 1.336.776 2.016 1.136a99.592 99.592 0 007.272 3.512c1.896.832 3.856 1.536 5.808 2.256.384.136.768.288 1.152.424 10.848 3.84 22.456 6.04 34.6 6.04s23.752-2.2 34.592-6.04c.384-.136.768-.288 1.152-.424 1.952-.72 3.912-1.424 5.808-2.256a99.592 99.592 0 007.272-3.512c.68-.368 1.344-.76 2.016-1.136 1.144-.64 2.312-1.248 3.432-1.936 56.32 18.272 100.088 64.176 115.56 121.112-20.008 23.272-44.664 42.44-72.576 55.952zM152 176c0-48.52 39.48-88 88-88s88 39.48 88 88c0 30.864-16.008 58.024-40.128 73.736a84.742 84.742 0 01-9.8 5.48c-.4.192-.792.392-1.192.576-23.168 10.536-50.592 10.536-73.76 0-.4-.184-.8-.384-1.192-.576a84.083 84.083 0 01-9.8-5.48C168.008 234.024 152 206.864 152 176zm269.832 194.584c-18.136-53.552-59.512-96.832-112.376-117.392C330.6 234.144 344 206.64 344 176c0-57.344-46.656-104-104-104s-104 46.656-104 104c0 30.64 13.4 58.144 34.552 77.192-52.864 20.568-94.24 63.84-112.376 117.392C31.672 333.792 16 288.704 16 240 16 116.488 116.488 16 240 16s224 100.488 224 224c0 48.704-15.672 93.792-42.168 130.584z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-9 text-gray-800">{{ auth()->user()->name }}</div>
                            <div class="text-sm font-medium leading-5 text-gray-500">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('info') }}"
                           class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out sm:px-6">Your
                            Info</a>
                        <a href="{{ route('user-journeys') }}"
                           class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out sm:px-6">Your Journeys</a>
                        <form method="POST" class="w-full" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left mt-1 px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out sm:px-6"
                                    role="menuitem">Sign out
                            </button>
                        </form>
                    </div>

            </div>
            @endauth
        </div>
    </nav>
</navbar-component>

