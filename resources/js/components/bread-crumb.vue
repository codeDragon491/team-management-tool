<template>
<div class="hidden md:block">
    <div class="bg-signifly-grey-lightest py-2 p-5 w-full">
        <ul class="main-breadcrumbs flex pl-0">
	         <router-link class="link" to="/">Home</router-link>
	         <router-link class="link" :to="'/' + firstLink">{{prettify(firstLink)}}</router-link>
	         <router-link class="link" v-if="secondLink" :to="this.$route.path">{{prettify(secondLink)}}</router-link>
           <router-view></router-view>
        </ul>
        <hr class="border-solid border-signifly-grey-light border-t">
        <h1 v-if="!secondLink" class="py-3">{{prettify(capitalize(firstLink))}}</h1>
        <h1 v-else class="py-3">{{prettify(capitalize(secondLink))}}</h1>
    </div>
  </div>
</template>
<script>
export default {
  name: "bread-crumb",
  props: ["firstLink", "secondLink", "thirdLink"],
  mounted() {
    //console.log(this.$route);
  },
  computed: {},
  methods: {
    prettify: function(str) {
      return str
        .split("-")
        .map(function capitalize(part) {
          return part.charAt(0).toUpperCase() + part.slice(1);
        })
        .join(" ");
    },
    capitalize: function(str) {
      return str.toUpperCase();
    }
  }
};
</script>
<style lang="scss">
.main-breadcrumbs .link {
  font-weight: bold;
  font-family: National-Book;
  font-size: 1rem;
  padding-right: 2rem;

  &:nth-of-type(2)::before,
  &:nth-of-type(3)::before {
    font-family: "Ionicons";
    content: "\f3d1";
    position: relative;
    right: 1rem;
  }
}
</style>

