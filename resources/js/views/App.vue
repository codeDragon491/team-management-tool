<template>
    <div class="md:flex main__layout">
        <side-bar></side-bar>
        <router-view></router-view>
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
<style scoped>
/* Layout */
.main__layout {
   width: 100vw;
   min-height: 100vh;
}

</style>

