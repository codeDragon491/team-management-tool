<template>
  <div class="modal w-full flex justify-center" v-if="show && this.$route.path.includes('/view-project-team')">
    <div class="modal-wrapper">
      <div class="modal-container float-in">
        <content select=".modal-header">
          <div class="modal-header flex flex-col h-20">
            <svg @click="closeModal" class="w-6 h-6 ml-auto mb-12 cursor-pointer close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M278.6 256l68.2-68.2c6.2-6.2 6.2-16.4 0-22.6-6.2-6.2-16.4-6.2-22.6 0L256 233.4l-68.2-68.2c-6.2-6.2-16.4-6.2-22.6 0-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3l68.2 68.2-68.2 68.2c-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3 6.2 6.2 16.4 6.2 22.6 0l68.2-68.2 68.2 68.2c6.2 6.2 16.4 6.2 22.6 0 6.2-6.2 6.2-16.4 0-22.6L278.6 256z"/></svg>
          </div>
        </content>
        <div class="modal-body h-56 md:h-44">
              <svg class="block mx-auto mb-8" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="63" height="53" style=""><rect id="backgroundrect" width="100%" height="100%" x="0" y="0" fill="none" stroke="none"/>
              <title>prototype</title>
              <g class="currentLayer" style=""><title>Layer 1</title><g id="svg_1" class="">
                <path d="M37.964945681095124,11.710000228881835 H26.394945681095123 a2.16,2.16 0 0 0 -2.16,2.16 v20 A2.16,2.16 0 0 0 26.394945681095123,36.010000228881836 H37.964945681095124 a2.16,2.16 0 0 0 2.16,-2.16 v-20 A2.16,2.16 0 0 0 37.964945681095124,11.710000228881835 zm0.8,22.14 a0.8,0.8 0 0 1 -0.8,0.8 H26.394945681095123 a0.8,0.8 0 0 1 -0.8,-0.8 v-20 a0.8,0.8 0 0 1 0.8,-0.8 H37.964945681095124 a0.8,0.8 0 0 1 0.8,0.8 z" style="fill: #000" id="svg_2"/>
                <circle cx="32.18494659662247" cy="39.78000068664551" r="1.8700000047683716" style="fill: #000" id="svg_3"/>
                <path d="M63.244945681095125,7.010000228881836 a7.3100000000000005,7.3100000000000005 0 0 0 -4.18,-6.58 l-0.9,-0.43000000000000005 l-0.41000000000000003,6.33 H54.18494568109512 L53.774945681095126,0.010000228881835938 l-0.9,0.43000000000000005 a7.27,7.27 0 0 0 -0.27,13 a7.2,7.2 0 0 1 -1.9300000000000002,4 A14,14 0 0 1 44.494945681095125,21.010000228881836 V13.170000228881836 a5.93,5.93 0 0 0 -5.92,-5.92 H25.794945681095122 a5.93,5.93 0 0 0 -5.92,5.92 v11 a30.56,30.56 0 0 0 -3.6100000000000003,1.27 a22.48,22.48 0 0 0 -9,6.71 A19.36,19.36 0 0 0 3.6449456810951233,39.39000022888184 a7.27,7.27 0 0 0 0.53,12.88 l0.9,0.43000000000000005 l0.41000000000000003,-6.33 H9.114945681095124 l0.41000000000000003,6.33 l0.9,-0.43000000000000005 a7.27,7.27 0 0 0 0.6600000000000001,-12.81 a12.5,12.5 0 0 1 1.73,-3 a16,16 0 0 1 7.05,-4.9 V39.010000228881836 A5.93,5.93 0 0 0 25.794945681095122,45.010000228881836 H38.57494568109512 A5.93,5.93 0 0 0 44.494945681095125,39.010000228881836 V28.360000228881837 c5,-1.23 8.9,-3.35 11.55,-6.33 a13.84,13.84 0 0 0 3.6500000000000004,-8.77 A7.28,7.28 0 0 0 63.244945681095125,7.010000228881836 zm-50,38.67 a6,6 0 0 1 -2.5,4.83 L10.384945681095124,45.010000228881836 H4.264945681095123 L3.914945681095123,50.510000228881836 a5.92,5.92 0 1 1 9.33,-4.83 zm-1.49,-10 a13.85,13.85 0 0 0 -1.8900000000000001,3.2 a7.26,7.26 0 0 0 -4.57,-0.17 a18.12,18.12 0 0 1 3,-5.72 a20.07,20.07 0 0 1 5.62,-4.86 l1.86,4 A15.52,15.52 0 0 0 11.754945681095123,35.67000022888183 zm4.73,-4 L14.644945681095123,27.740000228881833 q1,-0.5700000000000001 2.17,-1.06 a28.89,28.89 0 0 1 3.08,-1.11 v4.58 A21.76,21.76 0 0 0 16.484945681095123,31.690000228881836 zM43.134945681095125,39.010000228881836 a4.57,4.57 0 0 1 -4.5600000000000005,4.5600000000000005 H25.794945681095122 A4.57,4.57 0 0 1 21.234945681095123,39.010000228881836 V13.170000228881836 a4.57,4.57 0 0 1 4.5600000000000005,-4.5600000000000005 H38.57494568109512 a4.57,4.57 0 0 1 4.5600000000000005,4.5600000000000005 zm1.36,-16.61 a19,19 0 0 0 4.9,-2.18 L51.64494568109512,23.96000022888184 a24.35,24.35 0 0 1 -7.2,3 zm10.53,-1.32 a15.81,15.81 0 0 1 -2.7,2.39 l-2.3,-3.7 A11.38,11.38 0 0 0 51.64494568109512,18.370000228881835 A8.68,8.68 0 0 0 53.89494568109512,14.010000228881836 a7.25,7.25 0 0 0 4.39,-0.08000000000000002 A12.81,12.81 0 0 1 55.024945681095126,21.130000228881837 zm0.9400000000000001,-8.2 a5.92,5.92 0 0 1 -3.42,-10.75 l0.36000000000000004,5.51 h6.12 l0.36000000000000004,-5.51 a5.92,5.92 0 0 1 -3.42,10.75 z" style="fill: #000" id="svg_4"/>
                <polygon points="34.814943850040436,16.350000381469727 29.504946291446686,21.979999542236328 31.774946749210358,22.760000228881836 29.554945528507233,29.23000144958496 34.86494690179825,23.600000381469727 32.594946444034576,22.82000160217285 34.814943850040436,16.350000381469727 " style="fill: #000" id="svg_5"/>
              </g></g>
            </svg>
            <h1>
              SEND PROJECT TEAM REQUEST <br> TO CLIENT!
            </h1>
         <p class="mt-3">This operation is irreversable. Are you sure?</p>
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
          //console.log(error);
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
.close-icon {
  transition: 0.6s ease-out;
}
.close-icon:hover {
  backface-visibility: hidden;
  transform: rotate(90deg);
}
.float-in {
  opacity: 0;
  animation: float-in 0.2s ease-out forwards;
}
@keyframes float-in {
  to {
    opacity: 1;
    transform: translate(-50%, -50%);
  }
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: table;
  z-index: 30;
  transition: opacity 0.3s ease;
  &-wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  &-container {
    background: #fff;
    min-width: 250px;
    max-width: 450px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    border-radius: 0.125rem;
    padding: 1.5rem;
    @media (min-width: 768px) {
      padding: 1.5rem 2.5rem 1.5rem 2.5rem;
    }
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateY(-50%);
  }
  &-body {
    backface-visibility: hidden;
  }

  &-footer {
    margin-top: 3.5rem;
    @media (max-width: 540px) {
      button {
        padding: 0.75rem !important;
      }
    }
  }

  &-enter,
  &-leave {
    opacity: 0;

    &-enter &-container,
    &-leave &-container {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
  }
}
</style>