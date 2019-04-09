<template>
    <div class="w-full">
       <bread-crumb first-link="project-teams" second-link="create-team" class="hidden md:flex"></bread-crumb>
       <div class="main-content text-center">
           <h1 class="my-10">CREATE TEAM</h1>
            <router-link class="" to="/create-team">
              <button class="cta-button">SAVE TEAM</button>
            </router-link>
             <router-view></router-view>
        <div class="sub-content">
        </div>      
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
export default {
  name: "create-team",
  components: { BreadCrumb }
};
</script>
<style>
</style>