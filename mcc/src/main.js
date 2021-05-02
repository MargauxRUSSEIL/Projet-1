import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind.css'
import router from '../../../Projet-1/vue-js/mcc/src/router'
import Toaster from '@meforma/vue-toaster'

createApp(App)
    .use(router)
    .use(Toaster)
    .mount('#app')
