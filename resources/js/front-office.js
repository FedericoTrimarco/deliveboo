// IMPORT DEPENDECIES
import Vue from 'vue';
import App from './views/App'

// INIT VUE INSTANCE
const root = new Vue({
    el: '#root',
    render: h => h(App),
})