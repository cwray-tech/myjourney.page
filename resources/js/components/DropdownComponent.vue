<template>
    <div class="relative z-50">
            <button  @click="toggleDropdown"
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                <slot name="toggle"></slot>
            </button>
            <div @click="toggleDropdown" v-show="dropdownOpen" class="fixed inset-0 cursor-pointer"></div>

            <transition name="fade">
                <div  v-cloak v-show="dropdownOpen"
                      class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                    <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                         aria-labelledby="user-menu">
                        <slot>

                        </slot>
                    </div>
                </div>
            </transition>

        </div>

</template>
<script>
    export default {
        data: function () {
            return {
                dropdownOpen: false
            }
        },
        methods: {
            toggleDropdown() {
                this.dropdownOpen = !this.dropdownOpen
            }
        }
    }
</script>
<style>
    .fade-leave-active {
        transition: opacity .2s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>
