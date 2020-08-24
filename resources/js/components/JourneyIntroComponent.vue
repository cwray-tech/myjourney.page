<template>
        <div>
            <h1 class="hover:border-yellow-500 focus:border-transparent border border-transparent rounded p-1 -m-1" contenteditable="true" @blur="updateTitle" v-text="title"></h1>
            <p class="whitespace-pre-wrap hover:border-yellow-500 focus:border-transparent border border-transparent rounded p-1 -m-1" contenteditable="true" v-text="introduction" @blur="updateIntroduction"></p>
            <div v-if="saved" class="bg-blue-200 rounded-md p-2 mt-4">Great work! Successfully saved journey intro.</div>
            <div v-if="errored" class="rounded-md bg-red-200 p-2 mt-4">Bummer, we weren't able to save that change. <span @click="updateJourney" class="underline cursor-pointer">Try again?</span></div>

            <div v-if="saving" class="fixed inset-0 z-50 bg-white opacity-75 flex items-center justify-center">
                <div class="mx-auto text-center text-5xl font-bold">Saving Journey...</div>
            </div>
        </div>
</template>
<script>
    export default {
        props: ['journey'],
        data: function () {
            return {
                title: this.journey.title,
                introduction: this.journey.introduction,
                errored: false,
                saving: false,
                saved: false
            }
        },
        methods: {
            updateTitle(event){
                if(this.title !== event.target.innerText){
                    this.title = event.target.innerText;
                    this.updateJourney();
                }
            },
            updateIntroduction(event){
                if(this.introduction !== event.target.innerText){
                    this.introduction = event.target.innerText;
                    this.updateJourney();
                }
            },
            updateJourney(){
                this.saving = true;
                axios.patch('/api/journeys/' + this.journey.slug, {
                    title: this.title,
                    introduction: this.introduction
                })
                    .then(() => {
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

