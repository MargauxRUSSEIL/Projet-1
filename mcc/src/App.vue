<template>
  
  <Header/>
  <Formulaire/>
  <SecondForm/>
</template>

<script>
import Header from '@/components/Header.vue'
import Formulaire from '@/components/Formulaire.vue'
import SecondForm from '@/components/SecondForm.vue'
export default {
  name: 'App',
  components: {
    Header,
    Formulaire,
    SecondForm
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
