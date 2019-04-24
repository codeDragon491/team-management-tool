<template>
  <div class="modal w-4/5 md:w-full" v-if="show && this.$route.path.includes('/view-project-team')">
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
            <button @click="sendTeam" class="button-pink">Send request</button>
            <button @click="closeModal" class="button-green">Cancel</button>
        </div>
      </div>
    </div>
  </div> 
</template>
<script>
export default {
  name: "modal",
  props: ["show", "sent"],
  data() {
    return {
      //sent: false
      //mutableShow: this.show
    };
  },
  methods: {
    closeModal: function() {
      //console.log(this.mutableShow);
      //this.mutableShow = false;
      this.$emit("closeModal");
    },
    sendTeam: function() {
      var self = this;
      let clientId = JSON.parse(localStorage.getItem("projectClient")).id;
      axios({
        method: "get",
        url: "/send-project-team/" + clientId,
        data: data
      })
        .then(function(response) {
          self.sent = true;
          $("h3").text("Wooo");
          $(".modal-body").text("Team was sent succesfully to client");
          setTimeout(function() {
            self.closeModal();
          }, 3000);
        })
        .catch(function(error) {
          console.log(error);
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
    width: 450px;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    margin: 0 auto;
    padding: 20px 30px;
  }

  &-footer {
    margin-top: 15px;
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

