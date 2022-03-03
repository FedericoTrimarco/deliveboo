//  DIPENDENZE
import Vue from 'vue'
import VueRouter from 'vue-router'

// COMPONENTI PER ROTTA
import Home from './pages/Home';

// ATTIVAZIONE ROUTER IN VUE
Vue.use(VueRouter)

// DEFINIZIONE DELLE ROTTE
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
    ]
})

// EXPORT DELLE ROTTE PER ESSERE USATO COME import IN ALTRI FILE
export default router;