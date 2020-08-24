<template>
    <div>
        <h2 style="margin-top: 0px;" class="hover:border-yellow-500 focus:border-transparent border border-transparent rounded p-1 -m-1" contenteditable="true" @blur="updateTitle" v-text="title"></h2>
        <p contenteditable="true" @blur="updateDescription" v-text="description" class="whitespace-pre-wrap hover:border-yellow-500 focus:border-transparent border border-transparent rounded p-1 -m-1"></p>
        <div v-if="saved" class="bg-blue-200 rounded-md p-2 mt-4">Great work! Successfully saved this step on your journey.</div>
        <div v-if="errored" class="rounded-md bg-red-200 p-2 mt-4">Bummer, we weren't able to save that change. <span
            @click="updateStep" class="underline cursor-pointer">Try again?</span></div>
        <div v-if="saving" class="fixed inset-0 z-50 bg-white opacity-75 flex items-center justify-center">
            <div class="mx-auto text-center text-5xl">Saving Journey...</div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['step'],
        data: function () {
            return {
                title: this.step.title,
                description: this.step.description,
                errored: false,
                saving: false,
                saved: false
            }
        },
        methods: {
            updateTitle(event) {
                if (this.title !== event.target.innerText) {
                    this.title = event.target.innerText;
                    this.updateStep();
                }
            },
            updateDescription(event) {
                if (this.description !== event.target.innerText) {
                    this.description = event.target.innerText;
                    this.updateStep();
                }
            },
            updateStep() {
                this.saving = true;
                this.saved = false;
                axios.patch('/api/steps/' + this.step.id, {
                    title: this.title,
                    description: this.description
                }).then(() => {
                        this.errored = false;
                        this.saved = true;
                    })
                    .catch(error => {
                        this.saved = false;
                        this.errored = true;
                    })
                    .finally(() => this.saving = false)
            }
        }
    }
</script>

