
<script>
    export default {
        data: function() {
            return {
                navOpen:false,
            }
        },
        methods: {
            toggleNav() {
                this.navOpen = !this.navOpen
            }
        }
    }
</script>
<!--
    Mobile menu, show/hide based on mobile menu state.

                      Entering: "duration-200 ease-out"
    From: "opacity-0 scale-95"
    To: "opacity-100 scale-100"
    Leaving: "duration-100 ease-in"
    From: "opacity-100 scale-100"
    To: "opacity-0 scale-95"
    -->
<style>

    .menu-enter-active, .menu-leave-active {
        transition: opacity .2s ease-in-out;
    }
    .menu-enter, .menu-leave-to {
        opacity: 0;
    }
</style>
