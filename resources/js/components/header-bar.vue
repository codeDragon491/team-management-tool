<template>
    <div class="dashboard-header">
        <h2 class="header-customer-name">{{clientName}}</h2>
        <div class="header">
            <div class="header-menu bg-signifly-red-light">
                <logo class="header-menu-logo fill-white"></logo>
                <div class="header-button" title="Recompose team">
                    <router-link class="header-button" tag="li" to="/project-teams/create-project-team">
                        <svg class="header-button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M474.1 398.2L229.8 167.8s8.8-57.7 26.2-71.8c17.5-14.2 48-32 48-32V32c-32 0-58.8 8.3-96.9 27.3-38 18.9-66.8 47.8-74.4 55.4-7.6 7.6-18.1 19.5-24.7 28.9s-5.3 20.1-5.3 20.1l-19.7 17-4-4c-2.3-2.3-6.2-2.3-8.5 0l-36.8 36.8c-2.3 2.3-2.3 6.2 0 8.5l59.4 59.4c2.3 2.3 6.2 2.3 8.5 0l36.8-36.8c2.3-2.3 2.3-6.2 0-8.5l-10.3-10.3 14.6-14.3c6.8-3.7 25.4-8.9 39.1-5.1l214.9 267.3c8.1 8.2 20.3 8.2 28.5 0l46.8-47.1c10.3-8 10.3-22.3 2.1-28.4z"/></svg>
                        <span class="header-button-text">Recompose team</span>
                    </router-link>
                </div>
                <div @click="showModal" class="header-button" title="Send request">
                    <svg class="header-button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M48 448l416-192L48 64v149.333L346 256 48 298.667z"/></svg>
                    <span class="header-button-text">Send request</span>
                </div>
                <router-view></router-view>
            </div>
            <logo class="header-logo fill-black"></logo>
            <h1 class="header-title">{{projectTitle}}</h1>
        </div>
    </div>
</template>
<script>
import MouseStop from "../plugins/mouse-stop";
import Logo from "../components/logo.vue";
import { setTimeout } from "timers";
export default {
  name: "header-bar",
  components: { Logo },
  mounted() {
    this.displayHeaderMenu();
    //console.log(JSON.parse(localStorage.getItem('projectRequest')).project_title)
  },
  computed: {
    projectTitle: function() {
      return JSON.parse(localStorage.getItem("projectRequest")).project_title;
    },
    clientName: function() {
      return JSON.parse(localStorage.getItem("projectClient")).name;
    }
  },
  methods: {
    displayHeaderMenu: function() {
      $("body").mousemove(function(event) {
        $(".header-menu").css("top", "0");
      });
      $("body").mousestop(function(event) {
        setTimeout(function() {
          $(".header-menu").css("top", "-80px");
        }, 10000);
      });
    },
    showModal: function() {
      this.$emit("showModal");
    }
  }
};
</script>
<style>
.dashboard-header {
  z-index: 30;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 70px;
}
.header {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 70px;
  z-index: 2;
}
.header-customer-name {
  display: block;
  position: relative;
  z-index: 1;
  float: right;
  margin: 13px 40px 0 5px;
  font-size: 20px;
  line-height: 40px;
  font-weight: 300;
}
.header-menu {
  position: absolute;
  z-index: 2;
  top: -80px;
  left: 0;
  width: 100%;
  height: 70px;
  color: #fff;
  transition: top 0.5s;
  text-align: right;
}
.header-menu-logo {
  z-index: 200;
}

.header-logo,
.header-menu-logo {
  display: block;
  float: left;
  padding: 13px 40px 17px;
  position: relative;
}
.header-button {
  display: inline;
  vertical-align: middle;
  overflow: hidden;
  position: relative;
  min-width: 80px;
  height: 70px;
  margin: 0;
  padding: 5px 20px 10px;
  text-align: center;
  cursor: pointer;
  font-size: 16px;
  line-height: 55px;
}
.header-button:nth-child(3) {
  padding-right: 40px;
}
.header-menu:hover .header-button {
  opacity: 0.7;
}
.header-menu:hover .header-button:hover {
  opacity: 1;
}
.header-button-icon {
  max-width: 2rem;
  vertical-align: middle;
  margin: 0 0 0;
}
.header-button-text {
  margin-left: 10px;
  vertical-align: middle;
  font-size: 16px;
  color: white;
  display: none;
}
@media (min-width: 768px) {
  .header-button-text {
    display: inline-block;
  }
}
.header-title {
  text-align: center;
  margin: 0;
  padding: 13px 200px 0;
  font-size: 28px;
  line-height: 40px;
  font-weight: 300;
  position: relative;
  z-index: 1;
}
</style>


