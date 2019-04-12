<template>
         <vue-seamless-scroll :data="listData" :class-option="classOption" class="warp">
                      <!--<div class="disabled" style="position: absolute; margin: 75px 0px 0px -30px; transform: translate(-100%, -50%);"><span class="name" style="display: block; width: 30px; height: 40px; cursor: pointer; background-color: white; text-align: center; line-height: 40px;">&lt;</span></div>
                      <div class="" style="position: absolute; margin: 75px 0px 0px 432px; transform: translateY(-50%);"><span class="name" style="display: block; width: 30px; height: 40px; cursor: pointer; background-color: white; text-align: center; line-height: 40px;">&gt;</span></div>-->
                    <ul>
                      <li v-for="item in listData">
                      <div class="w-full p-2">
                        <img class="w-full rounded-full" :src="item.imageLink">
                        <p v-text="item.fullName"></p>
                        <p v-text="item.title"></p>
                      </div>
                      </li>
                    </ul>
                  </vue-seamless-scroll>
                    	<!--<div class="paddles">
                      <button class="left-paddle paddle hidden">
                        <
                      </button>
                      <button class="right-paddle paddle">
                        >
                      </button>
	                  </div>-->
</template>
<script>
export default {
  name: "team-members",
  props: ["listData"],
  computed: {
    classOption: function() {
      return {
        limitMoveNum: 5,
        direction: 3,
        singleWidth: 134
        //autoPlay: false
      };
    }
  }
};
</script>
