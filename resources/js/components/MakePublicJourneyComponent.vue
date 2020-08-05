<template>
    <div class="flex items-center">
        <label :for="journey.id +'public'" class="flex items-center cursor-pointer mb-0 py-2">
            <!-- toggle -->
            <div class="relative">
                <!-- input -->
                <input :id="journey.id +'public'" @change="toggle" v-model="public" type="checkbox" class="hidden"/>
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
            <img src="/images/question.svg" class="m-2 w-4">
            <span class='tooltip-text bg-blue-200 p-3 bottom-0 lg:top-0 lg:mt-10 mt-0 mb-10 lg:mb-0 right-0 lg:bottom-auto rounded'>Public Journeys are visible on the <a href="/journeys" class="underline">Journeys</a> page if published.</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['journey'],
        data: function () {
            return {
                public: this.journey.is_public,
            }
        },
        computed: {
            endpoint() {
                return '/api/make-public/journeys/' + this.journey.slug;
            },
            label() {
                return this.public ? 'Journey is Public' : 'Journey is Private'
            }
        },
        methods: {
            toggle() {
                this.public ? this.makePublic() : this.makePrivate();
            },
            makePublic() {
                axios.post(this.endpoint)
            },
            makePrivate() {
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
