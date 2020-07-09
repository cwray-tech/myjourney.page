<template>
    <div class="relative">
        <div @click="toggleDropdown" >
            <slot name="toggle"></slot>
        </div>
        <div @click="toggleDropdown" v-show="dropdownOpen" class="fixed top-0 bottom-0 right-0 left-0"></div>
        <transition name="fade">
            <div v-show="dropdownOpen" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                     aria-labelledby="user-menu">
                    <slot></slot>
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
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
