<template>
    <div class="fixed bottom-0 z-50 right-0 left-0">
            <div id="player" class="journey-player w-20">
                <img src="/images/jeep.png" alt="MyJourney Player">
            </div>
    </div>
</template>

<script>
    export default {
        name: "TimelineComponent.vue"
    }
    window.onscroll = function() {myFunction()};

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("player").style.left = scrolled + "%";
    }
</script>

<style scoped>
 .journey-player{
    position: absolute;
     left: 0;
     bottom:0;
}
</style>
