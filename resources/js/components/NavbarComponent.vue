
<script>
    export default {
        data: function() {
            return {
                navOpen:false,
                showNavbar: true,
                lastScrollPosition: 0
            }
        },
        mounted () {
            window.addEventListener('scroll', this.onScroll)
        },
        beforeDestroy () {
            window.removeEventListener('scroll', this.onScroll)
        },
        methods: {
            toggleNav() {
                this.navOpen = !this.navOpen
            },
            onScroll() {
                const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
                if (currentScrollPosition < 0) {
                    return
                }
                // Stop executing this function if the difference between
                // current scroll position and last scroll position is less than some offset
                if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 60) {
                    return
                }
                this.showNavbar = currentScrollPosition < this.lastScrollPosition
                this.lastScrollPosition = currentScrollPosition
            }
        }
    }
</script>
<style>
    .navbar--hidden {
        box-shadow: none;
        transform: translate3d(0, -100%, 0);
    }
</style>
