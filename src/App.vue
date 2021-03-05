<template>
  <div id="app">
    <v-app>
      <v-tabs>
        <v-tab>POC</v-tab>
        <v-tab>Table Vuetify</v-tab>
        <!--<v-tab>Table Vue JS Simple</v-tab>-->
        <v-tab-item>
          <POC/>
        </v-tab-item>
        <v-tab-item>
          <Table/>
        </v-tab-item>
        <!--<v-tab-item>
          <HelloWorld/>
        </v-tab-item>-->
      </v-tabs>
    </v-app>



  </div>
</template>

<script>
  //import HelloWorld from './components/HelloWorld.vue'
  import Table from "@/components/Table"
  import POC from "@/components/POC";

  export default {
    name: 'App',
    components: {
      POC,
      //HelloWorld,
      Table
    }
  }
</script>

<style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>