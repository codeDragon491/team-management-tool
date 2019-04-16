<template>
  <div class="w-full bg-signifly-red-light">
    <div class="mx-5">
      <ul class="w-full flex flex-wrap justify-center p-0">
        <li class="hover:cursor-pointer" v-for="teammember in projectTeamData">
          <div class="w-full px-2 py-10">
            <img class="w-full rounded-sm" :src="teammember.picture">
              <p v-text="teammember.name"></p>
              <p v-text="teammember.title"></p>
              <router-link to="" >Bio & Details</router-link>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  name: "view-project-team",
  components: {},
  data(){
    return {
      headerBar: document.getElementsByClassName(".header-menu"),
      projectTeamData: JSON.parse(localStorage.getItem('projectTeam'))
    }
  },
  mounted() {
  },
  computed: {
  }
};
</script>
<style>
</style>

