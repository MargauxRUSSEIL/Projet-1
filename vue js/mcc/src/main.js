import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind.css'
import VueCollapsiblePanel from '@dafcoe/vue-collapsible-panel'
const app = createApp(App)
app.use(VueCollapsiblePanel).mount('#app')