import { createRouter, createWebHistory } from 'vue-router'
import Header from "../components/Header.vue"
const routes = [
  {
    path: '/',
    name: 'Header',
    component: Header
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
