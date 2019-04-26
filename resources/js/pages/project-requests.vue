<template>
    <div class="w-full">
       <bread-crumb first-link="project-requests" class="hidden md:flex"></bread-crumb>
          <div class="main-content text-center">
           <h1 class="my-10">NEW PROJECT REQUEST</h1>
           <div class="mx-auto bg-signifly-grey-lightest">
                 <DataTable
      :header-fields="headerFields"
      :sort-field="sortField"
      :sort="sort"
      :data="data || []"
      :is-loading="isLoading"
      :css="datatableCss"
      not-found-msg="Items not found"
      @onUpdate="dtUpdateSort"
      trackBy="firstName"
    >
      <input
        slot="actions"
        slot-scope="props"
        type="button"
        class="btn btn-info"
        value="Edit"
        @click="dtEditClick(props);"
      />
      <Pagination
        slot="pagination"
        :page="currentPage"
        :total-items="totalItems"
        :items-per-page="itemsPerPage"
        :css="paginationCss"
        @onUpdate="changePage"
        @updateCurrentPage="updateCurrentPage"
      />
      <div class="items-per-page" slot="ItemsPerPage">
        <label>Items per page</label>
        <ItemsPerPageDropdown
          :list-items-per-page="listItemsPerPage"
          :items-per-page="itemsPerPage"
          :css="itemsPerPageCss"
          @onUpdate="updateItemsPerPage"
        />
      </div>
      <Spinner slot="spinner" />
    </DataTable>
              <!--<p class="my-10 p-5 description text-left">Hi,<span class="font-semibold"> {{clientFullname}} </span><br>
        Signifly has just composed your project team. Click the button below to view your team.
        You can recompose your team if you would like that and you are welcome to contact us if  you have any questions.</p>-->
          </div>
          <router-link :to="`/view-project-team/${projectRequestId}`">
          <button class="button-pink">VIEW MY TEAM</button>
          </router-link>
          <router-view></router-view>          
       </div>
    </div>
</template>
<script>
import BreadCrumb from "../components/bread-crumb.vue";
//import Spinner from "vue-simple-spinner";
import { DataTable, ItemsPerPageDropdown, Pagination } from "v-datatable-light";
//import orderBy from "lodash.orderby";

const addZero = value => ("0" + value).slice(-2);

const formatDate = value => {
  if (value) {
    const dt = new Date(value);
    return `${addZero(dt.getDate())}/${addZero(
      dt.getMonth() + 1
    )}/${dt.getFullYear()}`;
  }
  return "";
};

//const initialData = [];
export default {
  name: "project-requests",
  components: { BreadCrumb, DataTable, ItemsPerPageDropdown, Pagination },
  data() {
    return {
      initialData: [],
      headerFields: [
        "__slot:checkboxes",
        {
          name: "id",
          label: "Id",
          sortable: true
        },
        {
          name: "projectTitle",
          label: "Project Title",
          sortable: true
        },
        {
          name: "projectDescription",
          label: "Project Description",
          sortable: false
        },
        {
          name: "created",
          label: "Created",
          sortable: true,
          format: formatDate
        },
        {
          name: "updated",
          label: "Updated",
          sortable: true,
          format: formatDate
        },
        "__slot:actions"
      ],
      data: this.initialData.slice(0, 10),
      datatableCss: {
        table: "table table-bordered table-hover table-striped table-center",
        th: "header-item",
        thWrapper: "th-wrapper",
        thWrapperCheckboxes: "th-wrapper checkboxes",
        arrowsWrapper: "arrows-wrapper",
        arrowUp: "arrow up",
        arrowDown: "arrow down",
        footer: "footer"
      },
      paginationCss: {
        paginationItem: "pagination-item",
        moveFirstPage: "move-first-page",
        movePreviousPage: "move-previous-page",
        moveNextPage: "move-next-page",
        moveLastPage: "move-last-page",
        pageBtn: "page-btn"
      },
      itemsPerPageCss: {
        select: "item-per-page-dropdown"
      },
      isLoading: false,
      sort: "asc",
      sortField: "projectTitle",
      listItemsPerPage: [5, 10, 20, 50, 100],
      itemsPerPage: 10,
      currentPage: 1,
      totalItems: 16
    };
  },
  mounted() {
    this.getProjectRequests();
  },
  computed: {
    clientFullname: function() {
      return "Test";
      //return JSON.parse(localStorage.getItem("clientFullname"));
    },
    projectRequestId: function() {
      //return JSON.parse(localStorage.getItem("projectRequest")).id;
      return "Test";
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
          self.initialData = response.data.projectRequests;
          console.log(self.initialData);
          //fill list with data
          //$("h3").text("Wooo");
          //$(".modal-body").text("Team was sent succesfully to client");
        })
        .catch(function(error) {
          console.log(error);
          // TODO error handling
        });
    },

    dtEditClick: props => alert("Click props:" + JSON.stringify(props)),

    dtUpdateSort: function({ sortField, sort }) {
      const sortedData = orderBy(this.initialData, [sortField], [sort]);
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = this.currentPage * this.itemsPerPage;
      this.data = sortedData.slice(start, end);
      console.log("load data based on new sort", this.currentPage);
    },

    updateItemsPerPage: function(itemsPerPage) {
      this.itemsPerPage = itemsPerPage;
      if (itemsPerPage >= this.initialData.length) {
        this.data = this.initialData;
      } else {
        this.data = this.initialData.slice(0, itemsPerPage);
      }
      console.log("load data with new items per page number", itemsPerPage);
    },

    changePage: function(currentPage) {
      this.currentPage = currentPage;
      const start = (currentPage - 1) * this.itemsPerPage;
      const end = currentPage * this.itemsPerPage;
      this.data = this.initialData.slice(start, end);
      console.log("load data for the new page", currentPage);
    },

    updateCurrentPage: function(currentPage) {
      this.currentPage = currentPage;
      console.log("update current page without need to load data", currentPage);
    }
  }
};
</script>
<style>
.items-per-page {
  height: 100%;
  display: flex;
  align-items: center;
  color: #337ab7;
}

.items-per-page label {
  margin: 0 15px;
}

/* Datatable CSS */
#v-datatable-light .header-item {
  cursor: pointer;
  color: #337ab7;
  transition: color 0.15s ease-in-out;
}

#v-datatable-light .header-item:hover {
  color: #ed9b19;
}

#v-datatable-light .header-item.no-sortable {
  cursor: default;
}
#v-datatable-light .header-item.no-sortable:hover {
  color: #337ab7;
}

#v-datatable-light .header-item .th-wrapper {
  display: flex;
  width: 100%;
  height: 100%;
  font-weight: bold;
}

#v-datatable-light .header-item .th-wrapper.checkboxes {
  justify-content: center;
}

#v-datatable-light .header-item .th-wrapper .arrows-wrapper {
  display: flex;
  flex-direction: column;
  margin-left: 10px;
  justify-content: space-between;
}

#v-datatable-light .header-item .th-wrapper .arrows-wrapper.centralized {
  justify-content: center;
}

#v-datatable-light .arrow {
  transition: color 0.15s ease-in-out;
  width: 0;
  height: 0;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent;
}

#v-datatable-light .arrow.up {
  border-bottom: 8px solid #337ab7;
}

#v-datatable-light .arrow.up:hover {
  border-bottom: 8px solid #ed9b19;
}

#v-datatable-light .arrow.down {
  border-top: 8px solid #337ab7;
}

#v-datatable-light .arrow.down:hover {
  border-top: 8px solid #ed9b19;
}

#v-datatable-light .footer {
  display: flex;
  justify-content: space-between;
  width: 500px;
}
/* End Datatable CSS */

/* Pagination CSS */
#v-datatable-light-pagination {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin: 0;
  padding: 0;
  width: 300px;
  height: 30px;
}

#v-datatable-light-pagination .pagination-item {
  width: 30px;
  margin-right: 5px;
  font-size: 16px;
  transition: color 0.15s ease-in-out;
}

#v-datatable-light-pagination .pagination-item.selected {
  color: #ed9b19;
}

#v-datatable-light-pagination .pagination-item .page-btn {
  background-color: transparent;
  outline: none;
  border: none;
  color: #337ab7;
  transition: color 0.15s ease-in-out;
}

#v-datatable-light-pagination .pagination-item .page-btn:hover {
  color: #ed9b19;
}

#v-datatable-light-pagination .pagination-item .page-btn:disabled {
  cursor: not-allowed;
  box-shadow: none;
  opacity: 0.65;
}
/* END PAGINATION CSS */

/* ITEMS PER PAGE DROPDOWN CSS */
.item-per-page-dropdown {
  background-color: transparent;
  min-height: 30px;
  border: 1px solid #337ab7;
  border-radius: 5px;
  color: #337ab7;
}
.item-per-page-dropdown:hover {
  cursor: pointer;
}
</style>

