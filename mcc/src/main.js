import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind.css'
import router from './router'
import Toaster from '@meforma/vue-toaster'

createApp(App)
    .use(router)
    .use(Toaster)
    .mount('#app')
