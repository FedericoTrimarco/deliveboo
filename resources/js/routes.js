//  DIPENDENZE
import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTI PER ROTTA
import Home from './pages/Home';
// import Restaurant from './pages/Restaurant';
// import RestaurantDetails from './pages/RestaurantDetails';

// ATTIVAZIONE ROUTER IN VUE
Vue.use(VueRouter);
// DEFINIZIONE DELLE ROTTE


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return {y: 0}
        }
    },
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        /* {
            path: '/restaurant/typologies/:id',
            name: 'restaurant',
            component: Restaurant,
        }, */
        /* {
            path: '/restaurant/:id',
            name: 'restaurantDetails',
            component: RestaurantDetails,
        }, */
    ]
})

// EXPORT DELLE ROTTE PER ESSERE USATO COME import IN ALTRI FILE
export default router;