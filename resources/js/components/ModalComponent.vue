<template>
    <div>
        <transition name="fade">
            <div class="z-50">
                <div @click="toggleModal" v-if="modalOpen"
                     class="fixed z-50 inset-0 bg-black bg-opacity-25 w-full h-full"></div>
                <div v-if="modalOpen" class="fixed mx-auto z-50 right-0 bg-white left-0 top-0">
                    <div class="mx-auto container relative">
                        <div class="container text-left max-w-screen-md max-h-screen relative z-50 p-12 pb-6 mx-auto my-20">
                            <div class="mt-3 sm:text-left">
                            <h3 class="text-2xl leading-6 font-medium text-gray-900 mb-3" id="modal-headline">
                                <slot name="header"></slot>
                            </h3>
                            <p class="text-sm leading-5 text-gray-500">
                                <slot name="content"></slot>
                            </p>
                            </div>
                            <div class="mt-5 items-center flex flex-col sm:flex-row">
                                <slot name="action"></slot>
                                <button type="button" @click="toggleModal" class="sm:ml-3 w-full mt-3 sm:mt-0 sm:w-auto inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-yellow-300 focus:shadow-outline-yellow transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
                            </div>

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
        transition: opacity .3s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>
