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
import MentionForm from "../components/form/MentionForm";
import NiveauForm from "../components/form/NiveauForm";
import CompetenceUpdate from "../components/update/CompetenceUpdate";
import DomaineUpdate from "../components/update/DomaineUpdate";
import DiplomeEtablissementUpdate from "../components/update/DiplomeEtablissementUpdate";
import FormationNonDiplomanteUpdate from "../components/update/FormationNonDiplomanteUpdate";
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
import ComposanteTable from "../components/table/ComposanteTable";
import ComposanteForm from "../components/form/ComposanteForm";
import ComposanteUpdate from "../components/update/ComposanteUpdate";
import FormationForm from "../components/Formation/FormationForm";
import ModalFormationTable from "../components/table/ModalFormationTable";
import ModalFormationForm from "../components/form/ModalFormationForm";
import ModalFormationUpdate from "../components/update/ModalFormationUpdate";
import ModalPedagogiqueTable from "../components/table/ModalPedagogiqueTable";
import ModalPedagogiqueForm from "../components/form/ModalPedagogiqueForm";
import ModalPedagogiqueUpdate from "../components/update/ModalPedagogiqueUpdate";
import ModalRecrutementUpdate from "../components/update/ModalRecrutementUpdate";
import ModalRecrutementForm from "../components/form/ModalRecrutementForm";
import ModalRecrutementTable from "../components/table/ModalRecrutementTable";
import PartenaireTable from "../components/table/PartenaireTable";
import PartenaireForm from "../components/form/PartenaireForm";
import PartenaireUpdate from "../components/update/PartenaireUpdate";

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

  { path: '/diplome', name: 'Diplome', component: DiplomeEtablissementTable },
  { path: '/newDiplome', name: 'newDiplome', component: DiplomeEtablissementForm },
  { path: '/updateDiplome/:id', name: 'updateDiplome', component: DiplomeEtablissementUpdate },

  { path: '/formation', name: 'Formation', component: FormationNonDiplomanteTable },
  { path: '/newFormation', name: 'newFormation', component: FormationForm },
  { path: '/updateFormation/:id', name: 'updateFormation', component: FormationNonDiplomanteUpdate },

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

  { path: '/modalrecrutement', name: 'ModaliteRecrutement', component: ModalRecrutementTable },
  { path: '/new​ModaliteRecrutement', name: 'new​ModaliteRecrutement', component: ModalRecrutementForm },
  { path: '/update​ModaliteRecrutement/:id', name: 'update​ModaliteRecrutement', component: ModalRecrutementUpdate },

  { path: '/modalformation', name: '​ModaliteFormation', component: ModalFormationTable },
  { path: '/newModaliteFormation', name: 'new​ModaliteFormation', component: ModalFormationForm },
  { path: '/update​ModaliteFormation/:id', name: 'update​ModaliteFormation', component: ModalFormationUpdate },

  { path: '/modalpedagogique', name: 'ModalitePedagogique', component: ModalPedagogiqueTable },
  { path: '/newModalitePedagogique', name: 'newModalitePedagogique', component: ModalPedagogiqueForm },
  { path: '/updateModalitePedagogique/:id', name: 'updateModalitePedagogique', component: ModalPedagogiqueUpdate },

  { path: '/partenaire', name: 'Partenaire', component: PartenaireTable },
  { path: '/newPartenaire', name: 'newPartenaire', component: PartenaireForm },
  { path: '/updatePartenaire/:id', name: 'updatePartenaire', component: PartenaireUpdate },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router