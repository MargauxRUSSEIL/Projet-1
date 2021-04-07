import { createRouter, createWebHistory } from 'vue-router'
import CompetenceTable from "../components/table/CompetenceTable";
import DomaineTable from "../components/table/DomaineTable";
import DiplomeEtablissementTable from "../components/table/DiplomeEtablissementTable";
import FormationNonDiplomanteTable from "../components/table/FormationNonDiplomanteTable";
import MentionTable from "../components/table/MentionTable";
import NiveauTable from "../components/table/NiveauTable";
import SemestreTable from "../components/table/SemestreTable";
import CompetenceForm from "../components/form/CompetenceForm";
import UETable from "../components/table/UETable";
import UEForm from "../components/form/UEForm";
import SemestreForm from "../components/form/SemestreForm";
import DomaineForm from "../components/form/DomaineForm";
import DiplomeEtablissementForm from "../components/form/DiplomeEtablissementForm";
import FormationNonDiplomanteForm from "../components/form/FormationNonDiplomanteForm";
import MentionForm from "../components/form/MentionForm";
import NiveauForm from "../components/form/NiveauForm";

const routes = [
  {
    path: '/',
    name: 'Competence',
    component: CompetenceTable
  },
  {
    path: '/newCompetence',
    name: 'newCompetence',
    component: CompetenceForm
  },
  {
    path: '/domaine',
    name: 'Domaine',
    component: DomaineTable
  },
  {
    path: '/newDomaine',
    name: 'newDomaine',
    component: DomaineForm
  },
  {
    path: '/diplome',
    name: 'Diplome',
    component: DiplomeEtablissementTable
  },
  {
    path: '/newDiplome',
    name: 'newDiplome',
    component: DiplomeEtablissementForm
  },
  {
    path: '/formation',
    name: 'Formation',
    component: FormationNonDiplomanteTable
  },
  {
    path: '/newFormation',
    name: 'newFormation',
    component: FormationNonDiplomanteForm
  },
  {
    path: '/mention',
    name: 'Mention',
    component: MentionTable
  },
  {
    path: '/newMention',
    name: 'newMention',
    component: MentionForm
  },
  {
    path: '/niveau',
    name: 'Niveau',
    component: NiveauTable
  },
  {
    path: '/newNiveau',
    name: 'newNiveau',
    component: NiveauForm
  },
  {
    path: '/semestre',
    name: 'Semestre',
    component: SemestreTable
  },
  {
    path: '/newsemestre',
    name: 'newSemestre',
    component: SemestreForm
  },
  {
    path: '/ue',
    name: 'UE',
    component: UETable
  },
  {
    path: '/newUE',
    name: 'newUE',
    component: UEForm
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
