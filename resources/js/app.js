import './bootstrap.js';
import '../css/app.css'
import {createApp} from 'vue'
import {fpjsPlugin} from '@fingerprintjs/fingerprintjs-pro-vue-v3';

import App from './App.vue'
import Form from "./components/Form.vue";
import {createRouter, createWebHistory} from "vue-router";
import Confirm from "./components/Confirm.vue";
import Agb from "./components/AGB.vue";

const routes = [
    {path: '/', component: App, name: 'App'},
    {path: '/formular', component: Form, name: 'Form'},
    {path: '/confirm', component: Confirm, name: 'Confirm'},
    {path: '/agb', component: Agb, name: 'Agb'}

]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createApp(App).use(fpjsPlugin, {
    loadOptions: {
        apiKey: "QSqQeYev7RQeer59Yy1n",
        region: "eu"
    },
}).use(router).mount("#app")