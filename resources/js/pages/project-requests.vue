<template>
  <div class="w-full lg:min-w-50">
    <bread-crumb first-link="project-requests" class="hidden md:flex"></bread-crumb>
      <div class="main-content m-5 text-center">
        <h1 class="my-10">PROJECT REQUESTS</h1>
        <div class="mx-auto p-5 bg-signifly-grey-lightest">
          <v-client-table class="bootstrap-scope" v-if="data.length > 0" :columns="columns" :data="data" :options="options">
            <router-link slot="url" slot-scope="props" :to="props.row.url"><svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff91a6" d="M256 105c-101.8 0-188.4 62.4-224 151 35.6 88.6 122.2 151 224 151s188.4-62.4 224-151c-35.6-88.6-122.2-151-224-151zm0 251.7c-56 0-101.8-45.3-101.8-100.7S200 155.3 256 155.3 357.8 200.6 357.8 256 312 356.7 256 356.7zm0-161.1c-33.6 0-61.1 27.2-61.1 60.4s27.5 60.4 61.1 60.4 61.1-27.2 61.1-60.4-27.5-60.4-61.1-60.4z"/></svg></router-link>
            <router-view></router-view>
            <!--<a slot="url" slot-scope="props" : href="props.row.url" target="_blank" class="glyphicon glyphicon-eye-open"></a>-->
          </v-client-table>  
          </div>         
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
export default {
  name: "project-requests",
  components: { BreadCrumb },
  data() {
    return {
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
          console.log("data here", self.initialData);
          //fill list with data
        })
        .catch(function(error) {
          console.log(error);
          // TODO error handling
        });
    }
  },
  created() {
    this.getProjectRequests();
  }
};
</script>
<style lang="scss">
.VuePagination {
  text-align: center;
  nav {
    margin: auto;
  }
}
.VuePagination__pagination {
  margin: 1.5rem;
}
.table-responsive {
  margin-bottom: 1rem;
}
.page-item.disabled .page-link {
  font-family: "Ionicons";
  font-weight: bold;
  content: "\F3D1";
}
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
.vue-pagination-ad {
  text-align: center;
}

.glyphicon.glyphicon-eye-open {
  width: 16px;
  display: block;
  margin: 0 auto;
}

th:nth-child(3) {
  text-align: center;
}
.VueTables__search {
  float: left;
  margin-bottom: 1.25rem;
}
.VueTables__search-field {
  display: flex;
  align-items: center;
}

.VueTables__limit {
  float: right;
  margin-bottom: 1.25rem;
}
.VueTables__limit-field {
  display: flex;
  align-items: center;
}
label {
  font-size: 16px;
  font-weight: 700;
  padding-right: 0.5rem;
}
#VueTables__limit_tNIWi {
  padding: 8px 15px !important;
  color: #a0aab8 !important;
}
</style>

