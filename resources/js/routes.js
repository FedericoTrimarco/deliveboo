//  DIPENDENZE
import Vue from "vue";
import VueRouter from "vue-router";

// COMPONENTI PER ROTTA
import Home from "./pages/Home";
import Checkout from "./pages/Checkout";
import NotFound from "./pages/NotFound.vue";
import Restaurant from "./pages/Restaurant.vue";

// ATTIVAZIONE ROUTER IN VUE
Vue.use(VueRouter);
// DEFINIZIONE DELLE ROTTE

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { y: 0 };
        }
    },
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/restaurant/:id",
            name: "restaurant",
            component: Restaurant,
        },
        {
            path: "/restaurant/:id/checkout",
            name: "checkout",
            component: Checkout,
        },
        /* {
            path: '/restaurant/:id',
            name: 'restaurantDetails',
            component: RestaurantDetails,
        }, */
        {
            path: "*",
            name: "NotFound",
            component: NotFound,
        },
    ],
});

// EXPORT DELLE ROTTE PER ESSERE USATO COME import IN ALTRI FILE
export default router;
