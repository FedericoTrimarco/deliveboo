// IMPORT DEPENDECIES
import Vue from 'vue';
import App from './views/App'

// App router (rotte per l'app)
import router from './routes';

// INIT VUE INSTANCE
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
})