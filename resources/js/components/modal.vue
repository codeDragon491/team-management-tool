<template>
  <div class="modal w-full flex justify-center" v-if="show && this.$route.path.includes('/view-project-team')">
    <div class="modal-wrapper">
      <div class="modal-container">
        <content select=".modal-header">
          <div class="modal-header">
            <h3>
              Send project team request to client
            </h3>
          </div>
        </content>
        <div class="modal-body">
         This operation is irreversable. Are you sure?
        </div>
        <div v-if="!sent" class="modal-footer flex justify-between">
            <button v-if="!loading" @click="sendTeam" class="button-pink">Send request</button>
            <load-button v-else></load-button>
            <button @click="closeModal" class="button-green">Cancel</button>
          </div>
        </div>
      </div>
    </div> 
</template>
<script>
import LoadButton from "./load-button.vue";
export default {
  name: "modal",
  components: { LoadButton },
  props: ["show", "sent"],
  data() {
    return {
      //sent: false
      //mutableShow: this.show
      loading: false
    };
  },
  methods: {
    closeModal: function() {
      //console.log(this.mutableShow);
      //this.mutableShow = false;
      this.$emit("closeModal");
    },
    sendTeam: function() {
      this.loading = true;
      var self = this;
      let clientId = JSON.parse(localStorage.getItem("projectClient")).id;
      axios({
        method: "get",
        url: "/send-project-team/" + clientId
      })
        .then(function(response) {
          self.loading = false;
          self.sent = true;
          $("h3").text("Wooo");
          $(".modal-body").text("Team was sent succesfully to client");
          setTimeout(function() {
            self.closeModal();
          }, 3000);
        })
        .catch(function(error) {
          console.log(error);
          self.loading = false;
          self.sent = true;
          $("h3").text("An error occurred");
          $(".modal-body").text("Please try again later");
          setTimeout(function() {
            self.closeModal();
          }, 3000);
        });
    }
  }
};
</script>
<style lang="scss">
.modal {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: table;
  transition: opacity 0.3s ease;

  &-wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  &-container {
    background: #fff;
    min-width: 250px;
    max-width: 450px;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    padding: 20px 30px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  &-footer {
    margin-top: 15px;
    @media (max-width: 540px) {
      button {
        padding: 0.75rem !important;
      }
    }
  }

  &-enter,
  &-leave {
    opacity: 0;
  }

  &-enter &-container,
  &-leave &-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
}
</style>

