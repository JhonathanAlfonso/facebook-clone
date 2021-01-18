import Vue from 'vue';
import VueRouter from "vue-router";
import NewFeed from "./views/NewFeed";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/', name: 'home', component: NewFeed,
        }
    ]
});

