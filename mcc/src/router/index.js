import { createRouter, createWebHistory } from 'vue-router'
import CompetenceTable from "../components/table/CompetenceTable";
import DomaineTable from "../components/table/DomaineTable";
import DiplomeEtablissementTable from "../components/table/DiplomeEtablissementTable";
import FormationNonDiplomanteTable from "../components/table/FormationNonDiplomanteTable";
import MentionTable from "../components/table/MentionTable";
import NiveauTable from "../components/table/NiveauTable";
import SemestreTable from "../components/table/SemestreTable";
import CompetenceForm from "../components/form/CompetenceForm";

const routes = [
  {
    path: '/',
    name: 'Competence',
    component: CompetenceTable
  },
  {
    path: '/newcompetence',
    name: 'NewCompetence',
    component: CompetenceForm
  },
  {
    path: '/domaine',
    name: 'Domaine',
    component: DomaineTable
  },
  {
    path: '/diplome',
    name: 'Diplome',
    component: DiplomeEtablissementTable
  },
  {
    path: '/formation',
    name: 'Formation',
    component: FormationNonDiplomanteTable
  },
  {
    path: '/mention',
    name: 'Mention',
    component: MentionTable
  },
  {
    path: '/niveau',
    name: 'Niveau',
    component: NiveauTable
  },
  {
    path: '/semestre',
    name: 'Semestre',
    component: SemestreTable
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
