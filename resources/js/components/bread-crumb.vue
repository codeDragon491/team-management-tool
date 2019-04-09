<template>
    <div class="bg-signifly-grey-lightest py-2 flex flex-col px-6">
        <ul class="main-breadcrumbs flex pl-6">
	         <router-link class="link" to="/">Home</router-link>
	         <router-link class="link" :to="'/' + firstLink">{{prettify(firstLink)}}</router-link>
	         <router-link class="link" v-if="secondLink" :to="this.$route.path + '/' + secondLink">{{prettify(secondLink)}}</router-link>
           <router-view></router-view>
        </ul>
        <hr class="border-solid border-grey border-t-2">
        <h1 v-if="!secondLink" class="py-3">{{prettify(capitalize(firstLink))}}</h1>
        <h1 v-else class="py-3">{{prettify(capitalize(secondLink))}}</h1>
    </div>
</template>
<script>
export default {
  name: "bread-crumb",
  props: ["firstLink", "secondLink", "thirdLink"],
  mounted() {
    console.log(this.$route);
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
<style>
.main-breadcrumbs .link {
  font-weight: 500;
  font-family: National-Book;
  font-size: 1rem;
  padding-right: 2rem;
}
</style>

