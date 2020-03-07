import Vue from "vue";
import VueRouter from "vue-router";
//Components imports
import home from "./components/home";
import list from "./components/games/list";
import index from "./components/games/index";
import profile from "./components/profile";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: "/", component: home, meta: { requiresAuth: true } },
        { path: "/games/list", component: list, meta: { requiresAuth: true } },
        {
            path: "/game/:id",
            component: index,
            meta: { requiresAuth: true }
        },
        {
            path: "/profile/:id",
            component: profile,
            meta: { requiresAuth: true }
        },
    ],
    mode: "history",
    linkExactActiveClass: "active"
});
