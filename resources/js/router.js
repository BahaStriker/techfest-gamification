import Vue from "vue";
import VueRouter from "vue-router";
//Components imports
import home from "./components/home";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: "/", component: home, meta: { requiresAuth: true } }
    ],
    mode: "history",
    linkExactActiveClass: "active"
});
