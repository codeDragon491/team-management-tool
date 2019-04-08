<template>
    <div>
        <side-bar></side-bar>
    </div>
</template>

<script>
import SideBar from "../components/side-bar.vue";
    export default {
        name: "App",
        components: {SideBar},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
