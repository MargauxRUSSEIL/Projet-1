import { createRouter, createWebHistory } from 'vue-router'
import CompetenceTable from "../components/table/CompetenceTable";
import ComposanteTable from "../components/table/ComposanteTable";
import DomaineTable from "../components/table/DomaineTable";
import DiplomeEtablissementTable from "../components/table/DiplomeEtablissementTable";
import FormationNonDiplomanteTable from "../components/table/FormationNonDiplomanteTable";
import LocalisationTable from "../components/table/LocalisationTable";
import MentionTable from "../components/table/MentionTable";
import NiveauTable from "../components/table/NiveauTable";
import SemestreTable from "../components/table/SemestreTable";
import CompetenceForm from "../components/form/CompetenceForm";
import ComposanteForm from "../components/form/ComposanteForm";
import UETable from "../components/table/UETable";
import UEForm from "../components/form/UEForm";
import SemestreForm from "../components/form/SemestreForm";
import DomaineForm from "../components/form/DomaineForm";
import DiplomeEtablissementForm from "../components/form/DiplomeEtablissementForm";
import FormationNonDiplomanteForm from "../components/form/FormationNonDiplomanteForm";
import LocalisationForm from "../components/form/LocalisationForm";
import MentionForm from "../components/form/MentionForm";
import NiveauForm from "../components/form/NiveauForm";
import ComposanteUpdateForm from "../components/form/ComposanteUpdateForm";
import LocalisationUpdateForm from "../components/form/LocalisationUpdateForm";

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
    path: '/composante',
    name: 'Composante',
    component: ComposanteTable
  },
  {
    path: '/newComposante',
    name: 'newComposante',
    component: ComposanteForm
  },
  {
    path: '/updateComposante/:id',
    name: 'updateComposante',
    component: ComposanteUpdateForm
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
    path: '/localisation',
    name: 'Localisation',
    component: LocalisationTable
  },
  {
    path: '/newLocalisation',
    name: 'newLocalisation',
    component: LocalisationForm
  },
  {
    path: '/updateLocalisation/:id',
    name: 'updateLocalisation',
    component: LocalisationUpdateForm
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
