<template>
    <div class="w-full xl:max-w-3xl">
       <bread-crumb first-link="project-teams" second-link="create-team" class="hidden md:flex"></bread-crumb>
       <div class="main-content m-5 text-center">
            <div class="sub-content bg-signifly-grey-lightest w-full p-5 flex flex-col">
                <div class="form-group flex flex-col items-start">
                    <label for="id_title" class="control-label">
                        Project team title<span title="required">*</span>
                    </label>
	                <input type="text" name="title" id="id_title" required="" placeholder="Project team title" class="form-control" maxlength="128">
                </div>
                <div class="form-group w-full flex flex-col">
                    <label class="control-label mr-auto">
                        Consultants<span>*</span>
                    </label>
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
                </div>
            </div>   
            <router-link class="" to="/create-team">
            <button class="cta-button">SAVE TEAM</button>
            </router-link>
             <router-view></router-view>   
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
export default {
  name: "create-team",
  components: { BreadCrumb },
  data() {
    return {
      styleObject: {
        "background-image": "url(item.imageLink)"
      },
      listData: [
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        },
        {
          fullName: "Name",
          imageLink:
            "http://team-management-tool.test/img/1545302645-mv-main.jpg",
          title: "Title",
          contactInfo: "",
          bioLink: ""
        }
      ]
    };
  },
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
<style lang="scss">
.form-group {
  padding-bottom: 1.125rem;
}
.form-control {
  display: block;
  width: 50%;
  height: 38px;
  padding: 8px 10px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  border: 1px solid #ccd1d9;
  border-radius: 4px;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
.control-label {
  font-size: 16px;
  color: #12424d;
  font-weight: 700;
}

label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
}

.paddles {
  .paddle {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 3em;
  }
  .left-paddle {
    left: 0;
  }
  .right-paddle {
    right: 0;
  }
  .hidden {
    display: none;
  }
}

.warp {
  max-width: 70rem;
  height: 250px;
  overflow: hidden;
  div:nth-of-type(3n) {
    width: 220rem !important;
  }
}
.warp ul {
  list-style: none;
  padding: 0;
  display: flex;
}
.warp ul li {
  width: 10rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-size: 15px;
}
</style>