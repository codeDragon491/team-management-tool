<template>
    <div v-on:mousemove="displayHeaderMenu == true" class="md:flex main__layout">
        <side-bar v-if="!this.$route.path.includes('/view-project-team')"></side-bar>
        <header-bar @showModal="showModal" v-else :displayHeaderMenu="displayHeaderMenu"></header-bar>
        <router-view></router-view>
        <modal :show="show"></modal>
    </div>
</template>

<script>
import SideBar from "../components/side-bar.vue";
import HeaderBar from "../components/header-bar.vue";
import Modal from "../components/modal.vue";

export default {
  name: "App",
  components: { SideBar, HeaderBar, Modal },
  props: ["teamMembers"],
  data() {
    return {
      displayHeaderMenu: false,
      show: false
    };
  },
  mounted() {
    //console.log(this.$route.path);
    //console.log(this.teamMembers);
  },
  methods: {
    showModal: function() {
      this.show = true;
    }
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

