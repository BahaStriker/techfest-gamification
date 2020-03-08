require('./bootstrap');
import router from './router';
import axios from 'axios';
window.Vue = require('vue');
import { AlertError, Form, HasError } from "vform";

import Myheader from './components/partials/header';
import Myfooter from './components/partials/footer';
import home from  './components/home';
import list from  './components/games/list';

//vForm
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//Components Communication
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
    axios,
    components :{
        Myheader,
        Myfooter,
        home,
        list
    }
});
