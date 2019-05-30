<template>
  <div class="w-full bg-white view-container">
    <div class="inner">
      <ul class="w-full flex flex-wrap justify-center p-0">
        <li class="hover:cursor-pointer" v-for="teammember in projectTeamData || projectTeamDataClientView" :key="teammember.id" >
          <div class="w-full px-10 md:px-2 py-10 teammember_big text-left">
            <div class="img-wrapper relative">
              <img class="w-full h-full" :src="teammember.picture">
              <div class="img-overlay"></div>
              <div class="work-overlay"><div class="work-description"><div class="work-title" v-text="teammember.title"></div><div class="work-phone"><span>M:</span> <a :href="'tel:' + teammember.phone_number"><span v-text="teammember.phone_number"></span></a></div><div class="work-email"><span>E:</span> <a :href="'mailto:' + teammember.email"><span v-text="teammember.email"></span></a></div></div></div>
              <div class="button-holder"><a class="button">BIO & DETAILS</a></div>
              </div>
            <p class="text-black text-center name" v-text="teammember.name"></p>
            <!--<p class="text-black title" v-text="teammember.title"></p>
            <p class="text-black bio" >Bio & Details</p>-->
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
  mounted() {
    this.zoomEffect();
  },
  created() {
    let projectRequestId = this.$route.path.substring(
      this.$route.path.lastIndexOf("/") + 1
    );
    if (localStorage.projectRequests)
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
  },
  methods: {
    zoomEffect: function() {
      var win = $(window);
      var allImages = $(".teammember_big img");
      // Already visible modules in the viewport
      allImages.each(function(i, el) {
        //console.log("visible here");
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("zoom-in");
        }
      });
      // Not visible modules in the viewport
      win.scroll(function(event) {
        allImages.each(function(i, el) {
          var el = $(el);
          if (el.visible(true)) {
            el.addClass("zoom-in");
          }
        });
      });
    }
  }
};
</script>
<style <style lang="scss">
.zoom-in {
  /* start state */
  opacity: 0;
  transform: scale(0);
  animation: zoom-in 0.2s ease-in-out forwards;
}
@keyframes zoom-in {
  25% {
    opacity: 0.25;
    transform: scale(0.25);
  }
  50% {
    opacity: 0.5;
    transform: scale(0.5);
  }
  75% {
    opacity: 0.75;
    transform: scale(0.75);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
.teammember_big {
  color: #ffffff;
  .img-overlay {
    background-color: transparent;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 7px;
    left: 0;
    width: 100%;
    transition: background-color 0.25s ease-in-out;
  }
  .work-overlay {
    font-family: National-Book;
    border: none;
    background-color: transparent;
    padding: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    backface-visibility: hidden;
    transition: transform 0.15s, opacity 0.15s linear;
    transform: translate3d(0, 40%, 0);
    text-align: center;
  }
  .work-overlay .work-description .work-title:after {
    content: "";
    display: block;
    width: 50px;
    border-bottom: 2px solid #fff;
    margin: 25px auto;
  }
  .work-overlay .work-description .work-phone,
  .work-overlay .work-description .work-email {
    font-family: National-Light;
  }
  .button-holder {
    opacity: 0;
    position: absolute;
    top: auto;
    bottom: 0;
    left: 0;
    right: 0;
    height: 40px;
    text-align: center;
    transition: transform 0.35s;
    transform: translate3d(0, 50px, 0);
    .button {
      position: relative;
      padding: 0 24px;
      font-size: 13px;
      line-height: 30px;
      cursor: pointer;
      transition: all 0.25s linear;
    }
  }
  .name {
    font-size: 21px;
    font-weight: 500;
    margin-top: 24px;
  }
  .work-title {
    font-size: 18px;
    margin-top: 8px;
    text-transform: uppercase;
  }
  .bio {
    font-size: 14px;
    font-weight: 500;
    margin-top: 32px;
  }
}
.teammember_big:hover .img-overlay {
  background-color: rgba(58, 57, 57, 0.8);
}
.teammember_big:hover:hover .work-overlay {
  opacity: 1;
  transition: transform 0.35s, opacity 0.35s linear;
  transform: translate3d(0, 20%, 0);
}
.teammember_big:hover:hover .button-holder {
  opacity: 1;
  transition: transform 0.45s, opacity 0.45s linear;
  transform: translate3d(0, -30px, 0);
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


