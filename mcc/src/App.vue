<template>
  
  <Header/>
  <Formulaire/>
  <SecondForm/>
</template>

<script>
import Header from '@/components/Header.vue'
//import Formulaire from '@/components/Formulaire.vue'
import SecondForm from '@/components/SecondForm.vue'
export default {
  name: 'App',
  components: {
    Header,
    //Formulaire,
    SecondForm
  }
}
</script>

<style>

</style>
