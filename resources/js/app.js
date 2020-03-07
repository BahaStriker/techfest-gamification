require('./bootstrap');
import router from './router';
import axios from 'axios';
window.Vue = require('vue');

import Myheader from './components/partials/header';
import Myfooter from './components/partials/footer';
import home from  './components/home';

const app = new Vue({
    el: '#app',
    router,
    axios,
    components :{
        Myheader,
        Myfooter,
        home
    }
});
