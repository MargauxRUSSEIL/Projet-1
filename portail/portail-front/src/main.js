import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Chakra from '@chakra-ui/vue'
import '@/assets/css/tailwind.css'
import '@/assets/css/style.css'
import "vue-navigation-bar/dist/vue-navigation-bar.css";
import VueNavigationBar from "vue-navigation-bar"
Vue.component("vue-navigation-bar", VueNavigationBar)


Vue.config.productionTip = false


Vue.use(Chakra)


new Vue({
  router,
  store,
  el: '#app',
  render: h => h(App)
}).$mount('#app')
