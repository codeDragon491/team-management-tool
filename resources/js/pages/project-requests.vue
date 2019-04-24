<template>
    <div class="w-full">
       <bread-crumb first-link="project-requests" class="hidden md:flex"></bread-crumb>
          <div class="main-content text-center">
           <h1 class="my-10">NEW PROJECT REQUEST</h1>
           <div class="max-w-sm mx-auto bg-signifly-grey-lightest">
              <p class="my-10 p-5 description text-left">Hi,<span class="font-semibold"> {{clientFullname}} </span><br>
        Signifly has just composed your project team. Click the button below to view your team.
        You can recompose your team if you would like that and you are welcome to contact us if  you have any questions.</p>
          </div>
          <router-link :to="`/view-project-team/${projectRequestId}`">
          <button class="button-pink">VIEW MY TEAM</button>
          </router-link>
          <router-view></router-view>          
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
export default {
  name: "project-requests",
  components: { BreadCrumb },
  computed: {
    clientFullname: function() {
      return JSON.parse(localStorage.getItem("clientFullname"));
    },
    projectRequestId: function() {
      return JSON.parse(localStorage.getItem("projectRequest")).id;
    }
  }
};
</script>
<style>
</style>

