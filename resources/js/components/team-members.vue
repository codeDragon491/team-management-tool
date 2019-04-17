<template>
         <vue-seamless-scroll :class-option="classOption" class="warp">
                      <!--<div class="disabled" style="position: absolute; margin: 75px 0px 0px -30px; transform: translate(-100%, -50%);"><span class="name" style="display: block; width: 30px; height: 40px; cursor: pointer; background-color: white; text-align: center; line-height: 40px;">&lt;</span></div>
                      <div class="" style="position: absolute; margin: 75px 0px 0px 432px; transform: translateY(-50%);"><span class="name" style="display: block; width: 30px; height: 40px; cursor: pointer; background-color: white; text-align: center; line-height: 40px;">&gt;</span></div>-->
                    <ul>
                      <li class="hover:cursor-pointer" v-for="item in listData" @click="$emit('clicked', item.email, item.type)">
                      <div class="w-full p-4">
                        <div class="w-full relative">
                          <img class="w-full rounded-full" :class="{'opacity-50': projectTeam.some(teamMember => teamMember.email === item.email)}" :src="item.picture">
                          <svg v-if="projectTeam.some(teamMember => teamMember.email === item.email)" class="absolute pin w-" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#90e3b6" d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z"/></svg>
                        </div>
                        <p v-text="item.name"></p>
                        <p v-text="item.title"></p>
                        </div>
                      </li>
                    </ul>
                  </vue-seamless-scroll>
</template>
<script>
export default {
  name: "team-members",
  props: ["listData", "projectTeam"],
  computed: {
    classOption: function() {
      return {
        limitMoveNum: 5,
        direction: 3
        //singleWidth: 134
        //autoPlay: false
      };
    }
  }
};
</script>
<style>
</style>

