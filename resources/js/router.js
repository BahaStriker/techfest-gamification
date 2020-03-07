import Vue from "vue";
import VueRouter from "vue-router";
//Components imports
import dashboard from "./components/ExampleComponent";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: "/", component: dashboard, meta: { requiresAuth: true } }
    ],
    mode: "history",
    linkExactActiveClass: "active"
});
