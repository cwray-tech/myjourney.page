<template>
    <div>
        <label :for="journey.id +'public'" title="Public Journeys are visible to everyone." class="flex items-center cursor-pointer my-6">
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
            <div class="ml-3 text-gray-700 font-medium" v-text="label">
            </div>
        </label>
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
