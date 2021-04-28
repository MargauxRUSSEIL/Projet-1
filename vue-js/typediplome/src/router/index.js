import { createRouter, createWebHistory } from 'vue-router'
import Tableau from '../components/Tableau'
import creation from '../components/creation/creation'
import update from '../components/update/update'
const routes = [
  {
    path: '/',
    name: 'Tableau',
    component: Tableau
  },
  {
    path: '/creation',
    name: 'creation',
    component: creation
  },
  {
    path: '/update',
    name: 'update',
    component: update
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
