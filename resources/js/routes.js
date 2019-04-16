// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
// and then call `Vue.use(VueRouter)`.
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)
    // 1. Define route components.
    // These can be imported from other files
import ProjectRequests from './pages/project-requests.vue';
import ProjectTeams from './pages/project-teams.vue';
import CreateTeam from './pages/create-team.vue';
import ViewProjectTeam from './pages/view-project-team.vue';

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
        { path: '/project-requests', component: ProjectRequests },
        { path: '/project-teams', component: ProjectTeams },
        { path: '/project-teams/create-team', component: CreateTeam },
        { path: '/view-project-team/:id', component: ViewProjectTeam }
    ]
    // 3. Create the router instance and pass the `routes` option
    // You can pass in additional options here, but let's
    // keep it simple for now.
const router = new VueRouter({
    routes // short for `routes: routes`
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
export default router;