<template>
  
  <Header/>
  <Formulaire/>
  <SecondForm/>
</template>

<script>
import Header from '@/components/Header.vue'
import Formulaire from '@/components/Formulaire.vue'
import SecondForm from "./components/formMcc/SecondForm";

export default {
  name: 'App',
  components: {
    SecondForm,
    Header,
    Formulaire,
  }
}
</script>

<style>

</style>
