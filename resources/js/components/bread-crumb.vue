<template>
    <div class="bg-signifly-grey-lightest py-2 flex flex-col px-6">
        <ul class="main-breadcrumbs flex pl-6">
	        <li><a href="/">Home</a></li>
	        <li><a :href="'/'+ firstLink">{{prettify(firstLink)}}</a></li>
	        <li v-if="secondLink"><a :href="'/'+ secondLink">{{prettify(secondLink)}}</a></li>
        </ul>
        <hr class="border-solid border-grey border-t-2">
        <h1 class="py-3">{{prettify(capitalize(firstLink))}}</h1>
    </div>
</template>
<script>
export default {
  name: "bread-crumb",
  props: ["firstLink", "secondLink", "thirdLink"],
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
.main-breadcrumbs li {
  font-weight: 500;
  font-family: National-Book;
  font-size: 1rem;
  padding-right: 2rem;
}
</style>

