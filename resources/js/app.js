require('./bootstrap');
import router from './router';
import axios from 'axios';
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    router,
    axios,
});
