import { createRouter, createWebHistory } from 'vue-router'
import CompetenceTable from "../components/table/CompetenceTable";
import ComposanteTable from "../components/table/ComposanteTable";
import DomaineTable from "../components/table/DomaineTable";
import MentionTable from "../components/table/MentionTable";
import NiveauTable from "../components/table/NiveauTable";
import SemestreTable from "../components/table/SemestreTable";
import CompetenceForm from "../components/form/CompetenceForm";
import ComposanteForm from "../components/form/ComposanteForm";
import UETable from "../components/table/UETable";
import UEForm from "../components/form/UEForm";
import SemestreForm from "../components/form/SemestreForm";
import DomaineForm from "../components/form/DomaineForm";
import MentionForm from "../components/form/MentionForm";
import NiveauForm from "../components/form/NiveauForm";
import CompetenceUpdate from "../components/update/CompetenceUpdate";
import DomaineUpdate from "../components/update/DomaineUpdate";
import MentionUpdate from "../components/update/MentionUpdate";
import NiveauUpdate from "../components/update/NiveauUpdate";
import SemestreUpdate from "../components/update/SemestreUpdate";
import UEUpdate from "../components/update/UEUpdate";
import ParcoursTable from "../components/table/ParcoursTable";
import MCCTable from "../components/MCC/MCCTable";
import MCCForm from "../components/MCC/MCCForm";
import ParcoursForm from "../components/form/ParcoursForm";
import MCCUpdate from "../components/MCC/MCCUpdate";
import ParcoursUpdate from "../components/update/ParcoursUpdate";
import LocalisationTable from "../components/table/LocalisationTable";
import LocalisationForm from "../components/form/LocalisationForm";
import LocalisationUpdate from "../components/update/LocalisationUpdate";
import ComposanteUpdate from "../components/update/ComposanteUpdate";
import FormationForm from "../components/Formation/FormationForm";
import ModalFormationForm from "../components/form/ModalFormationForm";
import ModalFormationUpdate from "../components/update/ModalFormationUpdate";
import ModalPedagogiqueTable from "../components/table/ModalPedagogiqueTable";
import ModalPedagogiqueForm from "../components/form/ModalPedagogiqueForm";
import ModalPedagogiqueUpdate from "../components/update/ModalPedagogiqueUpdate";
import PartenaireTable from "../components/table/PartenaireTable";
import PartenaireForm from "../components/form/PartenaireForm";
import PartenaireUpdate from "../components/update/PartenaireUpdate";
import ModalFormationTable from "../components/table/ModalFormationTable";
import TypeDiplomeTable from "../components/table/TypeDiplomeTable";
import TypeDiplomeForm from "../components/form/TypeDiplomeForm";
import TypeDiplomeUpdate from "../components/update/TypeDiplomeUpdate";
import ModaliteRecrutementTable from "../components/table/ModaliteRecrutementTable";
import ModaliteRecrutementForm from "../components/form/ModaliteRecrutementForm";
import ModaliteRecrutementUpdate from "../components/update/ModaliteRecrutementUpdate";
import FormationTable from "../components/Formation/FormationTable";
import FormationUpdate from "../components/Formation/FormationUpdate";
import CaracteristiquesTable from "../components/table/CaracteristiquesTable";
import CaracteristiquesForm from "../components/form/CaracteristiquesForm";
import CaracteristiquesUpdate from "../components/update/CaracteristiquesUpdate";
import UserTable from "../components/table/UserTable";
import UserForm from "../components/form/UserForm";
import UserUpdate from "../components/update/UserUpdate";

const routes = [
  { path: '/', name: 'MCC', component: MCCTable },
  { path: '/newMCC', name: 'newMCC', component: MCCForm },
  { path: '/updateMCC', name: 'updateMCC', component: MCCUpdate },

  { path: '/parcours', name: 'Parcours', component: ParcoursTable },
  { path: '/newParcours', name: 'newParcours', component: ParcoursForm },
  { path: '/updateParcours', name: 'updateParcours', component: ParcoursUpdate },

  { path: '/competence', name: 'Competence', component: CompetenceTable },
  { path: '/newCompetence', name: 'newCompetence', component: CompetenceForm },
  { path: '/updateCompetence/:id', name: 'updateCompetence', component: CompetenceUpdate },

  { path: '/domaine', name: 'Domaine', component: DomaineTable },
  { path: '/newDomaine', name: 'newDomaine', component: DomaineForm},
  { path: '/updateDomaine/:id', name: 'updateDomaine', component: DomaineUpdate },

  { path: '/diplome', name: 'Diplome', component: TypeDiplomeTable },
  { path: '/newDiplome', name: 'newDiplome', component: TypeDiplomeForm },
  { path: '/updateDiplome/:id', name: 'updateDiplome', component: TypeDiplomeUpdate },

  { path: '/formation', name: 'Formation', component: FormationTable },
  { path: '/newFormation', name: 'newFormation', component: FormationForm },
  { path: '/updateFormation/:id', name: 'updateFormation', component: FormationUpdate },

  { path: '/mention', name: 'Mention', component: MentionTable },
  { path: '/newMention', name: 'newMention', component: MentionForm },
  { path: '/updateMention/:id', name: 'updateMention', component: MentionUpdate },

  { path: '/niveau', name: 'Niveau', component: NiveauTable },
  { path: '/newNiveau', name: 'newNiveau', component: NiveauForm },
  { path: '/updateNiveau/:id', name: 'updateNiveau', component: NiveauUpdate },

  { path: '/semestre', name: 'Semestre', component: SemestreTable },
  { path: '/newsemestre', name: 'newSemestre', component: SemestreForm },
  { path: '/updateSemestre/:id', name: 'updateSemestre', component: SemestreUpdate },

  { path: '/ue', name: 'UE', component: UETable },
  { path: '/newUE', name: 'newUE', component: UEForm },
  { path: '/updateUE/:id', name: 'updateUE', component: UEUpdate },

  { path: '/localisation', name: 'Localisation', component: LocalisationTable },
  { path: '/newLocalisation', name: 'newLocalisation', component: LocalisationForm },
  { path: '/updateLocalisation/:id', name: 'updateLocalisation', component: LocalisationUpdate },

  { path: '/composante', name: 'Composante', component: ComposanteTable },
  { path: '/newComposante', name: 'newComposante', component: ComposanteForm },
  { path: '/updateComposante/:id', name: 'updateComposante', component: ComposanteUpdate },

  { path: '/recrutement', name: 'Recrutement', component: ModaliteRecrutementTable },
  { path: '/newRecrutement', name: 'newRecrutement', component: ModaliteRecrutementForm },
  { path: '/updateRecrutement/:id', name: 'updateRecrutement', component: ModaliteRecrutementUpdate },

  { path: '/formationmodal', name: 'FormationModal', component: ModalFormationTable },
  { path: '/newFormationModal', name: 'newFormationModal', component: ModalFormationForm },
  { path: '/updateFormationModal/:id', name: 'updateFormationModal', component: ModalFormationUpdate },

  { path: '/pedagogique', name: 'Pedagogique', component: ModalPedagogiqueTable },
  { path: '/newpedagogique', name: 'newPedagogique', component: ModalPedagogiqueForm },
  { path: '/updatepedagogique/:id', name: 'updatePedagogique', component: ModalPedagogiqueUpdate },

  { path: '/partenaire', name: 'Partenaire', component: PartenaireTable },
  { path: '/newpartenaire', name: 'newPartenaire', component: PartenaireForm },
  { path: '/updatepartenaire/:id', name: 'updatePartenaire', component: PartenaireUpdate },

  { path: '/caracteristique', name: 'Caracteristique', component: CaracteristiquesTable },
  { path: '/newCaracteristique', name: 'newCaracteristique', component: CaracteristiquesForm },
  { path: '/updateCaracteristique/:id', name: 'updateCaracteristique', component: CaracteristiquesUpdate },

  { path: '/user', name: 'User', component: UserTable },
  { path: '/newUser', name: 'newUser', component: UserForm },
  { path: '/updateUser/:id', name: 'updateUser', component: UserUpdate },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
