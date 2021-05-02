import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind.css'
import VueCollapsiblePanel from '@dafcoe/vue-collapsible-panel'
import router from './vue-js/mcc/src/router'
const app = createApp(App).use(router).use(router)
app.use(VueCollapsiblePanel).mount('#app')