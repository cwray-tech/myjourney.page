<template>
    <div>
        <transition name="fade">
            <div class="z-50">
                <div @click="toggleModal"  v-if="modalOpen"
                     class="fixed z-50 inset-0 bg-black bg-opacity-25 w-full h-full"></div>
                <div v-if="modalOpen" class="fixed mx-auto z-50 right-0 bg-white left-0 top-0">
                    <div class="mx-auto container relative">
                        <svg @click="toggleModal" class="block absolute mr-4 cursor-pointer top-0 right-0 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <div class="container max-w-screen-md max-h-screen relative z-50 p-12 pb-6 mx-auto my-20">

                            <div class="text-4xl mb-6">
                                <slot name="header"></slot>
                            </div>
                            <slot></slot>
                        </div>
                    </div>

                </div>
            </div>

        </transition>

        <div @click="toggleModal" class="cursor-pointer">
            <slot name="opener"></slot>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['color'],
        data: function () {
            return {
                modalOpen: false,
            }
        },
        methods: {
            toggleModal() {
                this.modalOpen = !this.modalOpen
            },
        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>
