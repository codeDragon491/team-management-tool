<template>
    <div class="w-full mt-21 md:mt-0 md:min-w-40">
       <bread-crumb first-link="project-teams" second-link="create-project-team" class="hidden md:flex"></bread-crumb>
       <div class="main-content m-5 text-center">
            <div class="sub-content relative bg-signifly-grey-lightest w-full p-5 flex flex-col">
              <div v-if="errors.length" class="error-wrapper flex flex-col items-start pb-5">
                <p class="text-left text-red" v-if="errors.length">
                  <b class="font-bold">Please correct the following error(s):</b>
                  <ul class="p-0">
                    <li v-for="error in errors" class="font-hairline">{{ error }}</li>
                  </ul>
                </p>
               </div>
                <div class="md:hidden load-group w-full flex flex-col items-start pb-5 w-full md:w-1/2">
                    <label for="id_title" class="control-label">
                        Project team title<span title="required">*</span>
                    </label>
	                <input v-model="projectTitle" type="text" name="title" id="id_title" placeholder="Project team title" class="w-full form-control" maxlength="128">
                </div>
                 <div class="md:hidden z-10 load-group  w-full md:ml-5 flex flex-col items-start pb-5 w-full md:w-1/2">
                    <label for="id_client" class="control-label">
                      Select client<span title="required">*</span>
                    </label>
                  <v-select class="w-full" v-model="projectClient" label="name" :options="clientList"></v-select>
                </div>
                <div class="hidden load-group w-full md:flex flex-row z-10">
                <div class="flex flex-col items-start pb-5 w-full md:w-1/2">
                    <label for="id_title" class="control-label">
                        Project team title<span title="required">*</span>
                    </label>
	                <input v-model="projectTitle" type="text" name="title" id="id_title" placeholder="Project team title" class="w-full form-control" maxlength="128">
                </div>
                 <div class="md:ml-5 flex flex-col items-start pb-5 w-full md:w-1/2">
                    <label for="id_client" class="control-label">
                      Select client<span title="required">*</span>
                    </label>
                  <v-select class="w-full" v-model="projectClient" label="name" :options="clientList"></v-select>
                </div>
                </div>
                <div class="load-group w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Consultants<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="consultantsData" @unhovered="unHover" @hovered="hover" @clicked="toggleToProjectTeam"></team-members>
                </div>
                <div class="load-group w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Designers<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="designersData" @unhovered="unHover" @hovered="hover" @clicked="toggleToProjectTeam"></team-members>
                </div>
                 <div class="load-group w-full flex flex-col pb-5">
                    <label class="control-label mr-auto">
                        Tech<span>*</span>
                    </label>
                    <team-members :projectTeam="projectTeam" :listData="techData" @unhovered="unHover" @hovered="hover" @clicked="toggleToProjectTeam"></team-members>
                </div>
            </div>
            <button v-if="!loading" @click="saveTeam" class="button-pink mt-5">SAVE TEAM</button>
            <load-button v-else class="mt-5"></load-button>
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
import TeamMembers from "../components/team-members.vue";
import Router from "../routes";
import LoadButton from "../components/load-button.vue";
export default {
  name: "create-project-team",
  components: { BreadCrumb, TeamMembers, LoadButton },
  mounted() {
    this.slideInAsScroll();
    this.addFocus();
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
    slideInAsScroll: function() {
      var self = this;
      var win = $(window);
      console.log(win.scrollTop());
      var allMods = $(".load-group");
      // Already visible modules in the viewport
      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in");
          /*if (win.scrollTop() == 0 ) {
              $(".come-in:nth-child(2)").css("animation-delay", ".5s");
              $(".come-in:nth-child(4)").css("animation-delay", "1s");
              $(".come-in:nth-child(5)").css("animation-delay", "1.5s");
              $(".come-in:nth-child(6)").css("animation-delay", "2s");
            }*/
        }
      });
      // Not visible modules in the viewport
      win.scroll(function(event) {
        allMods.each(function(i, el) {
          var el = $(el);
          if (el.visible(true)) {
            el.addClass("come-in");
          }
        });
      });
    },
    addFocus: function() {
      $(".vs__search")
        .focus(function() {
          $(this)
            .parents()
            .eq("1")
            .addClass("focus");
        })
        .blur(function() {
          $(this)
            .parents()
            .eq("1")
            .removeClass("focus");
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
        this.projectTeam.filter(teamMember => teamMember.type === "designer")
          .length < 1
      ) {
        this.errors.push("At least one designer must be selected.");
      }

      if (
        this.projectTeam.filter(teamMember => teamMember.type === "tech")
          .length < 1
      ) {
        this.errors.push("At least one techie must be selected.");
      }
    },
    hover: function(id) {
      this.projectTeam.push({ id });
      //console.log(this.projectTeam);
    },
    unHover: function(id) {
      this.projectTeam = this.projectTeam.filter(
        teamMember => teamMember.id !== id
      );
      //console.log(this.projectTeam);
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
.error-wrapper p {
  font-family: "Source Sans Pro", sans-serif;
}
.v-select {
  font-family: "Source Sans Pro", sans-serif;
  font-size: 14px;
  font-weight: 600;
}

.vs__dropdown-toggle {
  border: 1px solid #ccd1d9 !important;
}
.focus {
  border: 1px solid #081228 !important;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),
    0 0 8px rgba(102, 175, 233, 0.6);
}
.vs__selected,
.vs__search {
  height: 36px;
  padding: 8px 10px;
  margin: 0;
  line-height: 1.42857143;
  background-color: #f7f8f9;
  color: #000000;
  border: none;
  border-radius: 4px;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
.vs__search:focus {
  margin: 0;
  padding: 0 8px;
  border: none;
}
.vs__actions {
  padding-top: 2px;
}
.vs__dropdown-toggle,
.vs__selected-options {
  padding: 0;
}
.vs__clear {
  fill: #a0aab8 !important;
}
.vs__open-indicator {
  fill: #a0aab8 !important;
}
.come-in {
  opacity: 0;
  transform: translateY(150px);
  animation: come-in 0.8s ease forwards;
}
@keyframes come-in {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>