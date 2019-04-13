<template>
    <div class="md:flex main__layout">
        <router-view></router-view>
    </div>
</template>

<script>
import TopBar from "../components/top-bar.vue";
export default {
  name: "TeamDisplay",
  components: { TopBar },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
<style scoped>
/* Layout */
.main__layout {
  width: 100vw;
  min-height: 100vh;
}
</style>

