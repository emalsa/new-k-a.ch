import './bootstrap.js';
import '../css/app.css'
import {createApp} from 'vue'

import App from './App.vue'
import Form from "./components/Form.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {path: '/home', component: App, name: 'App'},
    {path: '/formular', component: Form, name: 'Form'},
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});


createApp(App).use(router).mount("#app")