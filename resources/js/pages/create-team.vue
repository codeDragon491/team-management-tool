<template>
    <div class="w-full lg:min-w-50">
       <bread-crumb first-link="project-teams" second-link="create-team" class="hidden md:flex"></bread-crumb>
       <div class="main-content m-5 text-center">
            <div class="sub-content bg-signifly-grey-lightest w-full p-5 flex flex-col">
                <div class="form-group flex flex-col items-start">
                    <label for="id_title" class="control-label">
                        Project team title<span title="required">*</span>
                    </label>
	                <input v-model="projectTitle" type="text" name="title" id="id_title" placeholder="Project team title" class="form-control" maxlength="128">
                </div>
                <div class="form-group w-full flex flex-col">
                    <label class="control-label mr-auto">
                        Consultants<span>*</span>
                    </label>
                    <team-members :listData="consultantsData" @clicked="addToProjectTeam"></team-members>
                </div>
                <div class="form-group w-full flex flex-col">
                    <label class="control-label mr-auto">
                        Designers<span>*</span>
                    </label>
                    <team-members :listData="designersData" @clicked="addToProjectTeam"></team-members>
                </div>
                 <div class="form-group w-full flex flex-col">
                    <label class="control-label mr-auto">
                        Tech<span>*</span>
                    </label>
                    <team-members :listData="techData" @clicked="addToProjectTeam"></team-members>
                </div>
            </div>
              <button @click="saveTeam" class="cta-button mt-5">SAVE TEAM</button>
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
import TeamMembers from "../components/team-members.vue";
import Router from '../routes';
import { json } from "body-parser";
export default {
  name: "create-team",
  components: { BreadCrumb, TeamMembers },
  mounted() {
    this.filterTeamMembersData();
  },
  data() {
    return {
      projectTitle: "",
      projectTeamEmails: [],
      styleObject: {
        "background-image": "url(item.imageLink)"
      },
      consultantsData: [],
      designersData: [],
      techData: []
    };
  },
  computed: {},
  methods: {
    addToProjectTeam: function(email) {
      this.projectTeamEmails.push(email);
      console.log(this.projectTeamEmails);
    },
    saveTeam: function() {
      let data = {
        projectTitle: this.projectTitle,
        projectTeamEmails: this.projectTeamEmails
      };
      // Send a POST request
      axios({
        method: "post",
        url: "/create-project-team",
        data: data
      })
        .then(function(response) { 
          let projectRequestId = response.data.projectRequestId;
          //console.log(projectRequestId)
          Router.push({ path: `/view-project-team/${projectRequestId}` });
          window.data.projectTeam = response.data.projectTeam;
        })
        .catch(function(error) {
          console.log(error);
        });
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
  transition: transform 0.2s;
  width: 10rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-size: 15px;
}
.warp ul li:hover {
  transform: scale(1.1);
}
</style>