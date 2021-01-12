import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Chakra from '@chakra-ui/vue'


Vue.config.productionTip = false


Vue.use(Chakra)


new Vue({
  router,
  store,
  el: '#app',
  render: h => h(App)
}).$mount('#app')
