<template>
    <div class="w-full lg:min-w-50">
       <bread-crumb first-link="project-teams" second-link="create-project-team" class="hidden md:flex"></bread-crumb>
       <div class="main-content m-5 text-center">
            <div class="sub-content bg-signifly-grey-lightest w-full p-5 flex flex-col">
              <div class="flex flex-col items-start pb-5">
                <p class="text-left text-red" v-if="errors.length">
                  <b>Please correct the following error(s):</b>
                  <ul class="p-0">
                    <li v-for="error in errors">{{ error }}</li>
                  </ul>
                </p>
               </div>
                <div id="fist_load_group" class="flex flex-col items-start pb-5">
                    <label for="id_title" class="control-label">
                        Project team title<span title="required">*</span>
                    </label>
	                <input v-model="projectTitle" type="text" name="title" id="id_title" placeholder="Project team title" class="w-full md:w-1/2 form-control" maxlength="128">
                </div>
                 <div id="second_load_group" class="flex flex-col items-start pb-5">
                    <label for="id_client" class="control-label">
                      Select client<span title="required">*</span>
                    </label>
                  <v-select class="w-full md:w-1/2" v-model="projectClient" label="name" :options="clientList"></v-select>
                </div>
                <div id="third_load_group" class="w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Consultants<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="consultantsData" @clicked="toggleToProjectTeam"></team-members>
                </div>
                <div id="forth_load_group" class="w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Designers<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="designersData" @clicked="toggleToProjectTeam"></team-members>
                </div>
                 <div id="fifth_load_group" class="w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Tech<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="techData" @clicked="toggleToProjectTeam"></team-members>
                </div>
            </div>
            <button v-if="!loading" @click="saveTeam" class="button-pink mt-5">SAVE TEAM</button>
            <load-button v-else class="mt-5"></load-button>
       </div>
    </div>
</template>
<script>
var fired = false;
$(window).scroll(function() {
  if (!fired) {
    console.log("scrolling");
    console.log($(this).scrollTop());
  }
  if ($(this).scrollTop() > 210 && !fired) {
    fired = true;
    let tlSecond = new TimelineLite();
    tlSecond.from("#fifth_load_group", 3, {
      marginTop: "50px",
      ease: Power4.easeOut,
      opacity: 0
    });
  }
});
import BreadCrumb from "../components/bread-crumb.vue";
import TeamMembers from "../components/team-members.vue";
import Router from "../routes";
import LoadButton from "../components/load-button.vue";
export default {
  name: "create-project-team",
  components: { BreadCrumb, TeamMembers, LoadButton },
  mounted() {
    var options = {
      debug: true,
      autoTrigger: false
    };
    console.log($(document).height());
    console.log($(window).height());
    console.log($(window).scrollTop());
    if ($(window).scrollTop() === 0) {
      console.log("initial load");
      // create an animation sequence instance
      let tl = new TimelineLite();
      tl.from("#fist_load_group", 3, {
        marginTop: "50px",
        ease: Power4.easeOut,
        opacity: 0
      })
        .from(
          "#second_load_group",
          3,
          { marginTop: "50px", ease: Power4.easeOut, opacity: 0 },
          0.2
        )
        .from(
          "#third_load_group",
          3,
          { marginTop: "50px", ease: Power4.easeOut, opacity: 0 },
          0.4
        )
        .from(
          "#forth_load_group",
          3,
          { marginTop: "50px", ease: Power4.easeOut, opacity: 0 },
          0.6
        );
    }
    //this.loadElements();
    this.filterTeamMembersData();
    this.clientList = window.data.clients;
  },
  data() {
    return {
      errors: [],
      projectTitle: null,
      projectClient: null,
      projectTeam: [],
      clientList: [],
      consultantsData: [],
      designersData: [],
      techData: [],
      loading: false,
      styleObject: {
        "background-image": "url(item.imageLink)"
      }
    };
  },
  computed: {},
  methods: {
    loadElements: function() {
      $(window).scroll(function() {
        if ($(this).scrollTop() > 210) {
          console.log("scrolling");
          console.log($(this).scrollTop());
          let tlSecond = new TimelineLite();
          tlSecond.from("#fifth_load_group", 3, {
            marginTop: "50px",
            ease: Power4.easeOut,
            opacity: 0
          });
        }
      });
    },
    checkForm: function() {
      if (
        this.projectTitle &&
        this.projectClient &&
        this.projectTeam.length > 2
      ) {
        return true;
      }

      this.errors = [];

      if (!this.projectTitle) {
        this.errors.push("Project team title required.");
      }
      if (!this.projectClient) {
        this.errors.push("A client must be selected.");
      }
      if (this.projectTitle && this.projectTitle.length < 5) {
        this.errors.push("Project team must be at least five chaarcters.");
      }
      if (this.projectTitle && !this.projectTitle.match(/^[0-9a-zA-Z]+$/)) {
        this.errors.push(
          "Project team must contain only alphanumeric characters."
        );
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "consultant")
          .length < 1
      ) {
        this.errors.push("At least one consultant must be selected.");
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "consultant")
          .length > 1
      ) {
        this.errors.push("You cannot select more then one consultant.");
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "designer")
          .length < 1
      ) {
        this.errors.push("At least one designer must be selected.");
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "designer")
          .length > 1
      ) {
        this.errors.push("You cannot select more then one designer.");
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "tech")
          .length < 1
      ) {
        this.errors.push("At least one techie must be selected.");
      }
      if (
        this.projectTeam.filter(teamMember => teamMember.type === "tech")
          .length > 1
      ) {
        this.errors.push("You cannot select more then one techie.");
      }
    },
    toggleToProjectTeam: function(email, type) {
      if (!this.projectTeam.some(teamMember => teamMember.email === email)) {
        this.projectTeam.push({ email, type });
        //console.log(this.projectTeam);
      } else {
        this.projectTeam = this.projectTeam.filter(
          teamMember => teamMember.email !== email
        );
        //console.log(this.projectTeam);
      }
    },
    saveTeam: function() {
      if (this.checkForm()) {
        this.loading = true;
        localStorage.clear();
        localStorage.setItem(
          "projectClient",
          JSON.stringify(this.projectClient)
        );
        let data = {
          projectTitle: this.projectTitle,
          projectTeamEmails: this.projectTeam.map(function(teamMember) {
            delete teamMember.type;
            return teamMember;
          }),
          projectClientId: this.projectClient.id
        };
        //console.log(data);
        // Send a POST request
        axios({
          method: "post",
          url: "/create-project-team",
          data: data
        })
          .then(function(response) {
            let projectRequestId = response.data.projectRequest.id;
            //console.log(projectRequestId)
            Router.push({ path: `/view-project-team/${projectRequestId}` });
            localStorage.setItem(
              "projectRequest",
              JSON.stringify(response.data.projectRequest)
            );
            localStorage.setItem(
              "projectTeam",
              JSON.stringify(response.data.projectTeam)
            );
          })
          .catch(function(error) {
            // TODO
            // create an error page
            //console.log(error);
          });
      }
    },
    filterTeamMembersData: function() {
      let teamMembers = window.data.teamMembers;
      this.consultantsData = teamMembers.filter(
        teamMember => teamMember.type === "consultant"
      );
      this.designersData = teamMembers.filter(
        teamMember => teamMember.type === "designer"
      );
      this.techData = teamMembers.filter(
        teamMember => teamMember.type === "tech"
      );
    }
  }
};
</script>
<style lang="scss">
.form-control {
  display: block;
  height: 38px;
  padding: 8px 10px;
  font-size: 14px;
  line-height: 1.42857143;
  background-color: #f7f8f9;
  border: 1px solid #ccd1d9;
  border-radius: 4px;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
}
.control-label {
  font-size: 16px;
  font-weight: 700;
}
.vs__dropdown-toggle {
  border: 1px solid #ccd1d9 !important;
}
.vs__clear {
  fill: #a0aab8 !important;
}
.vs__open-indicator {
  fill: #a0aab8 !important;
}
</style>