<template>
  <div class="w-full md:min-w-40">
    <bread-crumb first-link="project-requests" class="hidden md:flex"></bread-crumb>
      <div class="main-content m-5 text-center">
        <h1 class="my-10">PROJECT REQUESTS</h1>
        <div v-if="data.length > 0" class="mx-auto p-5 bg-signifly-grey-lightest">
          <v-client-table :columns="columns" :data="data" :options="options">
            <router-link slot="url" slot-scope="props" :to="props.row.url"><svg class="w-6 eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 105c-101.8 0-188.4 62.4-224 151 35.6 88.6 122.2 151 224 151s188.4-62.4 224-151c-35.6-88.6-122.2-151-224-151zm0 251.7c-56 0-101.8-45.3-101.8-100.7S200 155.3 256 155.3 357.8 200.6 357.8 256 312 356.7 256 356.7zm0-161.1c-33.6 0-61.1 27.2-61.1 60.4s27.5 60.4 61.1 60.4 61.1-27.2 61.1-60.4-27.5-60.4-61.1-60.4z"/></svg></router-link>
            <router-view></router-view>
          </v-client-table>  
          </div>  
          <p v-else class="mx-auto">Loading...</p>       
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
import Loader from "../components/loader.vue";
export default {
  name: "project-requests",
  components: { BreadCrumb, Loader },
  data() {
    return {
      //selector: "",
      initialData: [],
      columns: [
        "id",
        "project_title",
        "project_description",
        "created_at",
        "updated_at",
        "url"
      ],
      options: {
        headings: {
          id: "Id",
          project_title: "Project Title",
          project_description: "Project Description",
          creaated_at: "Created",
          updated_at: "Updated"
        },
        sortable: ["id", "project_title", "created_at", "updated_at"],
        filterable: ["id", "project_title", "created_at", "updated_at"]
      }
    };
  },
  /*watch: {
    // whenever selector changes, this function will run
    selector: function(newSelection, oldSelection) {
      console.log("in watcher", newSelection);
      if (newSelection == "25") console.log("in watcher", newSelection);
      $(".page-item a").each(function() {
        //console.log($(this));
        if ($(this).text() == ">") $(this).text(" ");
        else if ($(this).text() == ">>") $(this).text(" ");
        else if ($(this).text() == "<") $(this).text(" ");
        else if ($(this).text() == "<<") $(this).text(" ");
      });
    }
  },*/
  computed: {
    data: function() {
      return this.initialData;
    }
  },
  methods: {
    getProjectRequests: function() {
      var self = this;
      let clientId = this.$route.path.substring(
        this.$route.path.lastIndexOf("/") + 1
      );
      axios({
        method: "get",
        url: "/get-project-requests/" + clientId
      })
        .then(function(response) {
          self.initialData = response.data.projectRequests.map(function(
            projectRequest
          ) {
            let newProjectRequest = Object.assign({}, projectRequest);
            newProjectRequest.url = "/view-project-team/" + projectRequest.id;
            return newProjectRequest;
          });
          localStorage.setItem(
            "projectRequests",
            JSON.stringify(self.initialData)
          );
          localStorage.setItem(
            "projectClientName",
            JSON.stringify(response.data.projectClientName)
          );
          //console.log("data here", self.initialData);
          //fill list with data
        })
        .catch(function(error) {
          //console.log(error);
          // TODO error handling
        });
    },
    removeDefaultArrows: function() {
      $(".page-item a").each(function() {
        //console.log($(this));
        if ($(this).text() == ">") $(this).text(" ");
        else if ($(this).text() == ">>") $(this).text(" ");
        else if ($(this).text() == "<") $(this).text(" ");
        else if ($(this).text() == "<<") $(this).text(" ");
      });
    }
  },
  created() {
    localStorage.clear();
    this.getProjectRequests();
    self = this;
    /*setTimeout(function() {
      self.removeDefaultArrows();
    }, 100);*/
  }
  /*mounted() {
    self = this;
    setTimeout(function() {
      document
        .getElementsByTagName("select")[0]
        .setAttribute("id", "VueTables__limit");
      self.selector = document.getElementById("VueTables__limit").value;
      console.log("in mounted", self.selector);
    }, 2000);
  }*/
};
</script>
<style lang="scss">
.table-responsive {
  margin-bottom: 1rem;
}
label {
  font-size: 16px;
  font-weight: 700;
  padding-right: 0.5rem;
}
select {
  width: 4rem;
  appearance: none;
  background-image: url(/img/icons/arrow-dropdown.svg);
  background-repeat: no-repeat;
  background-position: 2rem center;
}
.eye-open {
  fill: #ff91a6;
}
.eye-open:hover,
.eye-open:focus {
  fill: #f799ab;
}
.VuePagination {
  text-align: center;
  nav {
    margin: auto;
    .VuePagination__pagination {
      margin: 1.5rem;
    }
  }
}
.vue-pagination-ad {
  text-align: center;
}

/*.page-item:first-child a:after {
  font-family: "Ionicons";
  font-weight: bold;
  content: "\f3cf\f3cf";
}
.page-item:nth-child(2) a:after {
  font-family: "Ionicons";
  font-weight: bold;
  content: "\f3cf";
}
.page-item:last-child a:after {
  font-family: "Ionicons";
  font-weight: bold;
  content: "\f3d1\f3d1";
}
.page-item:nth-last-child(2) a:after {
  font-family: "Ionicons";
  font-weight: bold;
  content: "\f3d1";
}*/
.page-item.active .page-link {
  background-color: #ffabbb !important;
  border-color: #ffabbb !important;
}
.page-link {
  color: #ffabbb;
}
.page-link:hover {
  color: #ffabbb;
}
.VueTables__search {
  float: left;
  margin-bottom: 1.25rem;
  .VueTables__search-field {
    display: flex;
    align-items: center;
  }
}
.VueTables__sortable {
  cursor: pointer;
}
.VueTables__limit {
  @media (max-width: 389px) {
    float: left;
  }
  float: right;
  margin-bottom: 1.25rem;
  .VueTables__limit-field {
    display: flex;
    align-items: center;
  }
}
</style>

