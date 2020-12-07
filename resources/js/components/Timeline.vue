<template>
    <div class="timeline-container">
        <div class="timeline"></div>
        <div class="timeline-dot" :style="{top: `${positionTop}%`}"></div>
    </div>
</template>

<script>
const throttle = require('lodash.throttle')
export default {
    name: 'Timeline',
    data () {
        return {
            positionTop: 0
        }
    },
    mounted () {
        let passiveIfSupported = false
        try {
            const options = {
                get passive () {
                    passiveIfSupported = { passive: true }
                    return false
                }
            }
            window.addEventListener('test', null, options)
            window.removeEventListener('test', null, options)
        } catch (error) {}
        window.addEventListener('scroll', throttle(this.handleScroll, 15), passiveIfSupported)
        window.dispatchEvent(new Event('scroll'))
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll)
    },
    methods: {
        handleScroll () {
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight
            this.positionTop = (window.scrollY / height) * 50
        }
    }
}
</script>
