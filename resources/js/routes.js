//  DIPENDENZE
import Vue from 'vue'
import VueRouter from 'vue-router'

// COMPONENTI PER ROTTA
import Home from './pages/Home';
import Restaurant from './pages/Restaurant';

// ATTIVAZIONE ROUTER IN VUE

// DEFINIZIONE DELLE ROTTE
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/restaurant/:id',
            name: 'restaurant',
            component: Restaurant,
        },
    ]
})

// EXPORT DELLE ROTTE PER ESSERE USATO COME import IN ALTRI FILE
export default router;