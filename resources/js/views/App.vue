<template>
    <div>
      <div v-if="!this.$route.path.includes('/view-project-team')" class="md:flex main__layout">
          <side-bar></side-bar>
          <router-view></router-view>
      </div>
        <div v-else v-on:mousemove="displayHeaderMenu == true" class="main__layout">
          <header-bar @showModal="showModal = true" :displayHeaderMenu="displayHeaderMenu"></header-bar>
          <router-view></router-view>
          <modal @closeModal="showModal = false" :show="showModal" :sent="false"></modal>
      </div>
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
      showModal: false
    };
  },
  mounted() {
    //console.log(this.$route.path);
    //console.log(this.teamMembers);
  }
};
</script>
<style scoped>
/* Layout */
.main__layout {
  /*min-height: 100vh;*/
}
</style>

