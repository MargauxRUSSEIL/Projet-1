<template>
  <div id="app">

    <CThemeProvider>
    <CReset />

      <c-button variantColor="blue">
        Chakra consumed ⚡️😁
      </c-button>
    <!-- <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>
    <router-view/> -->
    <!--
      Your application code goes here! 😁
    -->
    </CThemeProvider>
  </div>
</template>


<script>
  import { CThemeProvider, CReset, CButton } from '@chakra-ui/vue'

  export default {
    name: 'App',
    components: {
      CThemeProvider,
      CReset,
      CButton
    }
  }
</script>

<style lang="scss">
</style>
