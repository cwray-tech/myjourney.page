<template>
    <div class="flex items-center">
        <label :for="journey.id +'publish'"  class="flex items-center cursor-pointer mb-0 py-4">
            <!-- toggle -->
            <div class="relative">
                <!-- input -->
                <input :id="journey.id +'publish'" @change="toggle" v-model="published" type="checkbox" class="hidden"/>
                <!-- line -->
                <div class="toggle__line w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                <!-- dot -->
                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
            </div>
            <!-- label -->
            <div class="ml-3 font-medium" v-text="label">
            </div>
        </label>
        <div class="tooltip relative">
            <img src="/images/question.svg" class="m-3 w-4">
            <span class='tooltip-text bg-blue-200 p-3 bottom-0 lg:top-0 lg:mt-10 mt-0 mb-10 lg:mb-0 right-0 lg:bottom-auto rounded'>Published Journeys are visible to anyone with a link to the journey.</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['journey'],
        data: function () {
            return {
                published: this.journey.is_published,
            }
        },
        computed: {
            endpoint() {
                return '/api/publish/journeys/' + this.journey.slug;
            },
            label() {
                return this.published ? 'Journey is Published' : 'Publish Journey?'
            }
        },
        methods: {
            toggle() {
                this.published ? this.publish() : this.unpublish();
            },
            publish() {
                axios.post(this.endpoint)
            },
            unpublish() {
                axios.delete(this.endpoint)
            }
        }
    }
</script>

<style scoped>
    .toggle__dot {
        transition: all 0.3s ease-in-out;
    }

    input:checked ~ .toggle__dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }
</style>
