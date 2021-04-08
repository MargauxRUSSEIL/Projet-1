import { createRouter, createWebHistory } from 'vue-router'
import Tableau from "../components/Tableau"
import Formulaire from "../components/Formulaire"
import Second from "../components/SecondForm"
import formationUpdate from "../components/update/formationUpdate"

const routes = [
  {
    path: '/',
    name: 'Tableau',
    component: Tableau
  },
  {
    path: '/formulaire',
    name: 'Formulaire',
    component: Formulaire
  },
  {
    path: '/second',
    name: 'second',
    component: Second
  },
  {
    path: '/formationUpdate',
    name: 'formationUpdate',
    component: formationUpdate
  },

 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
