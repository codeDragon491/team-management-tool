<template>
    <div>
      <div v-if="!this.$route.path.includes('/view-project-team')" class="md:flex main__layout" >
          <transition name="slide-fade" mode="out-in" appear >
            <side-bar></side-bar>
          </transition>
          <transition name="slide-fade" mode="out-in" appear >
            <router-view></router-view>
          </transition>
      </div>
        <div v-else v-on:mousemove="displayHeaderMenu == true" class="main__layout">
          <header-bar @showModal="showModal = true" :displayHeaderMenu="displayHeaderMenu"></header-bar>
          <transition name="slide-fade" mode="out-in" appear >
            <router-view></router-view>
          </transition>
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
      showModal: false,
      sidebar: {
        id: 0
      },
      view: {
        id: 1
      }
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
.slide-fade-enter {
  opacity: 0;
  /*transform: translateX(10px);*/
}

.slide-fade-enter-active,
.slide-fade-leave-active {
  transition: opacity 1s ease;
}

.slide-fade-leave-to {
  opacity: 0;
  /*transform: translateX(-10px);*/
}
</style>

