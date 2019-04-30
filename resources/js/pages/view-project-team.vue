<template>
  <div class="w-full bg-white view-container">
    <div class="inner">
      <ul class="w-full flex flex-wrap justify-center p-0">
        <li class="hover:cursor-pointer" v-for="teammember in projectTeamData || projectTeamDataClientView" :key="teammember.id" >
          <div class="w-full px-10 md:px-2 py-10 teammember_big text-left">
            <img class="w-full" :src="teammember.picture">
            <p class="text-black name" v-text="teammember.name"></p>
            <p class="text-black title" v-text="teammember.title"></p>
            <p class="text-black bio" >Bio & Details</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  name: "view-project-team",
  data() {
    return {
      headerBar: document.getElementsByClassName(".header-menu"),
      projectTeamDataClientView: []
    };
  },
  created() {
    let projectRequestId = this.$route.path.substring(
      this.$route.path.lastIndexOf("/") + 1
    );
    this.projectTeamDataClientView = JSON.parse(
      localStorage.getItem("projectRequests")
    ).find(
      projectRequest => projectRequest.id == projectRequestId
    ).team_member_log;
  },
  computed: {
    projectTeamData: function() {
      return JSON.parse(localStorage.getItem("projectTeam"));
    }
  }
};
</script>
<style <style lang="scss">
.teammember_big {
  .name {
    font-size: 21px;
    font-weight: 500;
    margin-top: 24px;
  }
  .title {
    font-size: 18px;
    margin-top: 8px;
  }
  .bio {
    font-size: 14px;
    font-weight: 500;
    margin-top: 32px;
  }
}
.view-container {
  position: absolute;
  top: 140px;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  transition: top 0.5s;
  .inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
  }
}
@media (min-width: 768px) {
  .view-container {
    top: 70px;
  }
}
</style>


