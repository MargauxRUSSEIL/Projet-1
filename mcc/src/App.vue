<template>
  
  <Header/>
  <Formulaire/>
</template>

<script>
import Header from '@/components/Header.vue'
import Formulaire from '@/components/Formulaire.vue'

export default {
  name: 'App',
  components: {
    Header,
    Formulaire
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
