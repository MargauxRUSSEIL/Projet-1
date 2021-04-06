<template>
  <Header/>
  <Formulaire/>
  <SecondForm/>
  <DomaineForm/>
  <NiveauForm/>
  <MentionForm/>
  <SemestreForm/>
  <CompetenceForm/>
  <DiplomeEtablissementForm/>
  <FormationNonDiplomanteForm/>
  <CompetenceTable/>
  <DomaineTable/>
  <DiplomeEtablissementTable/>
  <FormationNonDiplomanteTable/>
  <MentionTable/>
  <NiveauTable/>
  <SemestreTable/>
</template>

<script>
//import Header from '@/components/Header.vue'
//import Formulaire from '@/components/Formulaire.vue'
//import SecondForm from "./components/formMcc/SecondForm";

import DomaineForm from "./components/form/DomaineForm";
import NiveauForm from "./components/form/NiveauForm";
import MentionForm from "./components/form/MentionForm";
import SemestreForm from "./components/form/SemestreForm";
import CompetenceForm from "./components/form/CompetenceForm";
import DiplomeEtablissementForm from "./components/form/DiplomeEtablissementForm";
import FormationNonDiplomanteForm from "./components/form/FormationNonDiplomanteForm";
import CompetenceTable from "./components/table/CompetenceTable";
import DomaineTable from "./components/table/DomaineTable";
import DiplomeEtablissementTable from "./components/table/DiplomeEtablissementTable";
import FormationNonDiplomanteTable from "./components/table/FormationNonDiplomanteTable";
import MentionTable from "./components/table/MentionTable";
import NiveauTable from "./components/table/NiveauTable";
import SemestreTable from "./components/table/SemestreTable";
export default {
  name: 'App',
  components: {
    SemestreTable,
    NiveauTable,
    MentionTable,
    FormationNonDiplomanteTable,
    DiplomeEtablissementTable,
    DomaineTable,
    CompetenceTable,
    FormationNonDiplomanteForm,
    DiplomeEtablissementForm,
    CompetenceForm,
    SemestreForm,
    MentionForm,
    NiveauForm,
    DomaineForm
    //SecondForm,
    //Header,
    //Formulaire,
  }
}
</script>

<style>

</style>
