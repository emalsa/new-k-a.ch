import '../css/app.css'
import {createApp} from 'vue'

import App from './App.vue'
import Formular from "./components/Formular.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {path: '/', component: App, name: 'App'},
    {path: '/formular', component: Formular, name: 'Formular'},
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});


createApp(App).use(router).mount("#app")