import { createRouter, createWebHistory } from 'vue-router'
import Tableau from "../components/Tableau.vue"


const routes = [
  {
    path: '/',
    name: 'Tableau',
    component: Tableau
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
