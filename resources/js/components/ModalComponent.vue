<template>
    <div>
        <transition name="fade">
            <div>
                <div @click="toggleModal"  :class="modalOpen ? 'block' : 'hidden'"
                     class="fixed z-10 inset-0 bg-red-300 bg-opacity-75 w-full h-full"></div>
                <div v-bind:class="{ block: modalOpen, hidden: !modalOpen }" class="fixed mx-auto z-10 right-0 bg-white left-0 top-0">
                    <button class="absolute top-0 right-0 mt-3 mr-3 btn" @click="toggleModal">Close</button>
                    <div class="container max-w-screen-md max-h-screen relative z-50 p-12 pb-6 mx-auto my-20">

                        <div class="text-4xl">
                            <slot name="header"></slot>
                        </div>
                        <div class="bg-black h-1 my-6"></div>
                        <slot></slot>
                    </div>
                </div>
            </div>

        </transition>

        <button @click="toggleModal" class="icon-button mb-1">
            <slot name="opener"></slot>
        </button>

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
