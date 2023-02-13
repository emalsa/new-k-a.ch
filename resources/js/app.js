import './bootstrap.js';
import '../css/app.css'
import {createApp} from 'vue'

import App from './App.vue'
import Form from "./components/Form.vue";
import {createRouter, createWebHistory} from "vue-router";
import Confirm from "./components/Confirm.vue";

const routes = [
    {path: '/', component: App, name: 'App'},
    {path: '/formular', component: Form, name: 'Form'},
    {path: '/confirm', component: Confirm, name: 'Confirm'}
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});


createApp(App).use(router).mount("#app")