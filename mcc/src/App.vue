<template>
  
  <Header/>
  <!-- <Formulaire/> -->
  <!-- <SecondForm/> -->
  <Tableau/>
</template>

<script>
import Header from '@/components/Header.vue'
// import Formulaire from '@/components/Formulaire.vue'
// import SecondForm from '@/components/SecondForm.vue'
import Tableau from '@/components/Tableau.vue'

export default {
  name: 'App',
  components: {
    Header,
    Tableau,
    // Formulaire,
    // SecondForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
